<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;

class EmailController extends Controller
{
     public function sendcancellations()
    {
        if(gmdate('t') == gmdate('d')){
            $data['projects']  = DB::table('v_cancellations')->get();
        
            $emaildb = DB::select("select email from users where profile = 4 and status = 1");

            $emails = array();

            foreach ($emaildb as $row) {
                array_push($emails, $row->email);
            }

            Mail::send('email.cancellations', $data, function($message) use ($emails) {
     
                $message->to($emails)->subject('Portfoli - Projetos Cancelados');
            });
        }         
    }
}