<?php 
require_once "./modelo/product.php";

if(isset($_GET['idBorrar'])){
    $a=new Producto;
    $a->id=$_GET['idBorrar'];
 
   $c=$a->getimg($a->id);
    foreach($c as $i) {
        unlink($i['system_path']);/*error al borrar aca */
        $a->deletei($i['id']);
    }
    $b=$a->delete();
 
 

if($b){
    session_regenerate_id(true);
    ?>

    <div class="alert alert-warning float-right" role="alert">
    <button type="button " class="close" data-dismiss="alert" style="margin-left:10px" aria-label="Close" >
                 <span aria-hidden="true">&times;</span>
                 <span class="sr-only">Close</span>
             </button>
Producto Borrado
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