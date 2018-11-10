<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    session_start();
    
    if(!isset($_SESSION['Cliente']))/*verificar que es cliente*/
        { header("Location :" . $INDEX_HOST);}

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Cliente'];

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

        require_once $NAVBAR_2_DIR ;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Cliente</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Mi Perfil</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                    Mi Perfil: : <h5><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h5>
                   <?php echo $tipoRol; ?>
                </div>
                <div class="card-body" style="">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba su nombre">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Escriba su teléfono">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Escriba su email">
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad:</label>
                            <input type="number" name="edad" id="edad" class="form-control" placeholder="Escriba su edad">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Mercado Pago
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Actualizar</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>