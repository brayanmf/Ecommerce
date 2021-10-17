<?php 
require_once './modelo/user.php';
session_start();
$error=array();/*array para los errores */

if(isset($_SESSION['id'])){/**aca errorrrrr! por que no se que como traer de la base de datos */
    header ("location: panel.php");
}

if(isset($_POST['login'])){/*compruebo si esta definida */
    if (empty($_POST['gmail'])){
        $error['username']="Requerimos el correo";
    }
    if(empty($_POST['pass'])){ 
        $error['password']="La contraseña es password";
    }
    
    if(count($error)==0){
        $usuarioL=new Usuario;
        $usuarioL->email=$_POST['gmail'];
        $usuarioL->password=$_POST['pass'];
        $a=$usuarioL->getdata1();
     




            if(isset($a['pass']) && password_verify($usuarioL->password,$a['pass'])){/*if de coroto circuito para comprobar que no sea null y exista la varible */
                $b =$usuarioL->getstatus($a['id']);
             if  ($b['status']==true){
            $error['statu']="El usuario esta en uso";}else{
                $_SESSION['id']=$a['id'];/*para actualizar status*/
                $_SESSION['nombre']=$a['nombre'];
                $_SESSION['email']=$a['email'];
               /* $_SESSION['foto']=$a['foto'];*/
               
                $usuarioL->status=true;
                $b=$usuarioL->setstatus($_SESSION['id']);
                header('location: panel.php'); 
                exit();    
            }    
            }else{
                $error['login_fail']="No existen los credenciales";
            }
    
      
       
    }
}
?>