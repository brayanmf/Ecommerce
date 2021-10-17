<?php
require_once "./modelo/mercado-productos.php";
$a=new mercado;

$nombre=$_GET['nombre']??'';/*buscador */
if (empty($nombre)==false){/*adicional para el buscador */
    $a->aux="and nombre like '%$nombre%'";
}else{
    $a->aux="where 1=1";/*auxiliar que siempre es true */
}
/*----------------------------------------------------------------------- */
$r=$a->getmercadocount();
$tr=$r['cuenta'];/*total de registros */
$ep=6;/*elementos por pagina */
$totalp=ceil($tr/$ep);/*redondea al sgt prximado,->conteo  */

$paginaS=$_GET['pagina']??false;/*valor inicial de pagina */

if($paginaS==false){
    $inicioL=0;
    $paginaS=1;/*true o false :active paginacion mas adlte*/
}else{
    $inicioL=($paginaS-1)*$ep;/*true o false :active ,DAR INICIO A LA fila*/
}
$a->limit="LIMIT $inicioL,$ep";/*LIMIT incio fila,cuantos*/
/**----------------------------------------------------------------------- */
$f=$a->getmercadovender();/* mostrar los productos */
foreach ($f as $b){

       ?>
       <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card border-primary">
            <img src="<?php  echo $b['webpath'];  ?>"  alt="" style="width: 60%;height:200px ;margin:auto;" class="card-img-top img-thumbnail">
            <div class="card-body">
                <h4 class="card-title"><?php echo $b['nombre'];  ?></h4>
                <p class="card-text"><strong>Precio:</strong><?php echo $b['precio'];  ?></p>
                <p class="card-text"><strong>Existencia:</strong><?php echo $b['existencia'];  ?></p>
                <a href="index.php?modulo=mercado-detalle&id=<?php echo $b['id'];  ?>" class="btn btn-primary">Ver</a>
            </div>
        </div>
       </div>
       <?php
    } ?>
   </div>
<!-----------------------------------dando valor a pagina---------------------------------------------------------------------------------------------------->
<?php  if($totalp>0){  ?>
       <nav class="page navigation">
            <ul class="pagination">
                <?php
                if($paginaS!=1){
                ?>
                <li class="page-item ">
                    <a href="index.php?modulo=productos&pagina= <?php echo ($paginaS - 1); ?>" class="page-link" aria-label="Previus">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                }?> 
                  <?php
                for ($i=1;$i<=$totalp;$i++)  {?>

                <li class="page-item <?php echo ($paginaS==$i)?" active ":" "; ?>">
                    <a href="index.php?modulo=productos&pagina=<?php echo $i;?> " class="page-link"><?php echo $i;?></a>
                </li>
      
                <?php }  ?>
                <?php
                if($paginaS!=$totalp){
                ?>
                <li class="page-item">
                    <a href="index.php?modulo=productos&pagina= <?php echo ($paginaS + 1); ?>" class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>

               <?php }?>

            </ul>
        </nav>


        <?php }  ?>
 
    
      