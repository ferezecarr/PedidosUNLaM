<?php 

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    $conexion= new Conexion();
    session_start();

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Administrador'];

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

        require_once $NAVBAR_4_DIR ;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <div class="card">
                <div class="card-header">
                 <div class="jumbotron">
                <h2><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h2>
                 <h3><?php echo $tipoRol; ?></h3>
                <br/>
            </div>
        </div>
       </div>         
    </div>   
            
    
    
</body>
</html>