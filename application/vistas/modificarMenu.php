<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();

    $idComercio = $_POST['idComercio'];


    $where = "";
    
    if(!empty($_POST))
    {
        $valor = $_POST['idMenu'];
        if(!empty($valor)){
            $where = "WHERE idMenu ='$valor'";
        }
    }
    $sql = "SELECT * FROM menu $where";
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

        require_once $NAVBAR_1_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Comercio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="modificarMenu.php">Modificar Menú</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                    Modificar Menú
                </div>
                <div class="card-body" style="">
                    <?php 
                          $row = $resultado->fetch_array(MYSQLI_ASSOC)  ?>
                    <form action="<?php echo  $ABM_MENU_HOST_MOD; ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <input type="hidden" name="idMenu" value="<?php echo $row['idMenu'];?>"">

                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $row['titulo'];?>">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" name="descripcion" rows="5" id="descripcion"><?php echo $row['descripcion'];?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $row['precio'];?>">
                        </div>

                        <div class="form-group">
                            <label for="archivo">Modificar Foto:</label>
                            <input type="file" name="imagen" accept="image/*" class="form-control-file border">
                              <img src="../imagenes/<?php echo $row['archivo'];?>">             

                        </div>
                            <input type="hidden" name="idComercio" value="<?php echo $idComercio;?>">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Actualizar Menú</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                    <?php ;?>"
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>