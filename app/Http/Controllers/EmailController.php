<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
class EmailController extends Controller
{
    public function sendcancellations()
    {
        $data = DB::table('v_cancellations')->get();
 
        Mail::send('email.cancellations', $data, function($message) {
 
            $message->to('dasilva.marianac@gmail.com', 'Mariana')
                    ->subject('Portfoli - Projetos Cancelados');
        });
    }

    public function sendindicators($id)
    { 
        $proj = DB::table('v_project')->where('id', $id)->get();
        Mail::send('email.indicators', $data, function($message) {
 
            $message->to('dasilva.marianac@gmail.com', 'Mariana')
                    ->subject('Portfoli - Projetos Cancelados');
        });
    }
}