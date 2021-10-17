<?php 

session_start();
$error=array();/*array para los errores */
if(!empty($_SESSION['idcliente'])){
	header('Location: /login.php');/* si existe nos redirecciona */
}

require_once('./modelo/user.php');


if(isset($_POST['login-btn'])){/*compruebo si esta definida */
   

 
    
    if (empty($_POST['username'])){/*compruevbo que no esta vacia */
        $error['username']="Requerimos el Usuario";
    
    }
    if(empty($_POST['clave'])){
        $error['clave']="La contraseña es requerida";
    
    }
  
    if(count($error)==0){/*compruebo que no haya errores */
        $usuarioL=new UsuarioData;/*declaro una clase  */
        $usuarioL->user_name=$_POST['username'];/*le paso como parametro los pos (solo esto esta modificado si sale mal es por esto) */
        $usuarioL->password=$_POST['clave'];
     
      $u=$usuarioL->login();/*de la clase uso la funcion login */

       
    
     
        if(isset($u['password']) &&  password_verify($usuarioL->password,$u['password']) && $u['verified']){
            $b =$usuarioL->getstatus($u['id']);
        
            if(isset($b) && $b['status']==true){
            $error['status']="El usuario esta en uso";}else{
        
            /*verifico mi contraseña*/
            $_SESSION['idcliente']=$u['id'];
            $_SESSION['usernamecliente']=$u['username'];
            $_SESSION['emailcliente']=$u['email'];
            $_SESSION['verifiedcliente']=$u['verified'];
            $_SESSION['message']="tu estas logeado !";/*para la bienvenida */
            $usuarioL->status=true;
            $b=$usuarioL->setstatus($_SESSION['idcliente']);
            $_SESSION['alert-class']="alert-success";/*para la bienvenida */
            header('location: Bienvenida.php');/*si todo sale bien me direcciona */
            exit();
    }}
    else{
       
        $error['login_fail']="No existen los credenciales ";
        
    }
    }
 


  
}

?>
