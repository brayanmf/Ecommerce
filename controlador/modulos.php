<?php
$modulo=$_GET['modulo']??'';
if($modulo=="productos" || $modulo==""){
    require_once "./controlador/mercado-productos.php";
}
if($modulo=="mercado-detalle"){
    require_once "./mercado-detalle.php";
}
if($modulo=="carrito"){
    require_once "./carrito.php";
}
if($modulo=="envio"){
    require_once "./envio.php";
}
if($modulo=="pasarela" && isset($_SESSION['idcliente'])){
    require_once "./pasarela.php";
}
if($modulo=="factura"){
    require_once "./factura.php";
}



?>
