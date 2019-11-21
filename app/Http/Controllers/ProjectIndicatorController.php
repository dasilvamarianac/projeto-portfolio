<?php

namespace App\Http\Controllers;
use App\ProjectIndicator;
use App\Project;
use App\Permission;
use App\IndicatorValue;
use Auth;
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
        $this->middleware(function($request, $next){
            $this->acesso = Permission::where('profile',Auth::user()->profile)->first();
            return $next($request);
        });
    }

    public function index($id)
    {
        $acesso = $this->acesso;
        if( $acesso['project_indicators'] < 1) {
            return view('layouts.nopermission');
        }
        $data = DB::table('v_projectindicators')->where('project', $id)->get();
        return view('projectindicator.index', compact('data','id','acesso'));
    }

    public function create($id)
    {
        $acesso = $this->acesso;
        if( $acesso['project_indicators'] < 2) {
            return view('layouts.nopermission');
        }
        $data = DB::select("select * from indicators where status = 1 order by name");
        return view('projectindicator.create', compact('data','id','acesso'));
    }


    public function store(Request $request)
    {     
        if($this->acesso['project_indicators'] < 2) {
            return view('layouts.nopermission');
        }
        $request->validate([
            'project'   =>   'required',
            'indicator' =>   'required',
            'status'    =>   'required',
            'max_value' =>   'required',
            'min_value' =>   'required',
        ]);
        ProjectIndicator::create($request->all());
        
        $proj = Project::findOrFail($request->project);

        $cad = count(DB::select("select * from project_indicators pi,
                    project_members pm
                    where pi.project = pm.project
                    and pi.project =" . $request->project));

        if($cad > 0 && $proj->status == 1){
           Project::where('id', $request->project)->update(array('status' => 2)); 
        }
        
        

        return redirect('/project/indicator/'.$request->project)->with('success', 'Indicador criado com sucesso!'); 

    }


    public function edit($id)
    {
        $acesso = $this->acesso;
        if( $acesso['project_indicators'] <3) {
            return view('layouts.nopermission');
        }
        $data = DB::table('v_projectindicators')->where('id', $id)->first();
        return view('projectindicator.edit', compact('data','acesso'));
    }

    protected function update(Request $request, $id)
    {
        if($this->acesso['project_indicators'] <3) {
            return view('layouts.nopermission');
        }
        $validatedData = $request->validate([
            'status'    =>   'required',
            'max_value' =>   'required',
            'min_value' =>   'required'
            ]);
            ProjectIndicator::whereId($id)->update($validatedData);

            return redirect('/project/indicator/'.$request->project)->with('success', 'Indicador alterado com sucesso!'); 
    }

    public function destroy( Request $request, $id)
    {
        if($this->acesso['project_indicators'] <4) {
            return view('layouts.nopermission');
        }
        $data = ProjectIndicator::findOrFail($request->id);

        $iv = IndicatorValue::where('indicator_project', $data->id)->count();
        
        if($iv > 0 ){
            return redirect('/project/indicator/'.$data->project)->with('errors', 'Indicador não pode ser excluído pois já foi informado durante  progresso do Projeto ');
        }

        $data->delete();
  
        return redirect('/project/indicator/'.$data->project)->with('success', 'Indicador excluído com sucesso ');
    }
}