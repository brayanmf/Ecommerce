<?php
require_once "./modelo/product.php";
$error=array();/*array para los errores */

if (isset($_POST['guardar'])){

    if(empty($_POST['name'])){
        $error['email']="requerimos el nombre";
    }
    if(empty($_POST['precio'])){
        $error['pas']="requerimos el precio";
    }
    if(empty($_POST['existencia'])){
        $error['nombre']="requerimos el stock";
    }
    if(empty($_POST['detalle'])){
        $error['detalle']="Requerimos los detalles";
    }
    if(empty($_POST['carac'])){
        $error['carac']="Requerimos las caracteristicas";
    }
    if(count($_FILES["imagen"]['tmp_name'])!=3){
        $error['imagenes']="Elegir 3 imagenes";
    }
    if(max($_FILES['imagen']['size'])>2500000){
        $error['tama']="uno de las imagenes es muy grande el limite es 2mb";
    }
    /* $tipp= array();
    $tipo=$_FILES["imagen"]['type'];
    echo  $tipo[0];
    echo  $tipo[1]."2";*/
    
for ($i=0; $i <3 ; $i++) { //forma cutre 
    $tipo= array();
    $tipo=$_FILES["imagen"]['type'];
   // echo $tipo[$i];
  if($tipo[$i]=="image/jpg" || $tipo[$i]=="image/jpeg" || $tipo[$i]=="image/png" || $tipo[$i]=="image/gif"){

  }else{
    $error['tipo']="solo aceptamos imagenes con extensiones jpg,jpeg,png,gif";
    break;
}
}

 if(count($error)==0){
    $prod=new Producto;
        $prod->detalle=$_POST['detalle'];
        $prod->nombre=$_POST['name'];
        $prod->precio=$_POST['precio'];
        $prod->existencia=$_POST['existencia'];
        $prod->carac=$_POST['carac'];
        $b2=$prod->createproduct();
        foreach ($_FILES["imagen"]['tmp_name'] as $imagen=>$value){/*recorrer el directorio temporal */
           $nombre_imagen=$_FILES['imagen']['name'][$imagen];
            $t_imge=$_FILES['imagen']['size'][$imagen];
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/php/Ecommerce1/admin/dist/img/productos/';/*por que esta en una carpeta "php" */
            move_uploaded_file($_FILES['imagen']['tmp_name'][$imagen],$carpeta_destino.$nombre_imagen);
            $prod->filename=$nombre_imagen;
            $prod->web_path='/Ecommerce1/admin/dist/img/productos/'.$nombre_imagen;
            $prod->size=$t_imge;
            $prod->system_path=$carpeta_destino.$nombre_imagen;
           $b=$prod->createimg();
        }
     
    }

   if(isset($b) && isset($b2)){

       session_regenerate_id(true);
       echo '<meta http-equiv="refresh" content="0;url=panel.php?modulo=productos&mensaje=producto creado exitosamente"/>';/*messje reddic*/ 
 }else{
        $error['db_error']="Error al registrar";
      }
   }



   


?>