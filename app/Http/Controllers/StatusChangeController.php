<?php

namespace App\Http\Controllers;
use App\StatusChange;
use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;


class StatusChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {     

        $status = $request->status + 1;
        $project = $request->project;
        $user = $request->responsible;
        $new_name = null;

        

        if($status == 9 ){

            $proj = Project::findOrFail($project);
            $form_data = array(
                'project'      =>   $project,
                'responsible'  =>   $user,
                'status'       =>   $proj->status
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