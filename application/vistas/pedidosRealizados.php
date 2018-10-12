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

        require_once $NAVBAR_3_DIR;

    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="delivery.php">Delivery</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="pedidosRealizados.php">Pedidos Realizados</a></li>
                </ol>
            </nav>

            <div class="card" >
                <div class="card-header">
                    Historial De Pedidos Realizados
                </div>
                <div class="card-body" style="">
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Pedido</th>
                                    <th scope="col">Detalle Pedido</th>
                                    <th scope="col">Detalle Entrega</th>
                                    <th scope="col">Comisión</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <th scope="row">1</th>
                                        <td>Milanesas c/ pure</td>
                                        <td>Entregado Satisfactoriamente</td> 
                                        <td>50.00</td>
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