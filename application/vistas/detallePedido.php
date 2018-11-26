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
                                  from pedidos join carrito on carrito.idCarrito = pedidos.idCarrito 
                                  Where entrega = 'Pendiente' and idPedido='$idPedido'") or die(mysqli_error($conexion)); ?>

                                  <?php 
                                    $pedidos = $queryPendientes->fetch_array(MYSQLI_ASSOC) ?>
                                      <form action="aceptarPedido.php" method="post">
                                         <?php 
                                             $idComercio=$pedidos['idComercio'];

                                             $queryComercio = mysqli_query($conexion," SELECT nombre,direccion from comercio where idComercio= '$idComercio'") or die(mysqli_error($conexion));
                                             $nombreComercio = $queryComercio->fetch_array(MYSQLI_ASSOC)  ?>
                                        <tr>

                <form class="form-horizontal" action="aceptarPedido.php" method="post">

               <div class="form-group">
               <label class="col-sm-3 control-label">Fecha</label>
               <div class="col-sm-4">
               <input type="text" name="FechaPedido" readonly="readonly" value="$ <?php echo $pedidos['fecha']; ?>" class="form-control">
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




</body>
</html>               