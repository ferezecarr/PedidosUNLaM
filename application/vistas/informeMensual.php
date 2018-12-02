 <?php
    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    $conexion= new Conexion();
    session_start();

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Administrador'];


    $conexion= new Conexion();
    $query="SELECT * FROM usuario WHERE idUsuario=$idUsuario";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php

        require_once $HEADER_DIR;

    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

    <?php

        require_once $NAVBAR_4_DIR ;

    ?>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="informeMensual.php">Informe Mensual</a></li>
                    
                </ol>
            </nav>
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12 main">
            <div class="card">
                <div class="card-header">
                <div class="container">
        <div class="content">
            <h2>Informe Mensual</h2>
            <hr />
            
            <label><b>Periodo de Liquidación:</b></label>
            <?php
                // Valores por defecto 
                $year = $month = 0;
                if (isset($_GET["year"])) {
                    $year = mysqli_real_escape_string($conexion, (strip_tags($_GET["year"], ENT_QUOTES)));
                }
                if (isset($_GET["month"])) {
                    $month = mysqli_real_escape_string($conexion, (strip_tags($_GET["month"], ENT_QUOTES)));
                }
                if ($year != 0 && $month != 0) {
                    $periodoLiquidacion = "$year-$month-01";
                }
            ?>
            
            <form class="form-inline" method="GET">
                <div class="form-group mb-2">
                    <select name="year" class="form-control" onchange="this.form.submit()">
                        <option disabled <?php if ($year == 0) echo 'selected'; ?>>- Año -</option>
                        <option value='2018' <?php if ($year == "2018" ) echo 'selected'; ?>>2018</option>
                        <option value='2019' <?php if ($year == "2019" ) echo 'selected'; ?>>2019</option>
                        <option value='2020' <?php if ($year == "2020" ) echo 'selected'; ?>>2020</option>
                        <option value='2021' <?php if ($year == "2021" ) echo 'selected'; ?>>2021</option>
                        <option value='2022' <?php if ($year == "2022" ) echo 'selected'; ?>>2022</option>
                        <option value='2023' <?php if ($year == "2023" ) echo 'selected'; ?>>2023</option>
                        <option value='2024' <?php if ($year == "2024" ) echo 'selected'; ?>>2024</option>
                        <option value='2025' <?php if ($year == "2025" ) echo 'selected'; ?>>2025</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select name="month" class="form-control" onchange="this.form.submit()">
                        <option disabled <?php if ($month == 0) echo 'selected'; ?>>- Mes -</option>
                        <option value='01' <?php if ($month == "01" ) echo 'selected'; ?>>Enero</option>
                        <option value='02' <?php if ($month == "02" ) echo 'selected'; ?>>Febrero</option>
                        <option value='03' <?php if ($month == "03" ) echo 'selected'; ?>>Marzo</option>
                        <option value='04' <?php if ($month == "04" ) echo 'selected'; ?>>Abril</option>
                        <option value='05' <?php if ($month == "05" ) echo 'selected'; ?>>Mayo</option>
                        <option value='06' <?php if ($month == "06" ) echo 'selected'; ?>>Junio</option>
                        <option value='07' <?php if ($month == "07" ) echo 'selected'; ?>>Julio</option>
                        <option value='08' <?php if ($month == "08" ) echo 'selected'; ?>>Agosto</option>
                        <option value='09' <?php if ($month == "09" ) echo 'selected'; ?>>Septiembre</option>
                        <option value='10' <?php if ($month == "10" ) echo 'selected'; ?>>Octubre</option>
                        <option value='11' <?php if ($month == "11" ) echo 'selected'; ?>>Noviembre</option>
                        <option value='12' <?php if ($month == "12" ) echo 'selected'; ?>>Diciembre</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mb-2">Actualizar</button>
            </form>
            <?php
                    if (isset($periodoLiquidacion)) {
                        $queryLiquidacionExistente = mysqli_query($conexion,
                        "SELECT *
                        FROM liquidacion
                        WHERE liquidacion.fechaEntrega >= '$periodoLiquidacion'") or die(mysqli_error($conexion));
                          if (mysqli_num_rows($queryLiquidacionExistente) == 0) {
                            echo '<div class="alert alert-warning alert-dismissable">Aviso: No existe una liquidación para el periodo seleccionado.</div>';
                        } else {
                            ?>

                            <label class=""><b>Total de ventas Comercios:</b></label>
                        </br>

                                  <?php
                                $queryTotalventasPorComercio = mysqli_query($conexion,
                                "SELECT SUM(liquidacion.importe) as total
                                FROM liquidacion                          
                                WHERE liquidacion.fechaEntrega >= '$periodoLiquidacion' ORDER BY liquidacion.idComercio") or die(mysqli_error($conexion));
                                
                                $totalPorComercio = (float) 0.0;
                                if ($queryTotalventasPorComercio) {
                                    $totalPorComercio = number_format((float)mysqli_fetch_assoc($queryTotalventasPorComercio)["total"], 2, '.', '');
                                }
                                echo "<strong>TOTAL:</strong> $ $totalPorComercio";
                            ?>
                            <br>
                             
                                <?php  $sumatotalComercio= 0; ?>
                             <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre Comercio</th>
                                    <th>Importe</th>
                                    <th>Porcentaje Comercio</th>                      

                                </tr>
                                 <?php
                               $queryComercio = mysqli_query($conexion,
                                "SELECT fechaEntrega,idComercio,importe,(importe*0.08) as importeComercio
                                 FROM liquidacion                          
                                 WHERE liquidacion.fechaEntrega >= '$periodoLiquidacion' 
                                 ORDER BY liquidacion.fechaEntrega") or die(mysqli_error($conexion));?>                               
                          <tbody>                    

                        <?php while($row = $queryComercio->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                           <?php 
                             $idComercio=$row['idComercio'];
                             $queryNombreComercio = mysqli_query($conexion,
                                 " SELECT nombre 
                                   FROM comercio 
                                   WHERE idComercio= '$idComercio'") or die(mysqli_error($conexion));
                                   while( $nombreComercio = $queryNombreComercio->fetch_array(MYSQLI_ASSOC)) { ?>

                                <td><?php echo $row['fechaEntrega']; ?></td>
                                <td><?php echo $nombreComercio['nombre'] ?></td>
                                <td><?php echo $row['importe']; ?></td>
                                <td><?php echo $row['importeComercio']; ?></td>           
                                
                                 <?php  $sumatotalComercio= $sumatotalComercio + $row['importeComercio']; ?>
                                </td>
                                <td>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                         

                                  <?php
                                $queryTotalPedidosEntregados = mysqli_query($conexion,
                                "SELECT SUM(liquidacion.importe) as total
                                FROM liquidacion                          
                                WHERE liquidacion.fechaEntrega >= '$periodoLiquidacion' 
                                ") or die(mysqli_error($conexion));
                                
                                $totalPorDelivery = (float) 0.0;
                                if ($queryTotalPedidosEntregados) {
                                    $totalPorDelivery = number_format((float)mysqli_fetch_assoc($queryTotalPedidosEntregados)["total"], 2, '.', '');
                                }
                    
                            ?>
                            <br>
                        </br>
                         <?php  $sumatotalDelivery= 0; ?>
                             <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Importe</th>
                                    <th>Porcentaje Delivery</th>
                                </tr>
                                 <?php
                               $queryDelivery = mysqli_query($conexion,
                                "SELECT fechaEntrega,idDelivery,importe,(importe*0.03) as importeDelivery
                                 FROM liquidacion                          
                                 WHERE liquidacion.fechaEntrega >= '$periodoLiquidacion'
                                 ORDER BY liquidacion.fechaEntrega") or die(mysqli_error($conexion));?>
                          <tbody>
                        <?php while($row = $queryDelivery->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <?php 
                                 $idDelivery=$row['idDelivery'];
                                 $queryNombreDelivery = mysqli_query($conexion,
                                 " SELECT nombre,apellido 
                                   FROM usuario 
                                   WHERE idUsuario= '$idDelivery'") or die(mysqli_error($conexion));
                                   while( $nombreDelivery = $queryNombreDelivery->fetch_array(MYSQLI_ASSOC)) { ?>

                                <td><?php echo $row['fechaEntrega']; ?></td>
                                <td><?php echo $nombreDelivery['nombre']; ?></td>
                                <td><?php echo $nombreDelivery['apellido']; ?></td>
                                <td><?php echo $row['importe']; ?></td>
                                <td><?php echo $row['importeDelivery']; ?></td>
                                
                                <?php  $sumatotalDelivery= $sumatotalDelivery +  $row['importeDelivery'];; ?>
                                </td>
                                <td>
                                </td>
                            </tr>
                    </tbody>

              <?php }  ?>
             <?php }  ?> 
          <?php }  ?> 
        <?php }  ?>				
                </div>
            </div>
        </div>         
        </div>   
    </div>
                
   </table>
</div>
             <?php
                if (isset($sumatotalComercio) && isset($sumatotalDelivery)) {
                                    ?>

             <div class="card text-center bg-light mb-3 mx-auto" style="max-width: 18rem;">
                         <div class="card-header"><strong>Liquidación</strong></div>
                                   <div class="card-body">
                                      <p style="color: green;">Total a cobrar a los comercios:$ <?php echo  $sumatotalComercio ?></p>
                                      <p style="color: red;">Total a pagar a los deliverys: $ <?php echo $sumatotalDelivery ?></p>                                 
                                      </div>
                            </div>
                                <?php
                                }
                                  else {
                        echo '<div class="alert alert-success alert-dismissable">Seleccione un <b>Año</b> y un <b>Mes</b> para visualizar un informe mensual.</div>';
                    }
          ?>
                            
        <div id="chart_div_1"></div>                        
                        
        <script type="text/javascript"> 
        
            google.charts.load('current' , {
                packages:['corechart','bar']
            });

            google.charts.setOnLoadCallback(drawStacked);

            function drawStacked() {
                var data = google.visualization.arrayToDataTable(
                    <?php
                        echo json_encode($sumatotalComercio);    
                    ?>
                );

                var options = {
                    title : 'Informe mensual',
                    chartArea : {
                        width : '50%'
                    },
                    isStacked : true,
                    hAxis : {
                        title : 'Cantidad',
                        minValue : 0
                    },
                    vAxis : {
                        title : 'Estado'
                    }
                };

                var chart = new google.visualization.BarChart(document.getElementById('chart_div_1'));
                chart.draw(data , options);

            }

        </script>         
        </div>

</body>
</html>