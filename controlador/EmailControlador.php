<?php

require_once './vendor/autoload.php';
require_once 'constantes.php';


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com',587,'tls'))/**configuramos el protocolo */
  ->setUsername(CORREO)
  ->setPassword(CL)
;
// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function EnviarC($userEmail,$token){
    global $mailer;
    $body= ' <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verifica tu  email</title>
    </head>
    <body>
        <div class="wrapper">
            <p>gracias por registrarse en nuestro sitio web, haga clic en la línea siguiente para verificar su correo electrónico </p>
            <a href="http://localhost/ecommerce1/Bienvenida.php?token='.$token.'">Verifica tu correo</a>
    
        </div>
        
    </body>
    </html>';
    $message = (new Swift_Message('Veifica tu direccion'))
    ->setFrom(CORREO)
    ->setTo($userEmail)
    ->setBody($body,'text/html');
  // Send the message
  $result = $mailer->send($message);

  }
  function EnviarRC($userEmail,$token){

    global $mailer;
    $body= ' <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verifica tu  email</title>
        <style>
        body{width=1200px;}
        .wrapper{margin:auto; width:500px }
        </style>
    </head>
    <body>
        <div class="wrapper" >
            <p>porfavor has click en el siguente enlace para poder reiniciar su contraseña </p>
            <a href="http://localhost/ecommerce1/Bienvenida.php?actualizar-e='.$token.'">Reinicia su Contraseña</a>
    
        </div>
        
    </body>
    </html>';
    $message = (new Swift_Message('Reinicia tu contraseña'))
    ->setFrom(CORREO)
    ->setTo($userEmail)
    ->setBody($body,'text/html');
  
  // Send the message
  $result = $mailer->send($message);
  
  }

// Create a message


?>