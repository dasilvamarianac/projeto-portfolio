<?php

namespace App\Http\Controllers;
use App\StatusChange;
use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class StatusChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {     

        $status = $request->status + 1;

        $request->validate([
            'project'     =>   'required',
            'responsible' =>   'required',
            'status'      =>   'required'
        ]);

        if($request->file('scope')){
            $scope = $request->file('scope');
            $new_name = rand() . '.' . $scope->getClientOriginalExtension();
            $scope->move(public_path('images'), $new_name);
        }else{
            $new_name = null;
        }
        


        StatusChange::create($request->all());

        Project::where('id', $request->project)->update(array('status' => $status, 'scope' => $new_name ));
        return back();
    }

}