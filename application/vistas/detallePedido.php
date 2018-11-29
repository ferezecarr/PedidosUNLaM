<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

      $conexion= new Conexion();


    $idUsuario=$_POST['idUsuario'];
    $idPedido =$_POST['idPedido'];
    $idComercio=$_POST['idComercio'];


?>    

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php

        require_once $HEADER_DIR;

    ?>
    <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      #map {
        height: 35em;
        width: 80em;
      }
    </style>

</head>
<body>

    <?php

        require_once $NAVBAR_3_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="delivery.php">Delivery</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="aceptarPedido.php">Detalle del pedido</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 <h2>Detalle de pedido </h2>
                </div>
            
                            <?php //Solo muestro los pedidos pendientes 
                               $queryPendientes = mysqli_query($conexion,
                                " SELECT pedidos.idCarrito,carrito.fecha,carrito.hora,carrito.idComercio,
                                  carrito.totalCompra,pedidos.entrega,pedidos.idPedido,carrito.email
                                  FROM pedidos join carrito on carrito.idCarrito = pedidos.idCarrito 
                                  WHERE entrega = 'Pendiente' and idPedido='$idPedido'") or die(mysqli_error($conexion)); ?>

                                  <?php 
                                    $pedidos = $queryPendientes->fetch_array(MYSQLI_ASSOC) ?>
                                      <form action="aceptarPedido.php" method="post">
                                         <?php 
                                             $idComercio=$pedidos['idComercio'];

                                             $queryComercio = mysqli_query($conexion,
                                              " SELECT nombre,direccion 
                                                FROM comercio 
                                                WHERE idComercio= '$idComercio'") or die(mysqli_error($conexion));
                                             $nombreComercio = $queryComercio->fetch_array(MYSQLI_ASSOC)  ?>

                                              <?php 
                                             $emailUsuario=$pedidos['email'];

                                             $queryUsuario = mysqli_query($conexion,
                                              " SELECT direccion,idUsuario 
                                                FROM usuario 
                                                WHERE email= '$emailUsuario'") or die(mysqli_error($conexion));
                                             $direccionUsuario = $queryUsuario->fetch_array(MYSQLI_ASSOC)  ?>
                                        <tr>

                <form class="form-horizontal" action="aceptarPedido.php" method="post">

               <div class="form-group">
               <label class="col-sm-3 control-label">Fecha</label>
               <div class="col-sm-4">
               <input type="text" name="FechaPedido" readonly="readonly" value=" <?php echo $pedidos['fecha']; ?>" class="form-control">
               </div>

               <div class="form-group">
               <label class="col-sm-3 control-label">Hora</label>
               <div class="col-sm-4">
               <input type="text" name="HoraPedido" readonly="readonly" value=" <?php echo $pedidos['hora']; ?>" class="form-control">
               </div>
               <div class="form-group">
               <label class="col-sm-3 control-label">Comercio</label>
               <div class="col-sm-4">
               <input type="text" name="nombreComercio" readonly="readonly" value=" <?php echo $nombreComercio['nombre']; ?>" class="form-control">
               </div>
               <div class="form-group">
               <label class="col-sm-3 control-label">Direccion Comercio</label>
               <div class="col-sm-4">
               <input type="text" name="direccionComercio" readonly="readonly" value=" <?php echo $nombreComercio['direccion']; ?>" class="form-control">
               </div>
               <div class="form-group">
               <label class="col-sm-3 control-label">Importe</label>
               <div class="col-sm-4">
               <input type="text" name="importePedido" readonly="readonly" value=" $ <?php echo $pedidos['totalCompra']; ?>" class="form-control">
               </div>
               <div class="form-group">
               <label class="col-sm-3 control-label">Email Cliente</label>
               <div class="col-sm-4">
               <input type="text" name="estado" readonly="readonly" value="<?php echo $pedidos['email']; ?>" class="form-control">
               </div>
                <div class="form-group">
               <label class="col-sm-3 control-label">Direccion Cliente</label>
               <div class="col-sm-4">
               <input type="text" name="direccionUsuario" readonly="readonly" value=" <?php echo $direccionUsuario['direccion']; ?>" class="form-control">
               </div>
                <div class="form-group">
               <label class="col-sm-3 control-label">Estado</label>
               <div class="col-sm-4">
               <input type="text" name="estado" readonly="readonly" value="<?php echo $pedidos['entrega']; ?>" class="form-control">
                </div>

                 <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario;?>">

                 <input type="hidden" name="idPedido"  value="<?php echo $pedidos['idPedido'];?>">

                <div class="form-group">
               <label class="col-sm-3 control-label"></label>
               <div class="col-sm-4">
               <input type="submit" name="" readonly="readonly" value="Aceptar" class="btn btn-success btn-lg btn-block" class="form-control">
               </div>                                
                </form>
                              
                       
                    </tbody>
                <?php  ?>


                </table>
            </div>
        </div>     

  <div class="container">
        <?php
         
                
                $selectComercio= mysqli_query($conexion, 
                "SELECT *
                 FROM comercio
                 WHERE idComercio = '$idComercio'") or die(mysqli_error($conexion));

                    $comercio = mysqli_fetch_assoc($selectComercio);
                    $direccion = $comercio['direccion'];
                    $nombre = $comercio['nombre'];
                    ?>

                <?php
                $idCliente=$direccionUsuario['idUsuario'];

                $selectCliente= mysqli_query($conexion, 
                "SELECT *
                FROM usuario
                WHERE idUsuario = '$idCliente'") or die(mysqli_error($conexion));

                    $cliente = mysqli_fetch_assoc($selectCliente);
                    $direccionCliente = $cliente['direccion'];
                    $nombreCliente = $cliente['email'];
                    ?>


                    <h4 class="text-center">Mapa</h4>

                  <div style="text-align:center;" id="loadingSpinner">
                        <br>
                        <i class="fa fa-spinner fa-pulse fa-2x fa-fw" ></i>
                        <span class="sr-only">Cargando...</span>
                        <br>
                    </div>
                    
                    <div id="errors"></div>

                    <div id="map" class="img-thumbnail mx-auto" style="display: none;"></div>
                    <script>
                    function showLoadingSpinner(show) {
                        var loadingSpinner = document.getElementById('loadingSpinner');
                        loadingSpinner.style.display = (show === true ? '' : 'none');
                    }

                    function showMessageError(errorMessage) {
                        var errorsDiv = document.getElementById("errors");
                        errorsDiv.innerHTML = '<br><div class="alert alert-danger alert-dismissable">Error: ' + errorMessage + '</div>';
                    }

                    function showMap(show) {
                        var map = document.getElementById('map');
                        map.style.display = (show === true ? '' : 'none');
                    }

                    function onGoogleMapsLoadingError() {
                        showLoadingSpinner(false);
                        showMessageError('No se ha podido cargar el mapa por problemas de conexión con Google Maps.');
                    }

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15
                        });
                        var geocoder = new google.maps.Geocoder();
                        geocodeAddress(geocoder, map);
                    }
                    
                    // En base a una dirección obtiene las coordenadas y actualiza el mapa

                    function geocodeAddress(geocoder, resultsMap) {

                        var address =Array ('<?php echo $direccion?>','<?php echo $direccionCliente?>');
                       
                       for(i=0;i<2;i++) {
                        geocoder.geocode({'address': address[i]}, function(results, status) {
                        if (status === 'OK') {
                            showLoadingSpinner(false);
                            showMap(true);
                            
                            resultsMap.setCenter(results[0].geometry.location);

                            //var contentString = '<b><?php echo $nombre?></b><br><br>' + 
                            //'<p><?php echo $direccion?></p>' ; 
                            
                           // var infowindow = new google.maps.InfoWindow({
                               // content: contentString
                          //  });

                            var marker = new google.maps.Marker({
                            map: resultsMap,
                            position: results[0].geometry.location
                            });
                            // Cartel abierto por default
                            //infowindow.open(map, marker);
                           // marker.addListener('click', function() {
                               // infowindow.open(map, marker);
                           // });


                        } else {
                            showLoadingSpinner(false);
                            showMessageError('No se ha podido determinar la ubicación exacta del comercio.');
                        }
                        });
                    }
                  }

                    </script>
                        <script async defer onerror="onGoogleMapsLoadingError()"
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcf7cJonjwmrFflzRAF6lDf09sYMMY_DQ&callback=initMap">
                        </script>

      
  </body>
</html>