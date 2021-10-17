<?php require_once "./controlador/crearusuarios.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
  
          <div class="col-sm-6 mx-auto">
            <h1>Crear Usuarios</h1>
          </div>
         
     
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12  col-md-12 col-lg-6  col-xl-6 col-2xl-6 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
              </div>
              <!-- /.formulario crear Ur -->
              <div class="card-body">
                <form action="panel.php?modulo=crearUsuarios" method="post">

                <!--alerta -->
                <?php if(count($error)>0):?>
                <div class="alert alert-danger">
                <?php foreach($error as $e): ?>
                <li><?php  echo $e;?> </li>
                <?php endforeach;/*un foreach para recorrer los errores de del array*/?>
            </div>

            <?php endif;?>
            
                <!---->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="ingrese el correo">
                    
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="ingrese la contraseña">
                    
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="ingrese el nombre ">
                    
                    </div>
              
                    
                   <!-- <div class="form-group">
                    <select name="select" class="form-control">
      <option value="value1">Value 1</option>
      <option value="value2" selected>Value 2</option>
     <option value="value3">Value 3</option>
          </select> </div> -->
                  
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                    
                    </div>


                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>