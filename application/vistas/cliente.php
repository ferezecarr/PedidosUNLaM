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
    $row=$resultado->fetch_array(MYSQLI_ASSOC);

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
                    Mi Perfil: 
                   <?php echo $tipoRol; ?>
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo  $ABM_CLIENTE_MOD; ?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $row['nombre'];?>">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $row['apellido'];?>">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $row['telefono'];?>">
                        </div>
                          <div class="form-group">
                            <label for="direccion">Direccion:</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $row['direccion'];?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email'];?>" required>

                             <input type="hidden" name="idUsuario" id="idUsuario" class="form-control" value="<?php echo $row['idUsuario'];?>">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Actualizar</button>
                        <button type="reset" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>