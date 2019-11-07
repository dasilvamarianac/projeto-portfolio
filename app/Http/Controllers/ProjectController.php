<?php

namespace App\Http\Controllers;
use App\Project;
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
    }

    public function index()
    {
        $data = Project::latest()->where('status', 1)->get();
        return view('project.index', compact('data'));
    }

    public function create()
    {
        $ger = DB::select("select id, name from users where status = 1 and profile = 1 order by name");
        $lid = DB::select("select id, name from users where status = 1 and profile = 2 order by name");
        return view('project.create', compact('ger'), compact('lid'));
    }

    public function store(Request $request)
    {
       

        $form_data = array(
            'name'          =>   $request->name,
            'desc'          =>   $request->desc,
            'budget'        =>   $request->budget,
            'start_date'    =>   $request->start_date,
            'expected_date' =>   $request->expected_date,
            'leader'        =>   $request->leader,
            'manager'       =>   $request->manager,
            'office_leader' =>   $request->office_leader,
            'risk' =>   $request->risk

        );

        Project::create($form_data);

         return redirect('/project')->with('success', 'Indicador criado com sucesso!'); 
    }

    public function show($id)
    {
        $data = Project::findOrFail($id);
        return view('project.edit', compact('data'));
    }

    public function edit($id)
    {
        $data = Project::findOrFail($id);
        return view('project.edit', compact('data'));
    }

    protected function update(Request $request, $id)
    {
        if ($request->status == 0){
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Project::whereId($request->id)->update($validatedData);
            return redirect('/project')->with('success', 'Indicador excluído com sucesso!');   
        }else{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'required|string|max:255',
            ]);
            Project::whereId($id)->update($validatedData);
            return redirect('/project')->with('success', 'Indicador alterado com sucesso!'); 
        }
    }
}