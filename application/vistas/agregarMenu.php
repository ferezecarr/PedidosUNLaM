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
                    <li class="breadcrumb-item active" aria-current="page"><a href="agregarMenu.php">Agregar Menú</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                    Agregar Menú
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo $ABM_MENU_HOST_ADD; ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Escriba su titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" name="descripcion" rows="5" id="descripcion" placeholder="Escriba su descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" class="form-control" name="precio" id="precio" placeholder="Escriba su precio">
                        </div>
                        <div class="form-group">
                            <label for="archivo">Seleccione un archivo:</label>
                            <input type="file" name="imagen" accept="image/*" class="form-control-file border">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Agregar Menú</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>