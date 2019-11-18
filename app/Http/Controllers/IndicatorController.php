<?php

namespace App\Http\Controllers;
use App\Indicator;
use App\Project;
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
    }

    public function index()
    {
        $data = Indicator::latest()->where('status', 1)->get();
        return view('indicator.index', compact('data'));
    }

    public function create()
    {
        return view('indicator.create', compact('data'));
    }

    public function store(Request $request)
    {
       

        $form_data = array(
            'name'    =>   $request->name,
            'desc'    =>   $request->desc
        );

        Indicator::create($form_data);

         return redirect('/indicator')->with('success', 'Indicador criado com sucesso!'); 
    }

    public function show($id)
    {
        $data = Indicator::findOrFail($id);
        return view('indicator.edit', compact('data'));
    }

    public function edit($id)
    {
        $data = Indicator::findOrFail($id);
        return view('indicator.edit', compact('data'));
    }

    protected function update(Request $request, $id)
    {
        if ($request->status == 0){
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Indicator::whereId($request->id)->update($validatedData);
            return redirect('/indicator')->with('success', 'Indicador excluído com sucesso!');   
        }else{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'desc' => 'required|string|max:255',
            ]);
            Indicator::whereId($id)->update($validatedData);
            return redirect('/indicator')->with('success', 'Indicador alterado com sucesso!'); 
        }
    }
    public function generatePDF($id)
    {
        if($id == 'all'){  
            $proj = DB::table('v_project')->where([
                                ['status', '!=', '9']
                            ])
                    ->get();;
        }
        else{
            $proj = DB::table('v_project')->where('id', $id)->get();
        }
        $ind = DB::table('v_projectindicators')->get();
        $value= DB::select("select *, DATE_FORMAT(created_at, '%d-%b-%Y') as 'date' from indicator_values order by indicator_project, created_at");
        $pdf = PDF::loadView('indicator.reportdownload', compact('id','proj','ind', 'value'));
        return $pdf->download('relatorio_geral.pdf');
    }

    public function report($id)
    {
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
                                ['id', '=', $id],
                                ['status', '!=', '9']
                            ])
                    ->get();
        }
        $ind = DB::table('v_projectindicators')->get();
        $value= DB::select("select *, DATE_FORMAT(created_at, '%d-%b-%Y') as 'date' from indicator_values order by indicator_project, created_at");
        return view('indicator.report', compact('id', 'proj','ind', 'value'));
    }
    public function reportindex()
    {
        $data = DB::table('v_project')
                ->where([
                            ['status', '!=', '9']
                        ])
                ->get();
        return view('indicator.reportindex', compact('data'));
    }
}