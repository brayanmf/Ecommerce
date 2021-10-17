
<?php

require __DIR__ .  '/vendor/autoload.php';
require_once "./controlador/pasarela2.php"

?>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<body>
<!--<a href=" /*echo $preference->init_point; */ ?>">Pagar con Mercado Pago action="pasarela2.php"</a>-->
<table class="table table-striped table-inverse" id="tablapasarela">
    <thead class="thead-inverse">
        <tr>
        <th>Image</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
     
        </tr>
    </thead>
    <tbody>
 

    </tbody>

</table>
<form  action=" "> 
 <script
  src="https://www.mercadopago.com.pe/integrations/v1/web-payment-checkout.js"
  data-preference-id="<?php echo $preference->id; ?>">
</script> 
  </form>
  </body>
  </form>


<script>
// Agrega credenciales de SDK
  const mp = new MercadoPago('TEST-c776db17-ec03-4402-8fec-dd3026df7c23', {
    //TEST-c776db17-ec03-4402-8fec-dd3026df7c23
        locale: 'es-PE'
  });

  // Inicializa el checkout
 
</script>
</form>

</body>
</html>
