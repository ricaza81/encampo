 
@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

      <h5 class="box-title text-center">Confirmación de tu pago:</h5>
    

<?php
$ApiKey = "5donsg19veccjrqrpuhaqp571a";
$merchant_id = $_REQUEST['merchantId'];
$referenceCode = $_REQUEST['referenceCode'];
$TX_VALUE = $_REQUEST['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_REQUEST['currency'];
$transactionState = $_REQUEST['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $_REQUEST['signature'];
$reference_pol = $_REQUEST['reference_pol'];
$cus = $_REQUEST['cus'];
$extra1 = $_REQUEST['extra1'];
$extra2 = $_REQUEST['extra2'];
$pseBank = $_REQUEST['pseBank'];
$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
$transactionId = $_REQUEST['transactionId'];

if ($_REQUEST['transactionState'] == 4 ) {
  $estadoTx = "Transacción aprobada";
}

else if ($_REQUEST['transactionState'] == 6 ) {
  $estadoTx = "Transacción rechazada";
}

else if ($_REQUEST['transactionState'] == 104 ) {
  $estadoTx = "Error";
}

else if ($_REQUEST['transactionState'] == 7 ) {
  $estadoTx = "Transacción pendiente";
}

else {
  $estadoTx=$_REQUEST['mensaje'];
}


if (strtoupper($firma) == strtoupper($firmacreada)) {
?>
  <h2>Resumen Transacción</h2>
  <table>
  <tr>
  <td>Estado de la transaccion</td>
  <td><?php echo $estadoTx; ?></td>
  </tr>
  <tr>
  <tr>
  <td>ID de la transaccion</td>
  <td><?php echo $transactionId; ?></td>
  </tr>
    <tr>
  <td>Id Empresa</td>
  <td><?php echo $extra1; ?></td>
  </tr>
  <tr>
      <tr>
  <td>Id Usuario</td>
  <td><?php echo $extra2; ?></td>
  </tr>
  <tr>
  <td>Referencia de la venta</td>
  <td><?php echo $reference_pol; ?></td>
  </tr>
  <tr>
  <td>Referencia de la transaccion</td>
  <td><?php echo $referenceCode; ?></td>
  </tr>
  <tr>
  <?php
  if($pseBank != null) {
  ?>
    <tr>
    <td>cus </td>
    <td><?php echo $cus; ?> </td>
    </tr>
    <tr>
    <td>Banco </td>
    <td><?php echo $pseBank; ?> </td>
    </tr>
  <?php
  }
  ?>
  <tr>
  <td>Valor total</td>
  <td>$<?php echo number_format($TX_VALUE); ?></td>
  </tr>
  <tr>
  <td>Moneda</td>
  <td><?php echo $currency; ?></td>
  </tr>
  <tr>
  <td>Descripción</td>
  <td><?php echo ($extra1); ?></td>
  </tr>
  <tr>
  <td>Entidad:</td>
  <td><?php echo ($lapPaymentMethod); ?></td>
  </tr>
  </table>
<?php
}
else
{
?>
  <h1>Error validando firma digital.</h1>
<?php
}
?>

@endsection    