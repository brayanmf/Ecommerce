<?php
require_once "./modelo/product.php";
$error=array();/*array para los errores */
$producto=new Producto;
if(isset($_GET['id'])){//obtener
    $producto->id=$_GET['id'];
    $prod=$producto->editproduct();
    $b=$producto->getimg($_GET['id']);
}
    
if(isset($_POST['guardar'])){
    if(empty($_POST['name'])){
        $error['name']="rellene el nombre";
    }
    if(empty($_POST['precio'])){
        $error['precio']="rellene el precio ";
    }
    if(empty($_POST['existencia'])){
        $error['existencia']="rellene la existencia";
    }
    if(empty($_POST['detalle'])){
        $error['detalle']="Requerimos los detalles";
    }
    if(empty($_POST['carac'])){
        $error['carac']="Requerimos las caracteristicas";
    }
    if(count($_FILES["imagen"]['tmp_name'])!=3){
        $error['imagen']="Elegir  3 imagenes";
    }
    if(max($_FILES['imagen']['size'])>2500000){
        $error['tama']="uno de las imagenes es muy grande el limite es 2mb";
    }

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




    if(count($error)==0){//modificar
       
       $producto->nombre=$_POST['name'];/*le paso como parametro los pos (solo esto esta modificado si sale mal es por esto) */
       $producto->precio=$_POST['precio'];
        $producto->detalle=$_POST['detalle'];
        $producto->existencia=$_POST['existencia'];
        $producto->id=$_POST['id'];
        $producto->carac=$_POST['carac'];
        $b=$producto->update();
        $b=$producto->getimg($producto->id);
        $arr=$producto->getfilep();
        $n=array();    
       foreach ($arr as $ar=>$val){
        $n[]=$val;//auxiliar para update
        }
       
        foreach($b as  $i){
            unlink($i['system_path']);
       
        
        }
        $i=0;
        foreach ($_FILES["imagen"]['tmp_name'] as $imagen=>$value){/*recorrer el directorio temporal */
            
            $nombre_imagen=$_FILES['imagen']['name'][$imagen];
             $t_imge=$_FILES['imagen']['size'][$imagen];
             $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Ecommerce1/admin/dist/img/productos/';
             move_uploaded_file($_FILES['imagen']['tmp_name'][$imagen],$carpeta_destino.$nombre_imagen);
             $producto->filename=$nombre_imagen;
             $producto->web_path='/Ecommerce1/admin/dist/img/productos/'.$nombre_imagen;
             $producto->size=$t_imge;
             $producto->system_path=$carpeta_destino.$nombre_imagen;
            
            $b=$producto->updatei($n[$i]["id_files"]);
            $i++;
         }
      if($b){
        session_regenerate_id(true);
        echo '<meta http-equiv="refresh" content="0;url=panel.php?modulo=productos&mensaje=producto '.$producto->nombre.' editado exitosamente"/>';/*messje reddic */
     }else{
        $error['db_error']="Error al registrar";
        }
    }

}




?>