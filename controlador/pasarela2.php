<?php



// SDK de Mercado Pago
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-355304604294042-071504-c5b0c1c9564f6924ef3f75e02b6566e3-791522537');
// Crea un objeto de preferenciaTEST-355304604294042-071504-c5b0c1c9564f6924ef3f75e02b6566e3-791522537

$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';

$item->quantity =unserialize($_GET['total']);

$item->unit_price = 1;
$preference->items = array($item);



$preference->back_urls = array(
 "success" => "".$_SERVER['SERVER_NAME']."/php/ecommerce1/index.php?modulo=factura",/*.$_GET['array']. &array=".$_GET['total']."*/
  /* "success" => "localhost/ecommerce1/index.php?modulo=factura&cantidad=".urldecode($cantidad)."&precio=".urldecode($precio)."&subtotal=".urldecode($subtotal)."&total=".$_GET['total']."",*/
    "failure" => "http://www.tu-sitio/failure"
);
$preference->auto_return = "approved";
$preference->save();


?>