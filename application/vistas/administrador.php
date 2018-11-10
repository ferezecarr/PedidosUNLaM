<?php 

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    $conexion= new Conexion();
    session_start();

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Administrador'];


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


            <div class="card">
                <div class="card-header">
                 <a href="comercios.php"> +  Agregar Pedido </a>
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Agregar Bebida</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['idUsuario']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td>
                                    <button class="btn btn-success">Eliminar
                                    <a href="<?php echo $MODIFICAR_MENU_HOST; ?>" data-href="modificar.php?id=<?php echo $ABM_MENU_HOST_MOD; /*$row['idMenu'];*/ ?>">
                                    </a>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-warning">Modificar
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