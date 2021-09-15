<?php

namespace App\Console\Commands;

use App\Models\emailautomated;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Mail\MarquetingMail;
use Illuminate\Support\Facades\Mail;


class EmailTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send automated emails from wordpress plugin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /**
         * haciendo correr las tareas
         */
       // Storage::append("archivo.txt",$item->title);
           
        
      $emails_aut=emailautomated::where('active','=',true )->where(Carbon::now()->englishDayOfWeek,'=',Carbon::now()->englishDayOfWeek )->get();
        $valor=$emails_aut->count();
     
            $emails_aut->each(function($item,$key){
                
                
                $array_string=explode(";",$item->recipients);//recorriendo el array de los subcriptores
               
                //validar hora de envio
                $fecha_actual_instantanea=Carbon::now();
                if($fecha_actual_instantanea >= $fecha_actual_instantanea->setTimeFrom($item->timecrom)
                && $fecha_actual_instantanea->format('Y-m-d')!=$item->date_today_updated )
                {
               
                             
               foreach($array_string as $arr)
                {
                                     
                   
                    $email=new MarquetingMail($item->body);
                    $email->setSubject($item->title);

                    Mail::to($arr)->send($email);
                } 
                //desactivando el correo automatico en caso de que no sea repetitivo
                $item->repeat=='N' ? $item->active=false : $item->active=true;
                $item->date_today_updated=$fecha_actual_instantanea->format('Y-m-d');
                $item->save();
            }

      });
 
       
    }
}
