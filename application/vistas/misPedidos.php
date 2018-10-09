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

        require_once $NAVBAR_2_DIR ;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Cliente</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Mis Pedidos</a></li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                 +  Agregar Pedido
                </div>
                <div class="card-body" style="">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="comercio">Ingrese Comercio:</label>
                            <input type="text" name="comercio" id="comercio" class="form-control" placeholder="Ingrese un comercio">
                        </div>
                        <div class="form-group">
                            <label for="menu">Ingrese Menú:</label>
                            <input type="text" name="menu" id="menu" class="form-control" placeholder="Ingrese su menu">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Agregar bebida
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Comprar</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card" >
                <div class="card-header">
                    Entregas
                </div>
                <div class="card-body" style="">
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Comercio</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                        <td>Milanesas c/ pure</td>
                                        <td>150.00</td> 
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>