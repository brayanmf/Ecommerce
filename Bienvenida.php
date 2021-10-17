<?php

 require_once 'controlador/registrarse2.php';
 require_once 'controlador/function.php';
 require_once "./modelo/user.php";


if(isset($_GET['token'])){
    $token=$_GET['token'];
   /*$c->verificarC($token);*/
   verificarC($token);
}

if(isset($_GET['actualizar-e'])){
    $passwordToken=$_GET['actualizar-e'];
   /*$c->refrescarC($passwordToken);*/
   refrescarC($passwordToken);
}


if(isset($_GET['logout']) && $_GET['logout']=="1"){
    $bol=new  UsuarioData;
    $bol->status=false;
    $bol->setstatus($_SESSION['idcliente']);
    session_destroy();
    unset($_SESSION['idcliente']);
    unset($_SESSION['usernamecliente']);
    unset($_SESSION['emailcliente']);
    unset($_SESSION['verifiedcliente']);
  
    header('location: index.php');


}
if(isset($_SESSION['id'])){
    $bol=new UsuarioData;
  $a=$bol->getstatus($_SESSION['id']);
   
  if(!($a['status'])){
  
   
     session_destroy();
     header ("location: index.php");
  }
  
  }

if(!isset($_SESSION['idcliente']) ){
    header('location: index.php');
    exit();



}
?>
<!DOCTYPE html>
<html lang="es">
<head> <?php
require_once 'head.php'; ?>
</head>
<body>
<div class="container   mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">

        <?php if(isset($_SESSION['message'])):?>
        <div class="alert  <?php echo $_SESSION['alert-class'] ?>">
        <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
        unset($_SESSION['alert-class']);
        ?>
      
        </div>  <?php endif;   ?>
        
        <h3>Bienvenido,<?php echo $_SESSION['usernamecliente'] ?> </h3>
        <a href="Bienvenida.php?logout=1" class="logout" >Salir</a>


        <?php if($_SESSION['verifiedcliente']){ ?>
                   
      <a href="index.php" >  <button class="btn btn-block btn-lg btn-primary"  style="margin: 15px;">Ir al inicio</button></a>
      <a href="index.php?modulo=envio">  <button class="btn btn-block btn-lg btn-primary" style="margin: 15px;">Seguir Comprando</button></a>
 
        <?php }else{?>
            <div class="alert alert-info">
            tu necesitas verfivar tu correo <strong><?php echo $_SESSION['email']; ?> </strong> y hacer click para confirmar con link
           
        </div>

        <?php }?>
        </div>

    </div>
</div>







</body>
</html>