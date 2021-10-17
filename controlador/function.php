<?php 
require_once './modelo/conexion.php';//borra y prueba :C

require_once './modelo/user.php';


function verificarC($token){
    $usetoken=new UsuarioData;


    $a=$usetoken->verificar($token,1);
    $n =$a->rowCount();

    if($n>0){
        $user=$a->fetch(PDO::FETCH_ASSOC);
        $b=$usetoken->verificar($token,2);
        if($b){
        
            $_SESSION['idcliente']=$user['id'];
            $_SESSION['usernamecliente']=$user['username'];
            $_SESSION['emailcliente']=$user['email'];
            $_SESSION['verifiedcliente']=1;
            $_SESSION['message']="tu correo ya ha sido verificado";
            $_SESSION['alert-class']="alert-success";

            header('location: Bienvenida.php');
            exit();

        }else{
            echo 'usuario no encontrado';

        }
    }


  /*  global $conn;
    $sql="SELECT * FROM usuarios WHERE token='$token' LIMIT 1";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        
        $user=mysqli_fetch_assoc($result);
        $update_query="UPDATE usuarios SET verified=1 WHERE token='$token'";
    if (mysqli_query($conn,$update_query)){    
        $_SESSION['id']=$user['id'];
        $_SESSION['username']=$user['username'];
        $_SESSION['email']=$user['email'];
        $_SESSION['verified']=1;
        $_SESSION['message']="tu correo ya ha sido verificado";
        $_SESSION['alert-class']="alert-success";
        header('location: Bienvenida.php');
        exit();
    }
    }else{
        echo 'usuario no encontrado';
    
    }
*/
}
function refrescarC($token){
    $usetoken=new UsuarioData;
    $a=$usetoken->verificar($token,1);
    $n=$a->fetch(PDO::FETCH_ASSOC);
    $_SESSION['emailcliente']=$n['email'];
    header('location: recuperar1.php ');
    exit(0);


    /*global $conn;
    $sql="SELECT * FROM usuarios WHERE token='$token' LIMIT 1";
    $resul=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($resul);
    $_SESSION['email']=$user['email'];
    header('location: recuperar1.php ');
    exit(0);*/
}




?>