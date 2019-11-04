<?php

namespace App\Http\Controllers;
use App\Indicator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
}