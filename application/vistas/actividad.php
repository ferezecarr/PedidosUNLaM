<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    session_start();
    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Comercio'];

    $conexion= new Conexion();
    $query="SELECT * FROM comercio WHERE idUsuario=$idUsuario";
    $resultado = $conexion->query($query);
    $comercio=$resultado->fetch_assoc();
    $idComercio= $comercio['idComercio'];



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

        require_once $NAVBAR_1_DIR;

    ?>

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
                        WHERE   YEAR(liquidacion.fechaEntrega) = YEAR('$periodoLiquidacion') AND
                        MONTH(liquidacion.fechaEntrega) = MONTH('$periodoLiquidacion')
                        AND $idComercio = liquidacion.idComercio") 
                       
                        or die(mysqli_error($conexion));
                          if (mysqli_num_rows($queryLiquidacionExistente) == 0) {
                            echo '<div class="alert alert-warning alert-dismissable">Aviso: No existe una liquidación para el periodo seleccionado.</div>';
                        } else {
                            ?>

                            <label class=""><b>Ventas :</b></label>
                        </br>

                                  <?php
                        
                                $queryTotalventasPorComercio = mysqli_query($conexion,
                                "SELECT SUM(liquidacion.importe) as total
                                FROM liquidacion                          
                                WHERE MONTH(liquidacion.fechaEntrega) = MONTH('$periodoLiquidacion')
                                and liquidacion.idComercio = $idComercio 
                                ORDER BY liquidacion.idComercio") or die(mysqli_error($conexion));

                                
                                $totalPorComercio = (float) 0.0;
                                if ($queryTotalventasPorComercio) {
                                    $totalPorComercio = number_format((float)mysqli_fetch_assoc($queryTotalventasPorComercio)["total"], 2, '.', '');
                                }
                                echo "<strong>TOTAL:</strong> $ $totalPorComercio";
                            ?>
                            <br>
                             
                            
                                 <?php
                               $cantidadEntregas = mysqli_query($conexion,
                                "SELECT count(*) as cantidad
                                 FROM liquidacion

                                WHERE MONTH(liquidacion.fechaEntrega) = MONTH('$periodoLiquidacion')
                                and liquidacion.idComercio = $idComercio ")
                                 or die(mysqli_error($conexion));?>                               
                                <tbody>                    

                                <tr>         
                                 <?php $row = $cantidadEntregas->fetch_array(MYSQLI_ASSOC)?>

                                <div class="card text-center bg-light mb-3 mx-auto" style="max-width: 18rem;">
                                   <div class="card-header"><strong>Entregas</strong></div>
                                     <div class="card-body">
                                        <p style="color: green;">Cantidad :<?php echo  $row['cantidad'];?></p>                                
                                      </div>
                                </div>


                             <?php
                               $cantidadCancelados = mysqli_query($conexion,
                                "SELECT count(*) as cantidad
                                from pedidos join carrito on pedidos.idCarrito= carrito.idCarrito
                                join liquidacion on liquidacion.idComercio = carrito.idComercio
                                 where pedidos.entrega = 'Cancelado' and MONTH(liquidacion.fechaEntrega) = MONTH('$periodoLiquidacion')
                                 ")
                                 or die(mysqli_error($conexion));?>                               
                          <tbody>                    

                            <tr>         
                                 <?php while($row2 = $cantidadCancelados->fetch_array(MYSQLI_ASSOC)) { ?>

                                <div class="card text-center bg-light mb-3 mx-auto" style="max-width: 18rem;">
                                   <div class="card-header"><strong>Pedidos Cancelados</strong></div>
                                     <div class="card-body">
                                        <p style="color: red;">Cantidad :<?php echo  $row2['cantidad'];?></p>                                
                                      </div>
                                </div>
                             <?php }  ?> 


                             <?php
                             $totalDelivery = 0;
                               $queryDelivery = mysqli_query($conexion,
                                "SELECT (importe*0.03) as importeDelivery
                                 FROM liquidacion                          
                                 WHERE MONTH(liquidacion.fechaEntrega) = MONTH('$periodoLiquidacion')
                                 and liquidacion.idComercio=$idComercio
                                 ORDER BY liquidacion.fechaEntrega") or die(mysqli_error($conexion));?>                              
                          <tbody>                    

                            <tr>         
                                 <?php while($row3 = $queryDelivery->fetch_array(MYSQLI_ASSOC)) { ?>
                                     <?php  $totalDelivery= $totalDelivery +  $row3['importeDelivery'];?>
                                      <?php }  ?>

                                <div class="card text-center bg-light mb-3 mx-auto" style="max-width: 18rem;">
                                   <div class="card-header"><strong>Cantidad a pagar a los deliverys</strong></div>
                                     <div class="card-body">
                                        <p style="color: red;">Cantidad :<?php echo  $totalDelivery;?></p>                                
                                      </div>
                                </div>

                         </tr>
                     </tbody>
                 </div>

 <?php }  ?> 
 <?php }  ?> 


                            
      <!--  <div id="chart_div_1"> 
         <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
      </div>                     
                        
        <script type="text/javascript"> 
        
            google.charts.load('current' , {
                packages:['corechart','bar']
            });

        

         function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Browser');
            data.addColumn('number', 'Percentage');
            data.addRows([
               ['Suma total comercios', <?php echo $totalPorComercio?>],
               ['Total cobrar por comercios', <?php echo $sumatotalComercio?>],
               ['Total a pagar a deliverys', <?php echo $sumatotalDelivery ?>]
            ]);
               
            // Set chart options
            var options = {'title':'Grafica de ventas ', 'width':550, 'height':400};

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById ('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
        </div>-->
</tbody>
</table>
</div>

</body>
</html>