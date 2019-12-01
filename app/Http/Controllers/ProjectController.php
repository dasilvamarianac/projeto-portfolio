<?php

namespace App\Http\Controllers;
use App\Project;
use App\ProjectMember;
use App\ProjectIndicator;
use App\Permission;
use App\Progress;
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
        $acesso = $this->acesso;
        $profile = Auth::user()->profile;
        $id = Auth::user()->id;

        if( $acesso['projects'] < 1) {
                return abort(401);
        }
        if($profile == 1){
            $data = DB::table('v_project')->where('manager', $id)->get();
        }elseif($profile == 2){
            $data = DB::table('v_project')->where('leader', $id)->get();
        }elseif($profile == 3){
            $data = DB::table('v_project')->where('office_leader', $id)->get();
        }else{
            $data = DB::table('v_project')->get();
        }
        
        return view('project.index', compact('data','acesso'));
    }

    public function create()
    {
        $acesso = $this->acesso;
        if( $acesso['projects'] < 2) {
                return abort(401);
        }
        $users = DB::select("select * from users where status = 1 order by name");
        return view('project.create', compact('users','acesso'));
    }

    public function store(Request $request)
    {
        if($this->acesso['projects'] < 2) {
                return abort(401);
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

         return redirect('/project')->with('success', 'Projeto criado com sucesso!'); 
    }


    public function edit($id)
    {
        $acesso = $this->acesso;
        if( $acesso['projects'] < 3) {
                return abort(401);
        }
        $data = Project::findOrFail($id);
        $users = DB::select("select * from users where status = 1 order by name");
        return view('project.edit', compact('data', 'users','acesso'));
    }

    public function show($id)
    {
        $acesso = $this->acesso;
        if( $acesso['project_detail'] < 1) {
                return abort(401);
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
                and i.status = 1
                and p.id = ".$id);

        $prog = count(DB::select("select *  from progresses
                            where WEEK(CURDATE(), 3) = WEEK(created_at, 3)
                            and project = ".$id));

        $acomp = DB::select("select p.* , u.name,
                                        DATE_FORMAT(p.created_at,  '%d-%b-%Y') AS 'date'
                                from progresses p, users u 
                                where u.id = p.user
                                and p.project = ".$id);

        $sta = DB::table('v_changes')->where('project', $id)->get();
        
        return view('project.detail', compact('data', 'members','totalmem','totalind', 'indicators','acomp', 'prog','acesso', 'sta'));
    }

    protected function update(Request $request, $id)
    {
        if ($request->status == 0){
            if($this->acesso['projects'] < 4) {
                return abort(401);
            }
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Project::whereId($request->id)->update($validatedData);
            return redirect('/project')->with('success', 'Projeto excluído com sucesso!');   
        }else{
            if($this->acesso['projects'] < 3) {
                return abort(401);
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
            return redirect('/project')->with('success', 'Projeto alterado com sucesso!'); 
        }
    }
}