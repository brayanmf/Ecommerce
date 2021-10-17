
<?php require_once('controlador/recuperar2.php');?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');?>

<body>

<?php require ('header2.php') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div login">
            <form action="" method="post">
                <h3 class="text-center">Recuperar contraseña</h3>
                <p>ingrese la dirección de correo electrónico que utilizó para registrarse
                 en este sitio y lo ayudaremos a recuperar su contraseña </p>
                <div class="form-group">
                <label for="username">Email</label>
                <input type="email"  requered name="email" class="form-control form-control-lg">
            </div>
        <div class="form-group">
            <button type="submit" name="actualizar" class="btn btn-primary btn-block btn-lg">Recuperar</button>
        </div>
            </div>

            
        </form>
        </div>
    </div>
</div>



