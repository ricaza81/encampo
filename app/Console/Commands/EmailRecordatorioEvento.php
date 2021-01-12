<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class EmailRecordatorioEvento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:evento';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recordatorio Inicio Visita Técnica';

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
     * @return mixed
     */
    public function handle()
    {

        //* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
        $usuarios = User::all();

       // $idempresa=$usuario->idEmpresa;
       // $usuarios=User::where('idEmpresa','=',$idempresa);

        foreach ($usuarios as $usuario) {
            if(sizeof($usuario->visitas_recordatorio)) {

                $idempresa=$usuario->empresa->id;
                $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
                $asunto = 'Recordatorio de Visitas Técnicas';
                
            
            foreach($usuariosempresa as $usuarioempresa){
               // $destinatario = 'ricaza81@gmail.com';
                $destinatario = $usuarioempresa->email;
               $fecha=date('Y-m-d');

                $data = array(
                            'nombres' => $usuario->nombres,
                            'email' => $usuario->email,
                            'visitas' => $usuario->visitas_recordatorio,
                            'fecha' =>   $fecha,
                        );
            
                Mail::send('correo.plantilla_evento_recordatorio', $data, function ($message) use ($asunto,$fecha,$destinatario) {
                    //$message->from('crm@aplicatics.com', 'CRM Aplicatics');
                    $message->to($destinatario)->cc('ricaza81@gmail.com')->subject($asunto);  
                    $message->to($destinatario)->subject($asunto);  
                });
            }
            }
        }
        

    	//Mostrando el resultado
    	$this->info('Recordatorio enviado!');
    }

}
