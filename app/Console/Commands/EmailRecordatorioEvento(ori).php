<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;

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
    protected $description = 'Recordatorio Inicio Evento';

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

        foreach ($usuarios as $usuario) {
            if(sizeof($usuario->eventos_recordatorio)){

                $asunto = 'Recordatorio de Eventos (desde cron)';

                $destinatario = 'ricaza81@gmail.com';
               // $destinatario = $usuario->email;

                $data = array(
                            'nombres' => $usuario->nombres,
                            'email' => $usuario->email,
                            'eventos' => $usuario->eventos_recordatorio
                        );

                Mail::send('correo.plantilla_evento_recordatorio', $data, function ($message) use ($asunto,$destinatario) {
                    //$message->from('crm@aplicatics.com', 'CRM Aplicatics');
                    $message->to($destinatario)->cc('ricardozambrano@aplicatics.com')->subject($asunto);  
                    $message->to($destinatario)->subject($asunto);  
                });

            }
        }

    	//Mostrando el resultado
    	$this->info('Recordatorio enviado!');
    }
}
