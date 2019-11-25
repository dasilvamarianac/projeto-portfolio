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
        $acesso = $this->acesso;
        if($acesso['permissions'] < 1) {
            return abort(401);
        }
        
        return view('permission.index',compact('data','acesso'));
    }

    public function edit($id)
    {
        $acesso = $this->acesso;
        if($acesso['permissions'] > 3) {
            return abort(401);
        }
        $data = Permission::where('profile', $id)->first();
        return view('permission.edit', compact('data','acesso'));
    }

    protected function update(Request $request, $id)
    {
        if($this->acesso['permissions'] > 3) {
            return abort(401);
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
            'progress'           =>   'required',
            'analysis'           =>   'required'
            ]);
            Permission::whereId($id)->update($validatedData);

            return back()->with('success', 'Permissões alteradas com Sucesso!'); 
    }
}