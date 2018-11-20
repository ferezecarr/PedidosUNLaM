<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

   /*mostramos los productos (menus)en una tabla*/
    session_start();

    $conexion= new Conexion();


    /*$idComercio = $_POST['idComercio'];

    $query="SELECT * FROM menu WHERE idComercio= $idComercio";
    $resultado = $conexion->query($query);*/


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
                    <li class="breadcrumb-item active" aria-current="page"><a href="carritoProductos.php">Pedidos</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 <a href="carritoProductos.php" class="btn btn-success">Seguir Comprando</a>
                </div>

                 <?php $sumatotal = 0;?>
                <?php

                if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])):
                    ?>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Menu</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
         foreach($_SESSION["carrito"] as $c):
          $query2="SELECT * FROM menu WHERE idMenu=$c[idMenu]";
          $menu = $conexion->query($query2);
          $row2=$menu->fetch_assoc()
            ?>
<tr>
  <th><?php echo $c["q"];?></th>
  <td><?php echo $row2['titulo'];?></td>
  <td>$ <?php echo $row2['precio']; ?></td>
  <td>$ <?php echo $c["q"]*$row2['precio']; ?></td>
  
   <?php $sumatotal= $sumatotal +  $c["q"]*$row2['precio']; ?>

  <td style="width:260px;">
  <?php
  $encontrado = false;
  foreach ($_SESSION["carrito"] as $c) { if($c["idMenu"]==$row2['idMenu']){ $encontrado=true; break; }}
  ?>
    <a href="eliminarCarrito.php?idMenu=<?php echo $c["idMenu"];?>" class="btn btn-danger">Eliminar</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Total de la compra</th>
                            <th></th>
                        </tr>
                        <tr>
                          <th> <?php echo number_format($sumatotal,2); ?> </th>
                        </tr>
                    </thead>
                </table>
              </div>
            
<form class="form-horizontal" method="post" action="guardarCarrito.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email del cliente</label>
    <div class="col-sm-5">
      <input type="email" name="email"  id="inputEmail3" placeholder="Email del cliente">
      <input type="hidden" name="sumatotal"  id="sumatotal" value="<?php echo $sumatotal?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Pedir</button>
    </div>
  </div>
</form>


<?php else:?>
  <p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
<br><br><hr>

    </div>
  </div>
</div>
</body>
</html>