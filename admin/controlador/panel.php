<?php

 session_start();/*controlar la ruta si el usuario */
 require_once "./modelo/user.php";
 
 if(isset($_SESSION['id'])){
    $bol=new  Usuario;
 $a=$bol->getstatus($_SESSION['id']);
 if(!($a['status'])){
 

    session_destroy();
    header ("location: index.php");
 }}
 



 /*
 $_SESSION["timeout"] = time();
 $inactividad = 600;//10min en este caso.
 // Comprobar si $_SESSION["timeout"] está establecida
 if(isset($_SESSION["timeout"])){
     // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
     $sessionTTL = time() - $_SESSION["timeout"];
     
     
     if($sessionTTL > $inactividad ){
        $bol->id=false;
        $a=$bol->setstatus($_SESSION['id']); /*REFRESHEAR funcionaria en caso no estacondicion*/
     /*   if($a==true){
        session_destroy();
         header("Location: index.php");}
     }
 }
*/
if(!isset($_SESSION['id'])){/** */
    header ("location: index.php");
}

 if(isset($_GET['sesion'])&& $_GET['sesion']=="cerrar"){
  
    $bol->id=false;
    $bol->setstatus($_SESSION['id']); /*REFRESHEAR */
    $_SESSION = array();/*vaciasr las ssesiones */

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
header ("location: index.php");

 }
 $modulo=$_GET['modulo']??'';/*si nulo,tons es'' nos sirve para almacenar y redireccionar*/


?>