<?php /*controlar y redireccionarnos hacia las vistas,solo en la section del panel*/

/*use function PHPSTORM_META\type;*/

if(isset($_GET['mensaje'])){/*mensaje emergente arrba d -?todos?-sale sgn el pos d este*/
    ?>
        <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
             <button type="button " class="close" data-dismiss="alert" aria-label="Close" >
                 <span aria-hidden="true">&times;</span>
                 <span class="sr-only">Close</span>
             </button>
             <?php echo $_GET['mensaje'];?>
        </div>
    <?php 
    }
if($modulo=='estadisticas' || $modulo==''){
    require_once "./estadisticas.php";
}
if( $modulo=='usuarios'){
    require_once "./usuarios.php";
    
}

if($modulo=='ventas'){
    require_once "ventas.php";
    
} 
if($modulo=='crearUsuarios'){
    
    
    include_once "./crearusuarios.php";
}
if($modulo=="editarUsuarios"){
   
       
    include_once "./editarUsuarios.php";
}
/*----------------------------------------------------- */
if($modulo=='productos'){
    require_once "./productos.php";
    
}
if($modulo=='crearproducto'){

    require_once "./crearproducto.php";

}
if($modulo=="editarproduct"){

 
include_once "./editarproducto.php";
}





?>