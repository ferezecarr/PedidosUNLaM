<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";

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
                    <li class="breadcrumb-item active" aria-current="page"><a href="cargarMenu.php">Cargar Menú</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                    Cargar Menú
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo $CONTROLADOR_MENU_HOST ?>" method="post">
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Escriba su titulo">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" name="descripcion" rows="5" id="descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file border">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Guardar Menú</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>