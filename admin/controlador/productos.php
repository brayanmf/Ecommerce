<?php
require_once "./modelo/product.php";
$prod=new Producto ;

$f=$prod->getproduct();

foreach ($f as $a){
/*token es mejor */
   ?> <tr>
   <td><?php echo $a["nombre"]  ;?></td>
   <td><?php echo $a["precio"]  ;?></td> 
   <td><?php echo $a["detalle"]  ;?></td> 
   <td><?php echo $a["caracteristica"]  ;?></td> 
   <td><?php echo $a["existencia"]  ;?></td> 
 
   <td><?php $b=$prod->getimg($a['id']);
   foreach ($b as $i){ ?>

      <img src="<?php  echo $i['webpath'];  ?>"  alt="" style="width: 20%;height:60px ;margin:auto;" class="card-img-top img-thumbnail">

      <?php }
   ?>
   </td> 



   

   <td>
   <a href="panel.php?modulo=editarproduct&id=<?php echo $a["id"] ?>"style="margin-right:5px;"><i class="fas fa-edit"></i></a>  
  <a href="panel.php?modulo=productos&idBorrar=<?php echo $a["id"] ?>" class="text-danger borrar"><i class="fas fa-trash" ></i></a> 
  </td>
 </tr>
 <?php
}
?> 
