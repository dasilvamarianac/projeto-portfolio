<?php

namespace App\Http\Controllers;
use App\ProjectMember;
use App\Project;
use App\Permission;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ProjectMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            $this->acesso = Permission::where('profile',Auth::user()->profile)->first();
            return $next($request);
        });
    }

    public function index($id)
    {
        $acesso = $this->acesso;
        if( $acesso['project_member'] < 1) {
                return view('layouts.nopermission');
        }
        $data = DB::select("select m.name, pm.* from members as m, project_members as pm where project = ". $id ." and m.id = pm.member order by name");
        $members = DB::select("select distinct * from members where status = 1 and id not in (select member from project_members where project = ".$id.")");

        return view('projectmember.index', compact('data', 'members', 'id', 'acesso'));
    }


    public function store(Request $request)
    {     
        if($this->acesso['project_member'] < 2) {
                return view('layouts.nopermission');
        }
        $request->validate([
            'project'   =>   'required',
            'member' =>   'required',
        ]);
        ProjectMember::create($request->all());
        
        $proj = Project::findOrFail($request->project);


        $cad = count(DB::select("select * from project_indicators pi,
                    project_members pm
                    where pi.project = pm.project
                    and pi.project =" . $request->project));

        if($cad > 0 && $proj->status == 1){
           Project::where('id', $request->project)->update(array('status' => 2)); 
        }

        return redirect('/project/member/'.$request->project)->with('success', 'Membro criado com sucesso!'); 
    }

    public function destroy( Request $request, $id)
    {
        if($this->acesso['project_member'] < 4) {
                return view('layouts.nopermission');
        }
        $data = ProjectMember::findOrFail($request->id);

        $mem = ProjectMember::where('project', $data->project)->count();
        
        if($mem == 1 ){
            return redirect('/project/member/'.$data->project)->with('errors', 'Não é possível excluir todos os membros de um projeto.');
        }

        $data->delete();
  
        return redirect('/project/member/'.$data->project)->with('success', 'Membro excluído com sucesso '.  $mem);
    }
}