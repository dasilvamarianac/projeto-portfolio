<?php

namespace App\Http\Controllers;
use App\ProjectMember;
use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;



class ProjectMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = DB::select("select m.name, pm.* from members as m, project_members as pm where project = ". $id ." and m.id = pm.member order by name");
        $members = DB::select("select distinct * from members where status = 1 and id not in (select member from project_members where project = ".$id.")");

        return view('projectmember.index', compact('data', 'members', 'id'));
    }


    public function store(Request $request)
    {     

        $request->validate([
            'project'   =>   'required',
            'member' =>   'required',
        ]);


        $proj = Project::findOrFail($request->project);

        $cad = count(DB::select("select * from project_indicators pi,
                    project_members pm
                    where pi.project = pm.project
                    and pi.project =" . $request->project));

        if($cad > 0 && $proj->status == 1){
           Project::where('id', $request->project)->update(array('status' => 2)); 
        }

        ProjectMember::create($request->all());


        return redirect('/project/member/'.$request->project)->with('success', 'Indicador criado com sucesso!'); 
    }

    public function destroy( Request $request, $id)
    {
        $data = ProjectMember::findOrFail($request->id);
        $data->delete();
  
        return back()->with('success','Membro excluído com sucesso!');
    }
}