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

        require_once $NAVBAR_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ingreso</li>
                </ol>
            </nav>

        <!--<div class="alert alert-danger page-alert" id="alert-1">
            <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
            <strong>¡Error!</strong> El usuario ya existe
        </div>-->

            <div class="card" style="">
                <div class="card-header">
                    Ingresar a mi cuenta
                </div>
                <div class="card-body" style="">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Escriba su email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Escriba su password">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="">Comercio</option>
                                <option value="">Cliente</option>
                                <option value="">Repartidor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="recordarme" id="recordarme"> Recordarme
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Ingresar</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>