<!DOCTYPE html>
<html lang="es">
<?php
 require_once "./modelo/user.php";
session_start();



if(isset($_SESSION['idcliente'])){
  $bol=new UsuarioData;
$a=$bol->getstatus($_SESSION['idcliente']);
 
if(!($a['status'])){

 
   session_destroy();
   header ("location: index.php");
}

}



require_once "./head.php";
?>
<body>
<div >
      <nav class="navbar navbar-expand navbar-dark navbar-fixed-top  navbar-expand-lg navbar-dropdown">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="index.php">
          <div class="input-group input-group-sm">
          <input type="hidden" name="modulo" value="productos"><!--get modulo no permite =action forn-->
            <input class="form-control text-white form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="nombre" value=<?php echo $_GET['nombre']??''; /*que se quede el valor si es vacio, string vacio*/?>>
 
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit"><!--por defecto todo get-->
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"><!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" id="f">
        <i class="fa fa-cart-plus" aria-hidden="true"></i>
        <span class="badge badge-danger navbar-badge" id="badgeproducto"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listacarrito"></div>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user" aria-hidden="true"></i>
      
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php if(isset($_SESSION['idcliente'])){ ?>
          <div class="dropdown-divider"></div>
          <a href="login.php" class="dropdown-item text-primary">
            <i class="fas fa-user mr-2">
          </i>Hola  <?php echo $_SESSION['usernamecliente']; ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="Bienvenida.php?logout=1" class="dropdown-item text-danger">
            <i class="fas fa-door-closed  mr-2">
           </i> Cerrar Sesion
          </a>
            <div class="dropdown-divider"></div>
          <?php } else { ?>
          <a href="login.php" class="dropdown-item text-primary">
            <i class="fas fa-door-open mr-2">
          </i>  Loguearse
          </a>
          <div class="dropdown-divider"></div>
          <a href="Registrarse.php" class="dropdown-item text-primary">
            <i class="fas fa-sign-in-alt mr-2">
           </i> Registrarse
          </a>
          <?php } ?>
        </div>

      </li>
      
    
    </ul>
  </nav>


  <div class="row mt-1">
  <?php
  require_once "./controlador/modulos.php"; ?><!-- un div en php -->

  
</div>



<script src="admin/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>


<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<script src="./js/ecommerce.js"> </script>
<script src="./js/check.js"> </script>
</body>
</html>