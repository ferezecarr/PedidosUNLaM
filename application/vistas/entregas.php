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
                    <li class="breadcrumb-item active" aria-current="page"><a href="entregas.php">Entregas</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                    Entregas
                </div>
                <div class="card-body" style="">
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Delivery</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                        <td>Cliente Uno</td>
                                        <td>120.00</td>
                                        <td>En Espera</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                        <td>Cliente Dos</td>
                                        <td>160.00</td>
                                        <td>En Viaje</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                        <td>Cliente Tres</td>
                                        <td>175.00</td>
                                        <td>Entregado</td>
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