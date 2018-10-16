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
                    <li class="breadcrumb-item active" aria-current="page">Registro</li>
                </ol>
            </nav>

        <!--<div class="alert alert-success page-alert" id="alert-1">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> Nuevo Usuario
        </div>-->

            <div class="card">
                <div class="card-header">
                    Ingresar a mi cuenta
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo $REGISTRAR_LOGIN_HOST; ?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba su nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Escriba su apellido">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Escriba su email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Escriba su password">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Repetir Password:</label>
                            <input type="password" name="password-confirm" id="password-confirm" class="form-control" placeholder="Reescriba su password">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="">Comercio</option>
                                <option value="">Cliente</option>
                                <option value="">Repartidor</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Registrase</button>
                        <button type="reset" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                        <br>
                        <p class="text-center">
                            ¿Ya tenes una cuenta? <a href="ingreso.php">Ingrese Aqui</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>