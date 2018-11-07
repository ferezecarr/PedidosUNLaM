<?php 

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();


    $where = "";
    
    if(!empty($_POST))
    {
        $valor = $_POST['campo'];
        if(!empty($valor)){
            $where = "WHERE idMenu LIKE '%$valor'";
        }
    }
    $sql = "SELECT * FROM usuario $where";
    $resultado = $conexion->query($sql);
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

        require_once $NAVBAR_4_DIR ;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Administrar Comercios</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Solicitud Comercios</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 <a href="comercios.php"> +  Agregar Pedido </a>
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['categoria']; ?></td>
                                <td>
                                    <button class="btn btn-success">Modificar
                                    <a href="<?php echo $MODIFICAR_MENU_HOST; ?>" data-href="modificar.php?id=<?php echo $ABM_MENU_HOST_MOD; /*$row['idMenu'];*/ ?>">
                                    </a>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-warning">Eliminar
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