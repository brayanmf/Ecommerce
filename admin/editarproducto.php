<?php 
require_once "./controlador/editarproductos.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Productos</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Productos</h3>
              </div>
              <!-- /.formulario crear Ur -->
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

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
                        <label>nombre</label>
                        <input type="text" name="name" class="form-control"  value="<?php echo $prod['nombre'] ?>" >
                    
                    </div>
                    <div class="form-group">
                        <label>precio</label>
                        <input type="number" name="precio" class="form-control"  step="0.1" value="<?php echo $prod['precio'] ?>">
                    
                    </div>
                    <div class="form-group">
                        <label>Detalle</label>
              
                        <textarea  name="detalle" rows="3" cols="50" class="form-control" ><?php echo $prod['detalle'] ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                        <label>existencia</label>
                        <input type="number" name="existencia" class="form-control" value="<?php echo $prod['existencia'] ?>">
                    
                    </div>

                      <div class="form-group">
                        <label>Caracteristicas</label>
              
                        <textarea  name="carac" rows="3" cols="50" class="form-control"><?php echo $prod['caracteristica'] ?>
                      </textarea>
                    </div>
                  <div class="well text-center">
                    <div class="row">
                      <?php
                      foreach ($b as $i){ ?>
                          <div class="col-md-3">
                          <img src="<?php  echo $i['webpath'];  ?>"  alt="" class="img-fluid">
                          </div>
                          <?php }
                      ?>
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="imagen">subir 3 imagenes:</label>
                        <input type="file" name="imagen[]" size="20" multiple="" id="imagen">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $prod['id']?>"><!--invi.lo mjeor es traer el token para editarlo en la f-->
                      <button class="btn btn-primary" name="guardar">Guardar</button>
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