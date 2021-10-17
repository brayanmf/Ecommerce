☺<?php

$productos=unserialize($_COOKIE['productos']);
foreach ($productos as $key=>$value ){
    if($_POST['id']==$value['id']){
        unset($productos[$key]);/**elimnamos del array */
    }
}
$productos=array_values($productos);
setcookie("productos",serialize($productos));
echo json_encode($productos);

?>