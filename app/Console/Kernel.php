<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
use App\Controllers\EmailController;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            //if(gmdate('t') == gmdate('d')){
                $data['projects']  = DB::table('v_cancellations')->get();
            
                $emaildb = DB::select("select email from users where profile = 4 and status = 1");

                $emails = array();

                foreach ($emaildb as $row) {
                    array_push($emails, $row->email);
                }

                Mail::send('email.cancellations', $data, function($message) use ($emails) {
         
                    $message->to($emails)->subject('Portfoli - Projetos Cancelados');
                });
            //}        
        })->everyThirtyMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
