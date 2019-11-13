<?php

namespace App\Http\Controllers;
use App\ProjectMember;
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