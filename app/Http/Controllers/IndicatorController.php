<?php

namespace App\Http\Controllers;
use App\Indicator;
use App\Project;
use App\Permission;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;


class IndicatorController extends Controller
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
        if($acesso['indicators'] < 1) {
            return abort(401);
        }
        $data = Indicator::latest()->where('status', 1)->get();
        return view('indicator.index', compact('data','acesso'));
    }

    public function create()
    {
        $acesso = $this->acesso;
        if($acesso['indicators'] < 2) {
            return abort(401);
        }
        return view('indicator.create', compact('data','acesso'));
    }

    public function store(Request $request)
    {

        if($this->acesso['indicators'] < 2) {
            return abort(401);
        }    

        $form_data = array(
            'name'    =>   $request->name,
            'desc'    =>   $request->desc,
            'creator' =>   Auth::user()->id
        );

        Indicator::create($form_data);

         return redirect('/indicator')->with('success', 'Indicador criado com sucesso!'); 
    }

    public function show($id)
    {
        return view('layouts.noroute');
    }



    public function edit($id)
    {
        $acesso = $this->acesso;
        if($acesso['indicators'] < 3) {
            return abort(401);
        }
        $data = Indicator::findOrFail($id);
        return view('indicator.edit', compact('data','acesso'));
    }

    protected function update(Request $request, $id)
    {
        
        if ($request->status == 0){
           if($this->acesso['indicators'] < 4) {
                return abort(401);
            } 
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Indicator::whereId($request->id)->update($validatedData);
            return redirect('/indicator')->with('success', 'Indicador excluído com sucesso!');   
        }else{
            if($this->acesso['indicators'] < 3) {
                return abort(401);
            }
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'desc' => 'required|string|max:500',
            ]);
            Indicator::whereId($id)->update($validatedData);
            return redirect('/indicator')->with('success', 'Indicador alterado com sucesso!'); 
        }
    }
    public function generatePDF($id)
    {
        if($this->acesso['reports'] < 1) {
            return abort(401);
        }
        if($id == 'all'){  
            $proj = DB::table('v_project')->where([
                                ['status', '!=', '9']
                            ])
                    ->get();
            $name = 'relatorio_geral.pdf';
        }
        else{
            $proj = DB::table('v_project')->where([
                                ['id', '=', $id]
                            ])
                    ->get();
            $name = 'relatorio_'.$id.'.pdf';
        }
        $ind = DB::table('v_projectindicators')->get();
        $value= DB::select("select *, DATE_FORMAT(created_at, '%d-%b-%Y') as 'date' from indicator_values order by indicator_project, created_at");
        $pdf = PDF::loadView('indicator.reportdownload', compact('id','proj','ind', 'value'));
        return $pdf->download($name);
    }

    public function report($id)
    {
        $acesso = $this->acesso;
        if($acesso['reports'] < 1) {
            return abort(401);
        }
        if($id == 'all'){  
            $proj = DB::table('v_project')
                    ->where([
                                ['status', '!=', '9']
                            ])
                    ->get();
        }
        else{
            $proj = DB::table('v_project')
                    ->where([
                                ['id', '=', $id]
                            ])
                    ->get();
        }
        $ind = DB::table('v_projectindicators')->get();
        $value= DB::select("select *, DATE_FORMAT(created_at, '%d-%b-%Y') as 'date' from indicator_values order by indicator_project, created_at");
        return view('indicator.report', compact('id', 'proj','ind', 'value','acesso'));
    }
    public function reportindex()
    {
        $acesso = $this->acesso;
        if($acesso['reports'] < 1) {
            return abort(401);
        }
        $data = DB::table('v_project')->get();
        return view('indicator.reportindex', compact('data','acesso'));
    }

    public function analysis($id)
    {
        $acesso = $this->acesso;
        if($acesso['indicators'] < 3) {
            return abort(401);
        }
        $all = DB::table('v_projectindicators')->get();
        return view('indicator.analysis', compact('all','acesso'));
    }
}