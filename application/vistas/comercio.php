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
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Mi perfil</a></li>
                </ol>
            </nav>   
            <div class="card" style="">
                <div class="card-header">
                  Mi Perfil  : <h5><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h5>
                   <?php echo $tipoRol; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                     <form action="<?php echo $AGREGAR_COMERCIO_HOST; ?>" method="post">
                                   <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario?>">
                                   <input type="submit" name="" class="btn btn-success btn-lg btn-block" value="Ingresar Comercio">
                                   </form>
                </div>
                      <form action="<?php echo $MODIFICAR_COMERCIO_HOST;?>" method="post">
                                        <input type="hidden" name="idMenu"  value="<?php echo $row['idMenu'];?>">
                                        <input type="submit" name="" class="btn btn-success btn-lg btn-block" value="Modificar Comercio">
                                </form>
            </div>
        </div>
        
</body>
</html>