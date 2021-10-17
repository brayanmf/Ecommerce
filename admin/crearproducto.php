<?php require_once "./controlador/crearproductos.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Productos</h1>
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
                <form action="panel.php?modulo=crearproducto" method="post" enctype="multipart/form-data" name="formulario" > 

                <!--alerta -->
                <?php if(count($error)>0):?>
                <div class="alert alert-danger">
                <?php foreach($error as $e): ?>
                <li><?php  echo $e;?> </li>
                <?php endforeach;/*un foreach para recorrer los errores de del array*/?>
            </div>

            <?php endif;?>
            
                <!---->
                    <div class="form-group"  >
                        <label>nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="ingrese el nombre">
                    
                    </div>
                    <div class="form-group">
                        <label>precio</label>
                        <input type="number" name="precio" class="form-control" placeholder="ingrese el precio" step="0.1">
                    
                    </div>
                    <div class="form-group">
                        <label>Detalle</label>
              
                        <textarea  name="detalle" rows="4" cols="50" class="form-control" placeholder="ingrese el detalle aqui"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="existencia" class="form-control" placeholder="ingrese el Stock">
                    
                    </div>
                    <div class="form-group">
                        <label>Caracteristicas</label>
              
                        <textarea  name="carac" rows="4" cols="50" class="form-control" placeholder="ingrese las caracteristicas"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="imagen">subir 3 imagenes:</label>
                        <input type="file" name="imagen[]" size="20" multiple="" id="imagen">
                    
                    </div>
              
                    
                   <!-- <div class="form-group">
                    <select name="select" class="form-control">
      <option value="value1">Value 1</option>
      <option value="value2" selected>Value 2</option>
     <option value="value3">Value 3</option>
          </select> </div> -->
                  
                    <div class="form-group">
                       <button  class="btn btn-primary" name="guardar" >Guardar</button>
                    
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