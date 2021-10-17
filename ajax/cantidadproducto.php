<?php


$productos=unserialize($_COOKIE['productos']);
foreach ($productos as $key=>$value ){
    if($_POST['id']==$value['id']){

        if($_POST['tipo']=="menos" && $productos[$key]['cantidad']>0)
            $productos[$key]['cantidad']= $productos[$key]['cantidad']-1;
        
        else
            $productos[$key]['cantidad']= $productos[$key]['cantidad']+1;
          

    }
}
setcookie("productos",serialize($productos));
echo json_encode($productos);



?>