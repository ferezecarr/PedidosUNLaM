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

        <!--<div class="alert alert-success page-alert" id="">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> Bienvenido
        </div>-->

            <div class="card">
                <div class="card-header">
                  <h2>  Registrate</h2>
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo  $ABM_REGISTRO_HOST_ADD; ?>" method="post">
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
                            <input type="email" name="email" id="email" class="form-control" placeholder="Escriba su email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Escriba su password" required >
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Repetir Password:</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Reescriba su password" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escriba su dirección">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Escriba su telefono">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="2">Comercio</option>
                                <option value="1">Cliente</option>
                                <option value="3">Repartidor</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Registrarse</button>
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