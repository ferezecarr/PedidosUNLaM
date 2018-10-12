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
                    <li class="breadcrumb-item active" aria-current="page"><a href="pedidosDisponibles.php">Pedidos Disponibles</a></li>
                </ol>
            </nav>

            <h1 style="color:white;">Aca Va Los Pedidos Disponibles</h1>
        </div>
        </div>
    </div>
    
    
</body>
</html>