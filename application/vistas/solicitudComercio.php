<?php 

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();

    $query="SELECT * FROM comercio WHERE activo=0";
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
                 <h2>Lista de Comercios Pendientes</h2>
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
                        <form action="<?php echo $ACTIVAR;?>" method="post">
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                
                                <td>     
                                     <input type="hidden" name="idComercio"  value="<?php echo $row['idComercio'];?>">
                                     <input type="submit" name="" class="btn btn-success btn-mg " value="Activar">
                                </td>
                            </form>
                                <td>
                                   <form action="<?php echo $ABM_COMERCIO_DEL; ?>" method="post">
                                   <input type="hidden" name="idComercio"  value="<?php echo $row['idComercio'];?>">
                                   <input type="submit" name="" class="btn btn-warning " value="Eliminar">
                                   </form>
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