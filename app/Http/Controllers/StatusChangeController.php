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

        $request->validate([
            'project'     =>   'required',
            'responsible' =>   'required',
            'status'      =>   'required'
        ]);

        StatusChange::create($request->all());

        Project::where('id', $request->project)->update(array('status' => $request->status));
        return back();
    }

}