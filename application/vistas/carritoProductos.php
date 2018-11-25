<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;
   /*mostramos los productos (menus)en una tabla*/
    session_start();

    $conexion= new Conexion();


    //$idComercio=$_SESSION['idComercio'];
//    $idComercio= $_POST['idComercio'];
  

    $query="SELECT * FROM menu ORDER BY idComercio;";
    $resultado = $conexion->query($query);
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="comprar.php">Comprar</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="carritoProductos.php">Pedidos</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 <a href="carrito.php" class="btn btn-success">Ver Carrito</a>
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Descripcion</th>
                             <th>Precio</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['titulo']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td><?php echo $row['precio']; ?></td>
                                <td>
                                    <?php
                                     $encontrado = false;

                                      if(isset($_SESSION["carrito"])){ foreach ($_SESSION["carrito"] as $c) { if($c["idMenu"]==$row['idMenu']){ $encontrado=true; break; }}}
                                         ?>
                                         <?php if($encontrado):?>

                                         <a href="carrito.php?idComercio=<?php echo $idComercio;?>" class="btn btn-info">Agregado</a>

                                         <?php else:?>

                                        <form class="form-inline" method="post" action="agregarCarrito.php">
                                         <input type="hidden" name="idMenu" value="<?php echo $row['idMenu']; ?>">
                                        <input type="hidden" name="idComercio" value="<?php echo $idComercio; ?>">
                                        <div class="form-group">

                                        <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
                                        </div>

                                         <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                        </form> 
                                      <?php endif; ?>
                                    </td>
                                </tr>
                           <?php } ?>
                        </table>

        </div>
    </div>
</div>
</body>
</html>
