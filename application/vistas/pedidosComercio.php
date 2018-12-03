<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Comercio'];

    $conexion= new Conexion();
    $query="SELECT * FROM comercio WHERE idUsuario=$idUsuario";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();
    $idComercio= $row['idComercio'];


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

        require_once $NAVBAR_1_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Comercio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="pedidos.php">Pedidos</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                   <h5> Pedidos</h5>
                </div>
                 <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Delivery</th>
                            <th>Importe</th> 
                            <th>Estado</th>           
                        </tr>
                    </thead>       
                    <tbody>
                            <?php //Solo muestro los pedidos del comercio 
                               $queryPedidos = mysqli_query($conexion,
                                " SELECT carrito.fecha,carrito.hora,carrito.email,
                                   carrito.totalCompra,pedidos.entrega,pedidos.idDelivery
                                  FROM pedidos JOIN carrito ON carrito.idCarrito = pedidos.idCarrito 
                                  WHERE carrito.idComercio = $idComercio
                                   ") or die(mysqli_error($conexion)); ?>

                                  <?php 
                                    while ($pedidos = $queryPedidos->fetch_array(MYSQLI_ASSOC)) { ?>
                                   
                                       <?php 
                                             $idDelivery=$pedidos['idDelivery'];

                                             $queryNombreDelivery = mysqli_query($conexion,
                                              " SELECT nombre 
                                                FROM   usuario 
                                                WHERE  idUsuario = '$idDelivery'") or die(mysqli_error($conexion));
                                             $nombreDelivery = $queryNombreDelivery->fetch_array(MYSQLI_ASSOC)  ?>

                                        <tr>
                                        <td><?php echo $pedidos['fecha']; ?></td>
                                        <td><?php echo $pedidos['hora']; ?></td>
                                        <td><?php echo $pedidos['email']; ?></td>
                                        <td><?php echo $nombreDelivery['nombre']; ?></td>
                                        <td><?php echo $pedidos['totalCompra']; ?></td>

                                      <?php  if($pedidos['entrega'] == "Entregado" ) { ?>
                                       <td> <p style="color: green;">
                                        <?php echo $pedidos['entrega'] ?>
                                        </p></td>
                                       <?php } ?>
                                        <?php if($pedidos['entrega'] == "Cancelado" ) { ?> 
                                        <td><p style="color: red;">
                                         <?php echo $pedidos['entrega'] ?> </p></td>    
                                         <?php } ?>
                                          <td>
                                        <?php  if($pedidos['entrega'] == "Pendiente" or $pedidos['entrega']== "En viaje" ) { ?>
                                        <?php echo $pedidos['entrega'] ?>
                                       <?php } ?>
                                    
                                    </td>
                           <?php } ?>
                       
                    </tbody>

          
                </table>
            </div>
       </div>

    </div>
    
    
</body>
</html>