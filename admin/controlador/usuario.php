<?php
require_once './modelo/user.php';

$usuarios=new Usuario;

$f=$usuarios->getdataU();

foreach ($f as $a){
/*token es mejor */
   ?> <tr>
   <td><?php echo $a["nombre"]  ;?></td>
   <td><?php echo $a["email"]  ;?></td> 
   <td>
   <a href="panel.php?modulo=editarUsuarios&id=<?php echo $a["id"] ?>"style="margin-right:5px;"><i class="fas fa-edit"></i></a>  
  <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $a["id"] ?>" class="text-danger borrar"><i class="fas fa-trash" ></i></a> 
  </td></tr><?php
}
?> 
