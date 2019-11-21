<?php

namespace App\Http\Controllers;
use App\ProjectIndicator;
use App\Project;
use App\Permission;
use Auth;
use DB;
use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            $this->acesso = Permission::where('profile',Auth::user()->profile)->first();
            return $next($request);
        });
    }

    public function index()
    {
        if($this->acesso['permissions'] < 1) {
            return view('layouts.nopermission');
        }
        
        return view('permission.index');
    }

    public function edit($id)
    {
        if($this->acesso['permissions'] < 3) {
            return view('layouts.nopermission');
        }
        $data = Permission::where('profile', $id)->first();
        return view('permission.edit', compact('data'));
    }

    protected function update(Request $request, $id)
    {
        if($this->acesso['permissions'] < 3) {
            return view('layouts.nopermission');
        }

        $validatedData = $request->validate([
            'users'              =>   'required',
            'permissions'        =>   'required',
            'indicators'         =>   'required',
            'members'            =>   'required',
            'projects'           =>   'required',
            'project_detail'     =>   'required',
            'project_member'     =>   'required',
            'project_indicators' =>   'required',
            'status_change'      =>   'required',
            'indicator_value'    =>   'required',
            'reports'            =>   'required',
            'progress'           =>   'required'
            ]);
            Permission::whereId($id)->update($validatedData);

            return back()->with('success', 'Permissões alteradas com Sucesso!'); 
    }
}