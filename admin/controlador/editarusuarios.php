<?php
require_once "./modelo/user.php";
$error=array();/*array para los errores */
$user=new Usuario;
if(isset($_GET['id'])){
    $user->id=$_GET['id'];
    $usuario=$user->edituser();
    }
    
if (isset($_POST['guardar'])){
    if(empty($_POST['email'])){
        $error['email']="requerimos el email";
    }
    if(empty($_POST['pass'])){
        $error['pas']="requerimos la contraseña";
    }
    if(empty($_POST['nombre'])){
        $error['nombre']="requerimos el nombre";
    }
    
    if(count($error)==0){

        $user->email=$_POST['email'];/*le paso como parametro los pos (solo esto esta modificado si sale mal es por esto) */
        $user->password=$_POST['pass'];
        $user->nombre=$_POST['nombre'];
        $user->id=$_POST['id'];
    
      
       $b=$user->update();
       if($b){
        session_regenerate_id(true);
            echo '<meta http-equiv="refresh" content="0;url=panel.php?modulo=usuarios&mensaje=Usuario '.$user->nombre.' editado exitosamente"/>';/*messje reddic */
      }else{
        $error['db_error']="Error al registrar";
        }
    }

}




?>