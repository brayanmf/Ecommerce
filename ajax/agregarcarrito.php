<?php
    $productos=unserialize($_COOKIE['productos']??'');/*cookies->ajax(json)*/
    if(is_array($productos)==false)$productos=array();/*validar,si es false le damos vacio  */
    $yestaproducto=false;/*no se a creado */
    foreach ($productos as $key=>$value ){/**si es el mismo */
        if($value['id']==$_POST['id']){
        $productos[$key]['cantidad']=$productos[$key]['cantidad']+$_POST['cantidad'];/*por si es el mismo objeto aumentar */
        $yestaproducto=true;
        }
    }
    if($yestaproducto==false){/*si es otro producto */
        $nuevo=array(
            "id"=>$_POST['id'],
            "nombre"=>$_POST['nombre'],
            "web_path"=>$_POST['web_path'],
            "cantidad"=>$_POST['cantidad'],
            "precio"=>$_POST['precio']

        );
        array_push($productos,$nuevo);/*insetrtar al final */

    }
    setcookie("productos",serialize($productos));
    echo json_encode($productos);




?>