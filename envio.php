<?php

if(isset($_SESSION['idcliente'])){ 


    require_once 'controlador/envio.php';


    ?>
 

<form method="post" class="container" id="formulario">
<?php if(count($error)>0):?>
<div class="alert alert-danger">
    <?php foreach($error as $e): ?>
    <li><?php  echo $e;?> </li>
    <?php endforeach;/*un foreach para recorrer los errores de del array*/?>
</div>

<?php endif;?>

    <div class="row" style="margin: 5px;">
        <div class="col-sm-12 col-md-12 col-lg-5  col-xl-5 col-2xl-5" >
            <h3>Datos del cliente</h3>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" id="nombrecli"  name="nombrecli" class="form-control" value="<?php echo $a['username']; ?>">
  

                <label for="">Email</label>
                <input type="email" id="emailcli" name="emailcli" class="form-control" readonly value="<?php echo $a['email']; ?>">
      
                <label for="">direccion</label>
                <textarea id="direccioncli" name="direccioncli" class="form-control" row="3"><?php echo $a['direccion'];?>  </textarea>
            </div>
        </div>
        <div class="hidden-sm hidden-md  col-lg-2  col-xl-2 col-2xl-2"></div>
        <div class="col-sm-12  col-md-12 col-lg-5  col-xl-5 col-2xl-5">
            <h3>Datos del quien recibe</h3>
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" id="nombrerec" name="nombrerec" class="form-control" value="<?php echo $b['nombre']??''; ?>">
         
                <label for="">Email</label>
                <input type="email" id="emailrec" name="emailrec" class="form-control" value="<?php echo $b['email']??''; ?>">
         
                <label for="">direccion</label>
                <textarea id="direccionrec" name="direccionrec" class="form-control" row="3"> <?php echo $b['direccion']??''; ?></textarea>
            </div>
                <div class="form-check mt-5">
                    <label for="" class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="jalar">jalar datos del cliente
                      
                    </label>
                </div>
            </div>


           
        </div>
        <input type="number" id="total" name="total" hidden class="form-control" ><!--para mercado pago-->
        <input type="text" id="cantidad" name="cantidad[]" hidden class="form-control" >
        <input type="text" id="precio" name="precio[]" hidden class="form-control" >
        <input type="text" id="subtotal" name="subtotal[]" hidden class="form-control" >
        <div class="mx-auto" >
        <h4>Terminos y Condiciones</h4>
        <textarea class="form-control" cols="150" rows="10" disabled>Bienvenido a (Nombre de la tienda). Estos t??rminos y condiciones describen las reglas y regulaciones para el uso del sitio web (Nombre de la tienda).

            Ecommerce se encuentra en  jr.abcdasassadas.

            Al acceder a este sitio web, asumimos que aceptas estos t??rminos y condiciones en su totalidad. No contin??es usando el sitio web (Nombre de la tienda) si no aceptas todos los t??rminos y condiciones establecidos en esta p??gina.

            La siguiente terminolog??a se aplica a estos T??rminos y Condiciones, Declaraci??n de Privacidad y Aviso legal y cualquiera o todos los Acuerdos: el Cliente, Usted y Su se refieren a usted, la persona que accede a este sitio web y acepta los t??rminos y condiciones de la Compa????a. La Compa????a, Nosotros mismos, Nosotros y Nuestro, se refiere a nuestra Compa????a. Parte, Partes o Nosotros, se refiere en conjunto al Cliente y a nosotros mismos, o al Cliente o a nosotros mismos.

            Todos los t??rminos se refieren a la oferta, aceptaci??n y consideraci??n del pago necesario para efectuar el proceso de nuestra asistencia al Cliente de la manera m??s adecuada, ya sea mediante reuniones formales de una duraci??n fija, o por cualquier otro medio, con el prop??sito expreso de conocer las necesidades del Cliente con respecto a la provisi??n de los servicios/productos declarados de la Compa????a, de acuerdo con y sujeto a la ley vigente de (Direcci??n).

            Cualquier uso de la terminolog??a anterior u otras palabras en singular, plural, may??sculas y/o, ??l/ella o ellos, se consideran intercambiables y, por lo tanto, se refieren a lo mismo.

            Cookies

            Empleamos el uso de cookies. Al utilizar el sitio web de (Nombre de la tienda), usted acepta el uso de cookies de acuerdo con la pol??tica de privacidad de (Nombre de la tienda). La mayor??a de los modernos sitios web interactivos de hoy en d??a usan cookies para permitirnos recuperar los detalles del usuario para cada visita.

            Las cookies se utilizan en algunas ??reas de nuestro sitio para habilitar la funcionalidad de esta ??rea y la facilidad de uso para las personas que lo visitan. Algunos de nuestros socios afiliados/publicitarios tambi??n pueden usar cookies.

            Licencia

            A menos que se indique lo contrario, (Nombre de la tienda) y/o sus licenciatarios les pertenecen los derechos de propiedad intelectual de todo el material en (Nombre de la tienda).

            Todos los derechos de propiedad intelectual est??n reservados. Puedes ver y/o imprimir p??ginas desde (Agrega URL) para tu uso personal sujeto a las restricciones establecidas en estos t??rminos y condiciones.

            No debes:

            Volver a publicar material desde (wwww.ecommerce.com).
            Vender, alquilar u otorgar una sub-licencia de material desde (Agregar URL).
            Reproducir, duplicar o copiar material desde (Agregar URL).
            Redistribuir contenido de (Nombre de la tienda), a menos de que el contenido se haga espec??ficamente para la redistribuci??n.
            Aviso legal

            En la medida m??xima permitida por la ley aplicable, excluimos todas las representaciones, garant??as y condiciones relacionadas con nuestro sitio web y el uso de este sitio web (incluyendo, sin limitaci??n, cualquier garant??a impl??cita por la ley con respecto a la calidad satisfactoria, idoneidad para el prop??sito y/o el uso de cuidado y habilidad razonables).

            Nada en este aviso legal:

            Limita o excluye nuestra o su responsabilidad por muerte o lesiones personales resultantes de negligencia.
            Limita o excluye nuestra o su responsabilidad por fraude o tergiversaci??n fraudulenta.
            Limita cualquiera de nuestras o sus responsabilidades de cualquier manera que no est?? permitida por la ley aplicable.
            Excluye cualquiera de nuestras o sus responsabilidades que no pueden ser excluidas bajo la ley aplicable.
            Las limitaciones y exclusiones de responsabilidad establecidas en esta Secci??n y en otras partes de este aviso legal:
            1. est??n sujetas al p??rrafo anterior; y
            2. rigen todas las responsabilidades que surjan bajo la exenci??n de responsabilidad o en relaci??n con el objeto de esta exenci??n de responsabilidad, incluidas las responsabilidades que surjan en contrato, agravio (incluyendo negligencia) y por incumplimiento del deber legal.

            En la medida en que el sitio web y la informaci??n y los servicios en el sitio web se proporcionen de forma gratuita, no seremos responsables de ninguna p??rdida o da??o de ning??n tipo.

            Esta p??gina de T??rminos y Condiciones fue creada como un ejemplo por Jumpseller
        </textarea>

</div>
<div class="form-check mx-auto">
        <label class="form-check-label">
            <input id="check" type="checkbox" class="form-check-input">
            Acepto los terminos y condiciones
        </label>
    </div>
    </div>


<div class="mt-3 mx-auto" style="width:70%;">
        <a href="index.php?modulo=carrito" class="btn btn-primary" role="button">Regresar</a>

        <button disabled class="btn btn-primary" name="guardar" id="valores" type="submit">Continuar</button>
</div>

</form>

<?php

}else{?>


<div class="card col-md-4 offset-md-4 mt-5">

  <div class="card-body" >
    <h4 class="card-title">Para poder seguir comprando usted debe :</h4>
    <br>
      <a href="Registrarse.php"> Registrarse</a> o <a href="login.php"> Loguearse</a> 
         </div>

  
</div>

    <?php
    }
?>