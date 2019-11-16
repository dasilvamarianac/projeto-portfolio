<?php

namespace App\Http\Controllers;
use App\ProjectIndicator;
use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ProjectIndicatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = DB::table('v_projectindicators')->where('project', $id)->get();
        return view('projectindicator.index', compact('data','id'));
    }

    public function create($id)
    {
        $data = DB::select("select * from indicators where status = 1 order by name");
        return view('projectindicator.create', compact('data','id'));
    }


    public function store(Request $request)
    {     

        $request->validate([
            'project'   =>   'required',
            'indicator' =>   'required',
            'status'    =>   'required',
            'max_value' =>   'required',
            'min_value' =>   'required',
        ]);

        

        $proj = Project::findOrFail($request->project);

        $cad = count(DB::select("select * from project_indicators pi,
                    project_members pm
                    where pi.project = pm.project
                    and pi.project =" . $request->project));

        if($cad > 0 && $proj->status == 1){
           Project::where('id', $request->project)->update(array('status' => 2)); 
        }
        
        ProjectIndicator::create($request->all());

        return back();

    }

    public function show($id)
    {
        $data = ProjectIndicator::findOrFail($id);
        return view('projectindicator.edit', compact('data'));
    }

    public function edit($id)
    {
        $data = DB::table('v_projectindicators')->where('id', $id)->first();
        return view('projectindicator.edit', compact('data'));
    }

    protected function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status'    =>   'required',
            'max_value' =>   'required',
            'min_value' =>   'required'
            ]);
            ProjectIndicator::whereId($id)->update($validatedData);
            return redirect('/projectindicator')->with('success', 'Indicador alterado com sucesso!');
    }

    public function destroy( Request $request, $id)
    {
        $data = ProjectIndicator::findOrFail($request->id);
        $data->delete();
  
        return back();
    }
}