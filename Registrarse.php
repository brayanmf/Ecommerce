<?php
require_once('controlador/registrarse2.php');
require_once('head.php');
/*require_once('pagar.php');*/
?>


<body>
<?php require ('header2.php') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div">
            <form action="" method="post">
                <h3 class="text-center">Registrar</h3>

                <?php if(count($error)>0):?>
            <div class="alert alert-danger">
                <?php foreach($error as $e): ?>
                <li><?php  echo $e;?> </li>
                <?php endforeach;?>
            </div>

            <?php endif;?>
            <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username"  class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control form-control-lg" >
            </div>
            <div class="form-group">
                <label for="direc">Direccion</label>
                <input type="text" name="direc" class="form-control form-control-lg">
        </div>        
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="passwordConf">Confirma Contraseña</label>
                <input type="password" name="passwordf" class="form-control form-control-lg">
        </div>  
     

        <div class="form-group">
            <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Registrar</button>
        </div>
        <p class="text-center" >Ya tienes cuenta?<a href="login.php">Ingresar </a> </p>
        </form>
        </div>

    </div>

</div>   







</body>
</html>