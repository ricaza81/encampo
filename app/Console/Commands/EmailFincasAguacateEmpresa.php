<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\UsuariosEmpresas;
use App\AgriVisitasTecnicas;
use App\ModAguacateFincas;
use App\ModAguacateFincasVisitas;
use Mail;

class EmailFincasAguacateEmpresa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:fincasgctempresa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reporte de fincas';

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
        $empresas = UsuariosEmpresas::all();

       // $idempresa=$usuario->idEmpresa;
       // $usuarios=User::where('idEmpresa','=',$idempresa);

        foreach ($empresas as $empresa) 
            if(sizeof($empresa->fincasgctempresa)){

                $idempresa=$empresa->id;
                $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();

                
                
                $asunto = 'Consolidado de Fincas';

           foreach($usuariosempresa as $usuarioempresa){
             //   $destinatario = 'ricaza81@gmail.com';
             //   $destinatario = $empresa->$usuariosempresa->email;
                 $destinatario = $usuarioempresa->email;
               $usuarios=count($usuariosempresa);
            //   $visitas=visitasagctempresa($usuarioempresa->idEmpresa));
            //   $visitas=2;

                $data = array(
                            'nombres' => $empresa->nombreempresa,
                            'usuarios'=> $usuarios,
                         //   'email' => 'mcooper81@gmail.com',
                            'fincas' => $empresa->fincasgctempresa,
                            'visitas' => $empresa->visitasagctempresa,
                        );

                Mail::send('mod_aguacate.correos.balance_fincas_empresa', $data, function ($message) use ($asunto,$destinatario,$usuariosempresa) {
                    //$message->from('crm@aplicatics.com', 'CRM Aplicatics');
                  //  $message->to('ricaza81@gmail.com')->subject($asunto); 
                    $message->to($destinatario,'ricaza81@gmail.com')->subject($asunto);  
                   // ->cc('ricaza81@gmail.com');->subject($asunto);  
                  //  $message->to($destinatario)->subject($asunto);  
                });
}
            }
        

    	//Mostrando el resultado
    	$this->info('Balance enviado!');
    }
}
