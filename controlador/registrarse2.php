<?php
require 'EmailControlador.php';
require_once './modelo/user.php';
$error=array();/*para los errores */
session_start();
$usuarioL=new UsuarioData;/*declaramos la clase */
if(isset($_POST['signup-btn'])){
 
    if(empty($_POST['username'])){
    $error['username']="Requerimos el Usuario";

    }

    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){/*filtramos  */
    $error['email']="La direccion del Email es invalido";

    }
    if(empty($_POST['email'])){
    $error['email']="El Email es requerido";

    }
    if(empty($_POST['password'])){
    $error['password']="La contraseña es requerida";

    }
    if(empty($_POST['direc'])){
        $error['direc']="La dirección es requerida";
    
        }
    if($_POST['password'] !== $_POST['password']){
    $error['password']="No coincide con la contraseña";

    }
    
   $b= $usuarioL->valueE(1);/*usamos la funcion de la clase para poder contar si el email ya esta r*/
if($b>0){
    
    $error['email']="Ya estas registrado";
}

   


    if(count($error)==0){#si no hay errores
       
        $usuarioL->user_name=$_POST['username'];
        $usuarioL->email=$_POST['email'];
        $usuarioL->direccion=$_POST['direc'];
        $usuarioL->password=$_POST['password'];
        $usuarioL->passf=$_POST['password'];
    

     
       $a=$usuarioL->insertU();/*usamoa la funcion de la clase */

        if($a){/*si ejecuta nuestro consulta */
           
            $u=$usuarioL->GetU();/*obtenemos nuestros datos que serian pocos para enviar al correo :c */

            $_SESSION['idcliente']=$u['id'];
            $_SESSION['usernamecliente']=$u['username'];
            $_SESSION['emailcliente']=$u['email'];
            $_SESSION['verifiedcliente']=$u['verified'];
            EnviarC($u['emailcliente'],$u['token']);/*usamos la funcion que esta dclara de email controlador */
            $_SESSION['message']="tu estas registrado en inmo.Brayanmf";
            $_SESSION['alert-class']="alert-success";
            header('location: bienvenida.php');/*lo direccionamos  */
            exit();
            }
        }else{

        $error['db_error']="Error al registrar";
     }


}
?>