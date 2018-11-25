<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    session_start();
    
    if(!isset($_SESSION['Cliente']))/*verificar que es cliente*/
       { header("Location :" . $INDEX_HOST);}

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Cliente'];
    $conexion= new Conexion();

     $sql = "SELECT email FROM usuario WHERE  idUsuario = $idUsuario ";
    $resultado2 = $conexion->query($sql);
    $row2=$resultado2->fetch_assoc();
    $email= $row2['email'];



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
                    <li class="breadcrumb-item active" aria-current="page"><a href="cliente.php">Mi Perfil</a></li><li class="breadcrumb-item active" aria-current="page"><a href="misPedidos.php">Mis Pedidos</a></li>
                </ol>
            </nav>

                   <div class="card">
                <div class="card-header">
                 <h2>Mis pedidos</h2>
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
                            <?php //Solo muestro los pedidos pendientes,que tiene el usuario cliente 
                               $queryPendientes = mysqli_query($conexion,
                                " SELECT pedidos.idCarrito,carrito.fecha,carrito.hora,carrito.idComercio,
                                carrito.totalCompra,pedidos.entrega,pedidos.idPedido
                                  from pedidos join carrito on carrito.idCarrito = pedidos.idCarrito 
                                  Where entrega = 'Pendiente' and carrito.email ='$email'") or die(mysqli_error($conexion)); ?>
                                  <?php 
                                    while ($pedidos = $queryPendientes->fetch_array(MYSQLI_ASSOC)) { 
                                         
                                             $idComercio=$pedidos['idComercio'];

                                             $queryComercio = mysqli_query($conexion," SELECT nombre from comercio where idComercio= '$idComercio'") or die(mysqli_error($conexion));
                                             $nombreComercio = $queryComercio->fetch_array(MYSQLI_ASSOC)  ?>
                                
                                    <form action="" method="post">
                                        <tr>
                                        <td><?php echo $pedidos['fecha']; ?></td>
                                        <td><?php echo $pedidos['hora']; ?></td>
                                        <td><?php echo $nombreComercio['nombre']; ?></td>
                                        <td><?php echo $pedidos['totalCompra']; ?></td>
                                        <td><?php echo $pedidos['entrega']; ?></td>
                                
                            </form>
                                <td>
                                   <form action="" method="post">
                                    <?php //Actualizo el estado del pedido
                                         /* $idPedido=$pedidos['idPedido'];
                                       $updatePedido = mysqli_query($conexion, "UPDATE pedidos SET entrega='Cancelado' WHERE idpedido='$idPedido'") or die(mysqli_error($conexion)); */?>

                                   <input type="submit" name="" class="btn btn-warning " value="Cancelar">
                                   </form>
                                </td>
                            </tr>
                       
                    </tbody>
                <?php } ?>


                </table>
            </div>
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
                            <?php //Pedidos que no estan pendientes
                               $queryPendientes = mysqli_query($conexion,
                                " SELECT pedidos.idCarrito,carrito.fecha,carrito.hora,carrito.idComercio,
                                carrito.totalCompra,pedidos.entrega
                                  from pedidos join carrito on carrito.idCarrito = pedidos.idCarrito 
                                  Where entrega != 'Pendiente' and carrito.email ='$email'") or die(mysqli_error($conexion)); ?>
                                  <?php 
                                    while ($pedidos = $queryPendientes->fetch_array(MYSQLI_ASSOC)) { 
                                         
                                             $idComercio=$pedidos['idComercio'];
                                             $queryComercio = mysqli_query($conexion," SELECT nombre from comercio where idComercio= '$idComercio'") or die(mysqli_error($conexion));
                                             $nombreComercio = $queryComercio->fetch_array(MYSQLI_ASSOC)  ?>
                                
                                    <form action="" method="post">
                                        <tr>
                                        <td><?php echo $pedidos['fecha']; ?></td>
                                        <td><?php echo $pedidos['hora']; ?></td>
                                        <td><?php echo $nombreComercio['nombre']; ?></td>
                                        <td><?php echo $pedidos['totalCompra']; ?></td>
                                        <td><?php echo $pedidos['entrega']; ?></td>
                                
                            </form>
                                <td>
                                   <form action="" method="post">
                                   </form>
                                </td>
                            </tr>
                       
                    </tbody>
                <?php } ?>


                </table>
            </div>
        </div>

    </div>
            
    
    
</body>
</html>