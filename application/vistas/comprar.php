<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();

   // $idUsuario=$_SESSION['idUsuario'];

    $query="SELECT  * FROM comercio WHERE activo = 1";
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
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 Lista de comercios 
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <form action="<?php echo  $CARRITO_PRODUCTOS;?>" method="post">
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td>
                                    <input type="hidden" name="idComercio"  value="<?php echo $row['idComercio'];?>">

                                        <input type="submit" name="" class="btn btn-success " value="Ver menus">
                                    </td>
                                </form>
                                <td>
                                    <button class="btn btn-warning">Oferta del dia
                                    <a href="<?php echo $ABM_MENU_HOST_DEL; ?>" data-href="eliminar.php?id=<?php echo $row['idMenu']; ?>" data-toggle="modal" data-target="#confirm-delete"></a>
                                </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            
    
    
</body>
</html>