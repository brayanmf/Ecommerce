<?php 
require_once "./modelo/user.php";

if(isset($_GET['idBorrar'])){
    $a=new Usuario;
$a->id=$_GET['idBorrar'];

$b=$a->delete();
if($b){
    session_regenerate_id(true);
    ?>

    <div class="alert alert-warning float-right" role="alert">
    <button type="button " class="close" data-dismiss="alert" style="margin-left:10px" aria-label="Close" >
                 <span aria-hidden="true">&times;</span>
                 <span class="sr-only">Close</span>
             </button>
    Usuario Borrado 

    </div>
    <?php
}else{
    ?>
    <div class="alert alert-danger float-right" role="alert">
    <button type="button " class="close" data-dismiss="alert"  style="margin-left:10px" aria-label="Close" >
                 <span aria-hidden="true">&times;</span>
                 <span class="sr-only">Close</span>
             </button>
    Error al borrar</div>
    <?php
}
}
?>