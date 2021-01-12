<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\AgriFincas;
use Carbon\Carbon;
use Mail;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class MedicionVariablesFinca extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:medicionfincameteo';
    private $data;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nueva medicion meteorologica';

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
        //$idfinca=45126;
        //$fincas = AgriFincas::all();
        //$data = null;
        $fincas = AgriFincas::where('activo','=',1)->get();


        foreach ($fincas as $finca) {

        $fincaq=AgriFincas::find($finca->id);
        $apiKey = "d13eb18064cea8bae2ef7ee7c6478111";
        //$destinatario = 'ricaza81@gmail.com';
        $destinatario = $finca->ingresado_por->email;
        $asunto = 'Nueva medición de variables meteorológicas';
        $fecha=date('Y-m-d-h:m:s');
        //$lat= 3.41;
        //$lon=-75.63;
        $lat= $fincaq->latitud;
        $lon= $fincaq->longitud;

        $client = new \GuzzleHttp\Client();
        
        //OneCall (tmax, tmin, uvindex)
        $request = $client->get('https://api.openweathermap.org/data/2.5/onecall?lat=' . $lat . "&lon=" . $lon . "&lang=en&units=metric&APPID=" . $apiKey);
        $response = $request->getBody()->getContents();
        $finca_onecall = json_decode($response);
        //OneCall (tmax, tmin, uvindex)

        //Weather Actual (tdia, humedad, presion)
        $request = $client->get('https://api.openweathermap.org/data/2.5/weather?lat=' . $lat . "&lon=" . $lon . "&lang=en&units=metric&APPID=" . $apiKey);
        $response = $request->getBody()->getContents();
        $finca_weather = json_decode($response);
          $data = json_decode($request->getBody()->getContents());
          if (isset($data["rain"]["1h"])) {
            $rain3h = $data["rain"]["1h"];
        } else {
            $rain3h = 0;
        }
        //$rain3h=$finca_weather['rain']['3h'];
        //$data = json_decode($finca_weather, true);
       /*  if (isset($finca_weather['rain']['3h'])) {
            $rain3h = $finca_weather['rain']['3h'];
        } else {
            $rain3h = 0;
        }*/
        //$data = json_decode($this->data, true);
        //$data = json_decode($request, true);
        /*if (isset($data['rain']['3h'])) {
            $rain3h = $data['rain']['3h'];
        } else {
            $rain3h = 0;
        }*/
         //Weather Actual (tdia, humedad, presion)

        //Forecast (precipitacion)
        $request = $client->get('https://api.openweathermap.org/data/2.5/forecast?lat=' . $lat . "&lon=" . $lon . "&lang=en&units=metric&APPID=" . $apiKey);
        $response = $request->getBody()->getContents();
        //$finca_forecast = json_decode($response);
        //$data = json_decode($response);
        $finca_forecast = json_decode($response);
       /* $data = json_decode($request->getBody()->getContents());
          if (isset($data['rain']['3h'])) {
            $rain3h = $data['rain']['3h'];
        } else {
            $rain3h = 0;
        }*/
        //Forecast (precipitacion)


        DB::table('visitastecnmeteo')->insert([
            [
                'id_finca'  =>  $finca->id,
                'tmax'      =>  $finca_onecall->daily[0]->temp->max,
                'tmin'      =>  $finca_onecall->daily[0]->temp->min,
                'tdia'      =>  $finca_weather->main->temp,
                'presion'   =>  $finca_weather->main->pressure,
                'humedad'   =>  $finca_weather->main->humidity,
                'velviento' =>  $finca_weather->wind->speed,
                //'precipi'   =>  $finca_weather->rain[0]->rain["1h"],
                //'precipi'   =>  $finca_weather->rain{1} || 0,
               // 'precipi'   =>  $finca_forecast->list[0]->rain && $finca_forecast->list[0]->rain['3h'] || 0,
              //  'precipi'   =>  $finca_forecast->main[0]->rain && $finca_forecast->main[0]->rain['3h'] || 0,
                //'precipi'   =>  $finca_forecast->list[0]->wind->speed,
               //'precipi'   =>  $finca_forecast->list[0]->rain && $finca_forecast->list[0]->rain || 0,
               //'precipi'   =>  $finca_weather->list[0]->rain->3h || 0,
               //'precipi'   =>  $finca_forecast->list[0]->rain->'3h' || 0,
                'precipi'   =>  $finca_forecast->list[0]->rain || 0,
               // 'precipi' =>  $rain3h,
                //data.list[0].wind
                'uvindex'   =>  $finca_onecall->daily[0]->uvi


            ]

            ]);

  $data = array(
                'fecha'     =>  $fecha,
                'id_finca'  =>  $finca->id,
                'nombre_finca'  =>  $finca->finca,
                'pronostico'  =>  $finca->urlreport,
                'tmax'      =>  $finca_onecall->daily[0]->temp->max,
                'tmin'      =>  $finca_onecall->daily[0]->temp->min,
                'tdia'      =>  $finca_weather->main->temp,
                'presion'   =>  $finca_weather->main->pressure,
                'humedad'   =>  $finca_weather->main->humidity,
                'velviento' =>  $finca_weather->wind->speed,
                'precipi'   =>  $finca_forecast->list[0]->rain || 0,
                //'precipi'   =>  $finca_forecast->list[0]->rain && $finca_forecast->list[0]->rain || 0,
                //'precipi' =>    $rain3h,
                 'mediciones'=>'https://datastudio.google.com/reporting/bdf40963-26f9-4d0d-a51f-00ebfc92ce7e/page/rTqnB?params=%7B%22df40%22:%22include%25EE%2580%25800%25EE%2580%2580IN%25EE%2580%2580'.$finca->finca."%22%7D",
                'uvindex'   =>  $finca_onecall->daily[0]->uvi
                        );

            Mail::send('correo.reportmeteo.plantilla_reportmeteo', $data, function ($message) use ($asunto,$destinatario) {
                    //$message->from('crm@aplicatics.com', 'CRM Aplicatics');
                    $message->to($destinatario)->cc('ricaza81@gmail.com')->subject($asunto);  
                  //  $message->to($destinatario)->subject($asunto);  
                });
  
        }

    }
        

}
