<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    session_start();
    /*if(!isset($_SESSION['Comercio']))/*verificar que es comercio*/
        /*{ header("Location :" . $INDEX_HOST);}*/

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Comercio'];

    $conexion= new Conexion();
    $query="SELECT * FROM usuario WHERE idUsuario=$idUsuario";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();



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

        require_once $NAVBAR_1_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Comercio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Mi Perfil</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                  Mi Perfil  : <h5><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h5>
                   <?php echo $tipoRol; ?>
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo  $ABM_COMERCIO_ADD ;?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba el nombre del Comercio">
                            </div>
                        <div>
                             <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario?>">
                        </div>
                       <!-- <div class="form-group">
                            <label for="medios-de-pagos">Medios de Pagos:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mediopago[]" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1" value="Débito Crédito VISA/Mastercard">
                                    Débito Crédito VISA/Mastercard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mediopago[]" id="defaultCheck1" value="Efectivo">
                                <label class="form-check-label" for="defaultCheck1">
                                 Efectivo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mediopago[]" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1" value="Mercado Pago">
                                Mercado Pago
                                </label>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escriba su direccion">
                        </div>
                        <div class="form-group">
                            <label for="horarios-de-atencion">Horarios de Atención:</label>
                            <div class="list-group">
                                <input type="text"  class="list-group-item list-group-item-action list-group-item-success" name="horario1" value="Lunes a Viernes de 8:00 a 20:00 hs">
                                <input type="text"  class="list-group-item list-group-item-action list-group-item-success" name="horario2" value="Sabados de 8:00 a 00:00 hs">
                                <input type="text" class="list-group-item list-group-item-action list-group-item-success" name="horario3" value="Domingos y Feriados de 10:00 a 23:00 hs">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Agregar Comercio</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>