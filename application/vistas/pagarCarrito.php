<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;
    require_once "lib/mercadopago.php";

    session_start();

    $conexion= new Conexion();
    $idCarrito = $_GET['idCarrito'];



    $query="SELECT * FROM carrito WHERE idCarrito= $idCarrito";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();


// MercadoPago:
// 
// Tarjetas de Crédito de Prueba: (Argentina)
// ------------------------------------------
// Visa: 4509 9535 6623 3704
// MasterCard: 5031 7557 3453 0604
// American Express: 3711 803032 57522

// Estados del Pago: (Poner en Nombre y Apellido)
// ----------------------------------------------
// APRO : Payment approved.
// CONT : Pending payment.
// CALL : Payment declined, call to authorize.
// FUND : Payment declined due to insufficient funds.
// SECU : Payment declined by security code.
// EXPI : Payment declined by expiration date.
// FORM : Payment declined due to error in form.
// OTHE : General decline.

// Usuario de Prueba: 
// usuario: test_user_48440768@testuser.com
// contraseña: qatest1408


// Configuración de MercadoPago
  $mp = new MP("7466445635971939", "b2T9AcENUezVW34XoYyOWe4mO1Ow4M32");

  $preference_data = array(
    "items"=> array(
      array(       "id" => $row['idCarrito'],
                  "title" => "Pago de pedido",
                  "description" => "",
                  "category_id" => "services",
                  "currency_id" => "ARS",
                  "quantity" => 1,
                  "unit_price" => (float) $row["totalCompra"]

      )));

  $preference_data =$mp->create_preference($preference_data);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php

        require_once $HEADER_DIR;

    ?>

</head>
<body>

    <?php

        require_once $NAVBAR_2_DIR ;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="cliente.php">Cliente</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="misPedidos.php">Mis Pedidos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="PagarCarrito.php">Pagar Pedido</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                  <h5>Pagar Pedido</h5>
                </div>
                

            <!--  $estadocarrito = "Pago";
              
              // Actualizo el estado del pedido
              $updateCarrito = mysqli_query($conexion, "UPDATE carrito SET estado='$estadocarrito' WHERE idCarrito='$idCarrito'") or die(mysqli_error($conexion));
              if ($updateCarrito) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Se ha realizado el pago satisfactoriamente.</div>';
              } else {
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error: No se ha podido actualizar el estado del carrito!</div>';
              }-->
        
 
      <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <label class="col-sm-3 control-label"><b>Pedido:</b></label>
        </div>

              <div class="form-group">
          <label class="col-sm-3 control-label">Importe</label>
          <div class="col-sm-4">
            <input type="text" name="importePedido" readonly="readonly" value="$ <?php echo $row['totalCompra']; ?>" class="form-control">
          </div>
             <div class="form-group">
          <label class="col-sm-3 control-label">Email Cliente</label>
          <div class="col-sm-4">
            <input type="text" name="email" readonly="readonly" value="<?php echo $row['email']; ?>" class="form-control">
          </div>
        </div>
  
        
            <div>
              <!-- Boton de MercadoPago -->
              <a href="<?php echo $preference["response"]["init_point"]; ?>" mp-mode="modal" name="MP-Checkout" id="botonMercadoPago" class="btn btn-sm btn-primary">Pagar</a>
            </div>
          </div>
          
  </div>

  <!-- Cargar library JavaScript de MercadoPago -->
  <script type="text/javascript">
  (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
   <script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
                              
</body>
</html>