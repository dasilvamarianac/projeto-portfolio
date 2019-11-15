<?php

namespace App\Http\Controllers;
use App\IndicatorValue;
use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IndicatorValueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {     

        $status = $request->status + 1;

        $request->validate([
            'value'     =>   'required',
            'indicator_project' =>   'required'
        ]);

        IndicatorValue::create($request->all());    
        return back();
    }

}
