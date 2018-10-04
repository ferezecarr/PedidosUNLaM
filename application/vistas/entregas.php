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
                    <li class="breadcrumb-item active" aria-current="page">Entregas</li>
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
                                        <td>Cliente uno</td>
                                        <td>120.00</td>
                                        <td>En Preparación</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                        <td>Fideos con Salsa + Bebida</td>
                                        <td>100.00</td>
                                        <td>Enviado</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                        <td>1 Muzzarella Grande + Bebida</td>
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