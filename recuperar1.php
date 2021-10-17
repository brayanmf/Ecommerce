<?php require_once('controlador/recuperar2.php');?>



<?php require_once "head.php";?>
<body>
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
                <h3 class="text-center">Reiniciar tu contraseña</h3>
             
            <div class="form-group">
                <label for="email">Contraseña</label>
                <input type="text" name="clave" class="form-control form-control-lg">
            </div>     
            <div class="form-group">
                <label for="email">Confirmar Contraseña</label>
                <input type="text" name="clave1" class="form-control form-control-lg">
            </div>      
            
           
        <div class="form-group">
            <button type="submit" name="reset-btn" class="btn btn-primary btn-block btn-lg">Reiniciar Contraseña</button>
        </div>
     
        </form>
        </div>
    </div>
</div>
