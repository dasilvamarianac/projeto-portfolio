<?php

namespace App\Http\Controllers;
use App\Progress;
use App\Project;
use App\Permission;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProgressController extends Controller
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
        if($this->acesso['progress'] < 2) {
            return view('layouts.nopermission');
        }

        $request->validate([
            'project' =>   'required',
            'inform'  =>   'required',
        ]);

        $data = Project::findOrFail($request->project);

        $form_data = array(
            'project'   =>   $data->id,
            'inform'    =>   $request->inform,
            'user'      =>   Auth::user()->id,
            'status'    =>   $data->status
        );

        Progress::create($form_data);
        return back();
    }
}
