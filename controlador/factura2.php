<?php 
require_once('./modelo/mercado-productos.php');



if($_GET['status']=="approved"){

    $producto=new mercado;
    $producto->id=$_SESSION['idcliente'];
    $producto->idp=$_GET['preference_id'];
    $a=$producto->insertventas();

    if($a){
    $array=array();

    $array=$_SESSION['array'];
    var_dump($array);

        echo "<br>la venta fue exitosa con el id".$producto->idp;
    }



}

?>