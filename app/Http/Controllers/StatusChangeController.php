<?php

namespace App\Http\Controllers;
use App\StatusChange;
use App\Project;
use App\Permission;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class StatusChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            $this->acesso = Permission::where('profile',Auth::user()->profile)->first();
            return $next($request);
        });
    }


    public function store(Request $request)
    {     

        if($this->acesso['status_change'] < 2) {
                return view('layouts.nopermission');
        }
        $status = $request->status + 1;
        $project = $request->project;
        $user = $request->responsible;
        $just = $request->justification;
        $new_name = null;

        

        if($status == 9 ){

            $proj = Project::findOrFail($project);
            $form_data = array(
                'project'       =>  $project,
                'responsible'   =>  $user,
                'status'        =>  $proj->status,
                'justification' =>  $just
            );

            StatusChange::create($form_data);

            $form_data_can = array(
                'project'      =>   $project,
                'responsible'  =>   Auth::user()->id,
                'status'       =>   $status
            );

            StatusChange::create($form_data_can);
        }else{

            $request->validate([
            'project'     =>   'required',
            'responsible' =>   'required',
            'status'      =>   'required'
            ]);

            if($request->file('scope')){
                $scope = $request->file('scope');
                $new_name = rand() . '.' . $scope->getClientOriginalExtension();
                $scope->move(public_path('escopos'), $new_name);
            }

            StatusChange::create($request->all());
        }

        Project::where('id', $request->project)->update(array('status' => $status, 'scope' => $new_name ));
        return back();
    }

}