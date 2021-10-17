<?php
 require_once 'controlador/borrarusuarios.php';
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
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
                <h3 class="card-title">Usuarios en el Sistema</h3>
              </div>
              <!-- /.card-header --> <!-- 
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Agregar
                      <a href="panel.php?modulo=crearUsuarios"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 <?php  /*
                  require_once 'controlador/usuario.php' */
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Usuarios</th>
                    <th>correos</th>
                    <th>Acciones</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>-->
          
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Agregar
                      <a href="panel.php?modulo=crearUsuarios"><i class="fa fa-plus" aria-hidden="true"></i></a><!--aria-hidden?-->
                    </th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                  require_once 'controlador/usuario.php'
                  ?>
                  </tbody>
                  <tfoot>
                  <th>Usuarios</th>
                    <th>correos</th>
                    <th>Acciones</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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