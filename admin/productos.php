<?php
 require_once 'controlador/borrarproductos.php';
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
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
                <h3 class="card-title">Productos del Sistema</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Detalle</th>
                    <th>Caracteristica</th>
                    <th>Existencia</th>
                    <th>Imagenes</th>

                    <th>Agregar
                      <a href="panel.php?modulo=crearproducto"><i class="fa fa-plus" aria-hidden="true"></i></a><!--aria-hidden?-->
                    </th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                  require_once 'controlador/productos.php'
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>PRODUCTOS</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>ACCIONES</th>
                   
                  </tr>
                
                  </tfoot>
                </table>
                
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