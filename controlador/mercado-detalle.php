<?php 
require_once "./modelo/mercado-productos.php";
$a=new mercado;
$_GET['id']??'';
$id=$_GET['id'];
$b=$a->getmercadoprod($id);

function asDollars($value) {
    if ($value<0) return "-".asDollars(-$value);
    return '$' . number_format($value, 2);
}
$i=$a->getimg($id);

?>