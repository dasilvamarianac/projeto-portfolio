<?php

namespace App\Http\Controllers;
use App\Project;
use App\ProjectMember;
use App\ProjectIndicator;
use App\Permission;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
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
        if($this->acesso['projects'] < 1) {
                return view('layouts.nopermission');
        }
        $data = DB::table('v_project')->get();
        return view('project.index', compact('data'));
    }

    public function create()
    {
        if($this->acesso['projects'] < 2) {
                return view('layouts.nopermission');
        }
        $users = DB::select("select * from users where status = 1 order by name");
        return view('project.create', compact('users'));
    }

    public function store(Request $request)
    {
        if($this->acesso['projects'] < 2) {
                return view('layouts.nopermission');
        }
        $form_data = array(
            'name'          =>   $request->name,
            'desc'          =>   $request->desc,
            'budget'        =>   $request->budget,
            'start_date'    =>   $request->start_date,
            'expected_date' =>   $request->expected_date,
            'leader'        =>   $request->leader,
            'manager'       =>   $request->manager,
            'office_leader' =>   $request->office_leader,
            'risk'          =>   $request->risk

        );

        Project::create($form_data);

         return redirect('/project')->with('success', 'Indicador criado com sucesso!'); 
    }


    public function edit($id)
    {
        if($this->acesso['projects'] < 3) {
                return view('layouts.nopermission');
        }
        $data = Project::findOrFail($id);
        $users = DB::select("select * from users where status = 1 order by name");
        return view('project.edit', compact('data', 'users'));
    }

    public function show($id)
    {
        if($this->acesso['project_detail'] < 1) {
                return view('layouts.nopermission');
        }
        $data = DB::table('v_project')->where('id', $id)->first();
        $totalmem = ProjectMember::where('project', $id)->count();
        $totalind = ProjectIndicator::where('project', $id)->count();
        $members = DB::select("select distinct * from members where status = 1 and id in (select member from project_members where project = ".$id.")");

        $indicators = DB::select("select pi.*, i.name 
            from    project_indicators as pi, 
                    indicators as i, 
                    projects as p
            where   pi.project = p.id
                and pi.indicator = i.id
                and p.status = pi.status
                and p.id = ".$id);
        
        return view('project.detail', compact('data', 'members','totalmem','totalind', 'indicators'));
    }

    protected function update(Request $request, $id)
    {
        if ($request->status == 0){
            if($this->acesso['projects'] < 4) {
                return view('layouts.nopermission');
            }
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Project::whereId($request->id)->update($validatedData);
            return redirect('/project')->with('success', 'Indicador excluído com sucesso!');   
        }else{
            if($this->acesso['projects'] < 3) {
                return view('layouts.nopermission');
            }
            $validatedData = $request->validate([
            'name'          =>  'required|string',
            'desc'          =>  'required|string',
            'budget'        =>  'required',
            'start_date'    =>  'required|date',
            'expected_date' =>  'required|date',
            'leader'        =>  'required|integer',
            'manager'       =>  'required|integer',
            'risk'          =>  'required|integer'
            ]);
            Project::whereId($id)->update($validatedData);
            return redirect('/project')->with('success', 'Indicador alterado com sucesso!'); 
        }
    }
}