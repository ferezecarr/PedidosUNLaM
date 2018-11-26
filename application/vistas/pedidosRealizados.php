<?php
    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    session_start();
    
    if(!isset($_SESSION['Delivery']))/*verificar que es delivery*/
       { header("Location :" . $INDEX_HOST);}

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Delivery'];
    $conexion= new Conexion();

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

        require_once $NAVBAR_3_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="delivery.php">Delivery</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="pedidosRealizados.php">Pedidos Realizados</a></li>
                </ol>
            </nav>

            <div class="card" >
                <div class="card-header">
                 Pedidos Realizados o en curso
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Comercio</th>
                            <th>Importe</th> 
                            <th>Estado</th>           
                        </tr>
                    </thead>       
                    <tbody>
                            <?php //Solo muestro los pedidos pendientes 
                               $queryPendientes = mysqli_query($conexion,
                                " SELECT pedidos.idCarrito,carrito.fecha,carrito.hora,carrito.idComercio,
                                carrito.totalCompra,pedidos.entrega,pedidos.idPedido,pedidos.idDelivery
                                  from pedidos join carrito on carrito.idCarrito = pedidos.idCarrito 
                                  Where entrega = 'En viaje' or entrega = 'Entregado' 
                                   ") or die(mysqli_error($conexion)); ?>

                                  <?php 
                                    while ($pedidos = $queryPendientes->fetch_array(MYSQLI_ASSOC)) { ?>

                                        <!--Solo me muestra los pedidos que el delivery acepto-->
                                        <?php if($pedidos['idDelivery'] == $idUsuario) {   ?>
                                      <form action="gestionarEntregaPedido.php" method="post">
                                         <?php 
                                             $idComercio=$pedidos['idComercio'];

                                             $queryComercio = mysqli_query($conexion," SELECT nombre from comercio where idComercio= '$idComercio'") or die(mysqli_error($conexion));
                                             $nombreComercio = $queryComercio->fetch_array(MYSQLI_ASSOC)  ?>
                                        <tr>
                                        <td><?php echo $pedidos['fecha']; ?></td>
                                        <td><?php echo $pedidos['hora']; ?></td>
                                        <td><?php echo $nombreComercio['nombre']; ?></td>
                                        <td><?php echo $pedidos['totalCompra']; ?></td>
                                        <td><?php echo $pedidos['entrega']; ?></td>
                                          <td>
                                        <input type="hidden" name="idPedido"  value="<?php echo $pedidos['idPedido'];?>">
                                         <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario;?>">
                                         <input type="hidden" name="idComercio"  value="<?php echo $idComercio;?>">
                                          <input type="hidden" name="importePedido"  value="<?php echo $pedidos['totalCompra']; ?>">
                                           <input type="hidden" name="entrega"  value="<?php echo $pedidos['entrega']; ?>">

                                        <input type="submit" name="" class="btn btn-success btn-mg btn-block" value="Cambiar">
                                    </td>
                                
                               </form>
                           <?php } ?>
                                </td>
                           
                            </tr>
                       
                    </tbody>
                <?php } ?>


                </table>
            </div>
        </div>     

         
    
</body>
</html>