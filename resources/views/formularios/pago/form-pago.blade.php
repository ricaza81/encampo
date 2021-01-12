 
@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
<div class="row docs-premium-template">
      <h5 class="box-title text-center">Cantidad Usuarios: <?=$cantidadusuarios?></h5>
      <h5 class="box-title text-center">Empresa: <?=$empresa->nombreempresa?></h5>
      <h3 class="box-title text-center">Estas listo(a) para iniciar la digitalizacion:</h3>



  <div class="col-md-4 text-center" style="padding-top:50px">
    <div class="box box-primary col-xs-6">                
        <div class="box-header">

      <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" class="form-group">        
             
                    
           

           <div class="card-header">         
            <h4 class="my-0 font-weight-normal">LITE (Gratis)</h4>
              <p class="sub-title">Nuestra version basica para equipos que recien estan comenzando.</p>
          </div>
          <div class="card-body text-center">

            <h1 class="card-title pricing-card-title">$0.00 <small class="text-muted">/ mensuales</small></h1>
            <div class="procing-table price-two wow flipInY" data-wow-delay="0.5s">
              <ul class="benefits text-left">

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/teams.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>1 Usuario</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/integrations.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Productos Ilimitados</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/gantt.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span style="">Agricultores ilimitados</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/roles.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Fincas ilimitadas</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611356/featuresIcons/projectTemplates.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Visitas Tecnicas Valorizadas</span>
                        </li>

                   

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611356/featuresIcons/support.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Demo Censo Agricola</span>
                        </li>

                      </ul>
                    </div>
         
          </div>
        </div>




</form>

  </div></div>



  <div class="col-md-4 text-center" style="padding-top:50px">
    <div class="box box-primary col-xs-6">                
        <div class="box-header">

      <form method="POST" action="https://checkout.payulatam.com/ppp-web-gateway-payu" class="form-group">        
             
                    <!--      <div class="form-group">
                              <label for="cantusers">Número de usuarios:</label>
                                <select name="cantusers1" class="form-control" id="cantusers1" required>
                                              <option>2</option>
                                               
                                        <?php  for($i=2;$i<=20;$i++){  ?>

                                              <option value="<?=$i?>"><?=$i?></option>
                                              <?php   } ?>
                                </select>   
                        </div>-->

           

           <div class="card-header">        
            <h4 class="my-0 font-weight-normal">Empresarial</h4>
              <p class="sub-title">Todo el poder de LITE, mas caracteristicas avanzadas para la automatizacion</p>
          </div>
          <div class="card-body text-center">

            <h1 class="card-title pricing-card-title">$25.000 <small class="text-muted">/ mensuales</small></h1>
            <div class="procing-table price-two wow flipInY" data-wow-delay="0.5s">
              <ul class="benefits text-left">

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/teams.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>De 2 a 20 Usuarios</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/integrations.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Productos Ilimitados</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/gantt.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span style="">Agricultores ilimitados</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/roles.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Roles de equipo</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611356/featuresIcons/projectTemplates.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Agenda de Seguimiento</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/timeTracker.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Full Censo Agricola</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611356/featuresIcons/support.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Soporte prioritario</span>
                        </li>

                      </ul>
                    </div>
  


  <input name="ctausers"    type="hidden"  >
  <input name="merchantId"    type="hidden"  value="501985"   >
  <input name="ApiKey"    type="hidden"  value="5donsg19veccjrqrpuhaqp571a"   >
  <input name="ApiLogin"    type="hidden"  value="56c65541d9c7b23"   >
  <input name="accountId"     type="hidden"  value="502805" >
  <input name="description"   type="hidden"  value="Plan Empresarial <?=$empresa->nombreempresa?>"  >

  
   <input name="extra1" type="hidden"  value="<?=$empresa->id?> " >
   <input name="extra2" type="hidden"  value="<?=$usuario->id?> " >
  
  
  


  



  <?php
           //$usuarios=select('cantusers1');
       // $usuarios=2;

          // $usuarios=input('ctausers');
            $amount=20*25000;
            $referenceCode='Pago Agronielsen ' .$empresa->nombreempresa.str_random(2);

            $signature=  md5("5donsg19veccjrqrpuhaqp571a~501985~$referenceCode~$amount~COP");

       

        ?>
        
   <input name="tax"           type="hidden"  value="<?=$cantidadusuarios*25000*0.0 ?>"  >
  <input name="taxReturnBase" type="hidden"  value="<?=$cantidadusuarios*25000*0.0 ?>" >
  <input name="currency"      type="hidden"  value="COP" >
  <input name="amount"        type="hidden"  value="<?=$amount?>"  >
  <input name="referenceCode" type="hidden"  value="<?=$referenceCode?>" >
  <input name="signature"     type="hidden"  value="<?=$signature; ?>"  >


  <input name="buyerEmail"    type="hidden"  value="<?=$usuario->email?>" >
  <input name="responseUrl"    type="hidden"  value="https://www.agronielsen.com/encampo/public/respuestapago" >

  
            <button type="submit" class="nbtn-two">Adquirir Plan</button>
          </div>
        </div>

</form>

  </div></div>


    <div class="col-md-4 text-center" style="padding-top:50px">
    <div class="box box-primary col-xs-6">                
        <div class="box-header">

     <form method="POST" action="https://checkout.payulatam.com/ppp-web-gateway-payu" class="form-group">             
             
                    
           

           <div class="card-header">         
            <h4 class="my-0 font-weight-normal">Enterprise</h4>
            <p class="sub-title">Todo el poder del plan EMPRESARIAL, aumentando mas control y soporte dedicado.</p>
          </div>
          <div class="card-body text-center">

            <h1 class="card-title pricing-card-title">$17.500<small class="text-muted">/ mensuales</small></h1>
            <div class="procing-table price-two wow flipInY" data-wow-delay="0.5s">
              <ul class="benefits text-left">

                           <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/teams.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>De 20 a 50 Usuarios.</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/integrations.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span >Permisos de usuario y administracion de roles avanzados.</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/gantt.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span style="">Seguridad de datos avanzada y recuperacion de datos, con copias de seguridad automatizadas.</span>
                        </li>

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/roles.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Entrenamiento personalizado y soporte prioritario.</span>
                        </li>

                    

                        <li>
                          <div class="featureIcon">
                            <img src="https://res.cloudinary.com/cegalvarez/image/upload/v1519611357/featuresIcons/timeTracker.png" alt="Multiples Teams" width="100%">
                          </div>
                          <span>Full Censo Agricola</span>
                        </li>


                      </ul>
                    </div>

   <input name="ctausers"    type="hidden"  >
  <input name="merchantId"    type="hidden"  value="501985"   >
  <input name="ApiKey"    type="hidden"  value="5donsg19veccjrqrpuhaqp571a"   >
  <input name="ApiLogin"    type="hidden"  value="56c65541d9c7b23"   >
  <input name="accountId"     type="hidden"  value="502805" >
  <input name="description"   type="hidden"  value="Plan Empresarial <?=$empresa->nombreempresa?>"  >

  
   <input name="extra1" type="hidden"  value="<?=$empresa->id?> " >
   <input name="extra2" type="hidden"  value="<?=$usuario->id?> " >
  
  
  


  



  <?php
           //$usuarios=select('cantusers1');
       // $usuarios=2;

          // $usuarios=input('ctausers');
            $amount=50*17500;
            $referenceCode='Pago Agronielsen ' .$empresa->nombreempresa.str_random(2);

            $signature=  md5("5donsg19veccjrqrpuhaqp571a~501985~$referenceCode~$amount~COP");


       

        ?>
        
   <input name="tax"           type="hidden"  value="<?=50*25000*0.0 ?>"  >
  <input name="taxReturnBase" type="hidden"  value="<?=50*25000*0.0 ?>" >
  <input name="currency"      type="hidden"  value="COP" >
  <input name="amount"        type="hidden"  value="<?=$amount?>">
  <input name="referenceCode" type="hidden"  value="<?=$referenceCode?>" >
  <input name="signature"     type="hidden"  value="<?=$signature; ?>"  >


  <input name="buyerEmail"    type="hidden"  value="<?=$usuario->email?>" >
  <input name="responseUrl"    type="hidden"  value="https://www.agronielsen.com/encampo/public/respuestapago" >

            <button type="submit" class="nbtn-two">Adquirir Plan</button>
          </div>
        </div>




</form>

  </div></div>

          
                         


                         




<style>
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}


.nbtn-two {
    background: #3224af;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-size: 20px;
    padding: 9px 28px;
    border: 1px solid transparent;
    
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
     border-radius: calc(1.25rem - 1px) calc(1.25rem - 1px) 0 0;
    border-bottom: 1px solid rgba(0,0,0,.125);
   
}


</style>

                  <style>
                      .benefits ul {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    list-style-type: none;
    padding: 0;
    text-align: left;
    border: 1px solid #000;
}

.featureIcon {
    min-width: 35px;
    width: 35px;
    height: 35px;
    display: flex;
    margin-right: 10px;
    overflow: hidden;
}

.benefits li {
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-basis: 100%;
    justify-content: flex-start;
    align-items: center;
    min-height: 50px;
    max-height: 200px;
    font-size: 15px;
    font-weight:500;
    padding:10px;
    border-bottom: 1px solid #000;
}

.procing-table {
    text-align: center;
    position: relative;
    padding: 5px 22px 10px 0px;
    border: 1px solid #f0f0fa;
    background: #fafcff;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    margin-bottom: 8px;
}

.benefits span {
    color: #808080;
    font-family: 'Roboto',sans-serif;
    font-weight: 700;
    float:left;
    line-height:20px;
}
</style>

@endsection    