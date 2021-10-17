
<?php
require('./controlador/login1.php');
require_once('head.php');

if(isset($_SESSION['idcliente'])){/*si el usuario esta logeado me direcciona al form principal */
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

</head>
<body>

	<?php require ('header2.php') ?>


	<section class="mt-5" >
    
    
  <div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
            <form action="" method="post">
                <h3 class="text-center">Login</h3>
            <?php if(count($error)>0):?>
                <div class="alert alert-danger">
                <?php foreach($error as $e): ?>
                <li><?php  echo $e;?> </li>
                <?php endforeach;/*un foreach para recorrer los errores de del array*/?>
                  </div>
            <?php endif;?>

            <div class="form-group">
                <label for="username">Usuario o Email</label>
                <input type="text" name="username" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="email">Contraseña</label>
                <input type="password" name="clave" class="form-control form-control-lg">
            </div>      
           
        <div class="form-group">
            <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Entrar</button>
        </div>
        <p class="text-center" >No tienes cuenta?<a href="Registrarse.php">Registrarse </a> </p>
        <div style="font-size: 0.em; text-align:center"><a href="recuperar.php">Olvidaste tu contraseña?</a></div>
        </form>
        </div>
    </div>
</div>


</section>





</body>
</html>

