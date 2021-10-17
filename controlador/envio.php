<?php
require_once('./modelo/mercado-productos.php');
require_once('./modelo/clienterec.php');
$error=array();/*array para los errores */
$cli=new UsuarioData;
$rec=new clienterec;
if(isset($_POST['guardar'])){

    if (empty($_POST['nombrecli'])){/*compruevbo que no esta vacia */
        $error['nombrecli']=" El nombre  del cliente es requerido ";
    
    }
    if(empty($_POST['emailcli'])){
        $error['emailcli']="El email del cliente es requerido ";
    
    }
    if(empty($_POST['direccioncli'])){
        $error['direccioncli']="La direccion del cliente es requerida";
    
    }
    if (empty($_POST['nombrerec'])){/*compruevbo que no esta vacia */
        $error['nombrecli']=" El nombre  del receptor es requerido ";
    
    }
    if(empty($_POST['emailrec'])){
        $error['emailcli']="El email del receptor es requerido ";
    
    }
    if(empty($_POST['direccionrec'])){
        $error['direccionrec']="La direccion del receptor es requerida";
    
    }
    if(count($error)==0){
  
        $cli->user_name=$_POST['nombrecli'];
        $cli->email=$_POST['emailcli'];
        $cli->direccion=$_POST['direccioncli'];
        $a=$cli->update($_SESSION['idcliente']);
 
        $rec->nombre=$_POST['nombrerec'];
        $rec->email=$_POST['emailrec'];
        $rec->direccion=$_POST['direccionrec'];
        $rec->idCli=$_SESSION['idcliente'];
        

        $b=$rec->insertrec();

$total=serialize($_POST['total']);
//$cantidad=serialize($_POST['cantidad']);/*trae en un string (150,1500,1500) */
//$precio=serialize($_POST['precio']);/*crear un super array  alamcenas los 3 ,lo serializas  */
//$subtotal=serialize($_POST['subtotal']);/*esto se mezclaba serializndolo&*/
$total=urldecode($total);
/*$cantidad=urlencode($cantidad);
$precio=urlencode($precio);
$subtotal=urlencode($subtotal);*/
$array=array();
$array[]=$_POST['cantidad'];
$array[]=$_POST['precio'];
$array[]=$_POST['subtotal'];
$_SESSION['array']=$array;


        if($a && $b){
            header('location: index.php?modulo=pasarela&total='.$total.'');
           /* echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=pasarela"';*/
           exit();
        }else{
            $error['error']="error en la base de datos";
        }

    }



}


$a=$cli->getuser($_SESSION['idcliente']);
$b=$rec->getrec($_SESSION['idcliente']);


?>