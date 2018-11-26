<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();

    $query="SELECT * FROM comercio WHERE activo=1";
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercios.php">Comercios</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 Comercios 
                </div>
                <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th></th>
                            <th>Horarios</th>
                            <th></th>
                             <th>Medios de Pago</th>


                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['horario1']; ?></td>
                                <td><?php echo $row['horario2']; ?></td>
                                <td><?php echo $row['horario3']; ?></td>
                                <td><?php echo $row['mediosPago']; ?></td>
                                </td>
                                <td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
            </div>
           
    
    
</body>
</html>