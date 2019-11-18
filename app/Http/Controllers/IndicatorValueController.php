<?php

namespace App\Http\Controllers;
use App\IndicatorValue;
use App\ProjectIndicator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect,Response,Config;
use Mail;


class IndicatorValueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {     
        $ind = ProjectIndicator::findOrFail($request->indicator_project);
        
        $value = $request->value;

        $request->validate([
            'value'     =>   'required',
            'indicator_project' =>   'required'
        ]);

        IndicatorValue::create($request->all()); 

        if ($value > $ind->max_value || $value < $ind->min_value){
            
            $data['indicators'] = DB::table('v_outindicators')
                        ->where([
                                    ['project', '=', $ind->project],
                                    ['status', '=', $ind->status]
                                ])->get();


            if(count($data['indicators']) >= 3){
                
                $data['projects'] = DB::table('v_project')->where('id', $ind->project)->get();

                $emaildb = DB::select("select email from users where profile = 4 and status = 1");

                $emails = array();

                foreach ($emaildb as $row) {
                    array_push($emails, $row->email);
                }

                Mail::send('email.warningind', $data, function($message) use ($emails) {
         
                    $message->to($emails)->subject('Portfoli - Alerta de Indicadores!' );
                });
            }
            
        }   

        return back();
    }

}
