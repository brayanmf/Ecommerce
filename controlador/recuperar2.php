<?php
require_once "EmailControlador.php";
/*require_once './modelo/conexion.php';*/
require_once './modelo/user.php';
session_start();
$error=array();
$userl=new UsuarioData;
if(isset($_POST['actualizar'])){/*del archivo recuperar.php */
    $userl->email=$_POST['email'];
    if(!filter_var($userl->email,FILTER_VALIDATE_EMAIL)){
        $error['email']="Direccion de corrreo invalido";
   
    }
    if(count($error)===0){/*si son iguales y del mismo tipo*/


        $b=$userl->valueE(2);

       EnviarRC($userl->email,$b['token']);

       /* global $conn;
        $sql="SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
        $resul=mysqli_query($conn,$sql);
        $user=mysqli_fetch_assoc($resul);



        $token=$user['token'];
        EnviarRC($email,$token);*/
        header('location: mensaje.php');
        exit(0);
    }

}

if (isset($_POST['reset-btn'])){
    /*del archivo recuperar2.php */
    $userl->password=$_POST['clave'];
    $passf=$_POST['clave1'];
    if(empty($userl->password) || empty($passf)){
        $error['clave']="Contraseña Requerida";
    }
    if($userl->password !=$passf){
        $error['clave1']="la segunda contraseña no coincide";
    }

    $userp=password_hash($userl->password,PASSWORD_DEFAULT);

    $userl->email=$_SESSION['emailcliente'];
    
    if(count($error)===0){
        $a=$userl->actualizarp($userp,$userl->email);

        if($a){
            header('location: login.php');
        }

       /* global $conn;
        $sql="UPDATE usuarios SET password='$password' WHERE email='$email'";
        $resul=mysqli_query($conn,$sql);
        if($resul){
            header('location: login.php');
        }*/
    }
}
?>