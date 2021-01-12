<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;

class EmailBalanceEmpresa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:empresa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resultados de tu gestion en campo';

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
        $usuariosempresa = User::all();

       // $idempresa=$usuario->idEmpresa;
       // $usuarios=User::where('idEmpresa','=',$idempresa);

        foreach ($usuariosempresa as $usuarioempresa) 
            if(sizeof($usuarioempresa->visitatecnica)){

                $idempresa=$usuarioempresa->empresa->id;
                $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();

                
                
                $asunto = 'Resultados de tu Gestion';

            foreach($usuariosempresa as $usuarioempresa){
                $destinatario = 'ricaza81@gmail.com';
              //  $destinatario = $usuarioempresa->email;

                $data = array(
                            'nombres' => $usuarioempresa->nombres,
                            'email' => $usuarioempresa->email,
                            'visitas' => $usuarioempresa->visitatecnica
                        );

                Mail::send('correo.balance_actual_empresa', $data, function ($message) use ($asunto,$destinatario,$usuariosempresa) {
                    //$message->from('crm@aplicatics.com', 'CRM Aplicatics');
                    $message->to($destinatario)->cc('ricaza81@gmail.com')->subject($asunto);  
                  //  $message->to($destinatario)->subject($asunto);  
                });
}
            }
        

    	//Mostrando el resultado
    	$this->info('Balance enviado!');
    }
}