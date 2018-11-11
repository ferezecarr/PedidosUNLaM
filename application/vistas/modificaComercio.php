<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;


    session_start();
    /*if(!isset($_SESSION['Comercio']))/*verificar que es comercio*/
        /*{ header("Location :" . $INDEX_HOST);}*/

    $idUsuario=$_SESSION['idUsuario'];
    $tipoRol  = $_SESSION['Comercio'];

    $conexion= new Conexion();
    $query="SELECT * FROM comercio WHERE idUsuario=$idUsuario";
    $resultado = $conexion->query($query);
    $row=$resultado->fetch_assoc();



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
                    <li class="breadcrumb-item active" aria-current="page"><a href="comercio.php">Mi Perfil</a></li>
                </ol>
            </nav>

            <div class="card" style="">
                <div class="card-header">
                  Mi Perfil  :
                   <?php echo $tipoRol; ?>
                </div>
                <div class="card-body" style="">
                    <form action="<?php echo  $ABM_COMERCIO_MOD ;?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $row['nombre'];?>">
                            </div>
                        <div>
                             <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario?>">
                              <input type="hidden" name="idComercio" value="<?php echo $row['idComercio'];?>">
                              <input type="hidden" name="activo" value="<?php echo $row['activo'];?>">
                        </div>
                        <div class="form-group">
                            <label for="medios-de-pagos">Medios de Pagos:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mediopago[]" id="defaultCheck1" value="Debito Credito VISA/Mastercard" 
                                <?php if(strpos($row['mediosPago'],"Debito Credito VISA/Mastercard")!== false) echo 'checked';?>>
                                <label class="form-check-label" for="defaultCheck1" >
                                    Débito Crédito VISA/Mastercard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mediopago[]" id="defaultCheck1" value="Efectivo"   
                                <?php if(strpos($row['mediosPago'],"Efectivo")!== false) echo 'checked';?>>
                                <label class="form-check-label" for="defaultCheck1">
                                 Efectivo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mediopago[]" id="defaultCheck1"  value="Mercado Pago"
                                  <?php if(strpos($row['mediosPago'],"Mercado Pago")!== false) echo 'checked';?>>
                                <label class="form-check-label" for="defaultCheck1" >
                                Mercado Pago
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $row['direccion'];?>">
                        </div>
                        <div class="form-group">
                            <label for="horarios-de-atencion">Horarios de Atención:</label>
                            <div class="list-group">
                                <input type="text"  class="list-group-item list-group-item-action list-group-item-success" name="horario1" value="<?php echo $row['horario1'];?>">
                                <input type="text"  class="list-group-item list-group-item-action list-group-item-success" name="horario2" value="<?php echo $row['horario2'];?>">
                                <input type="text" class="list-group-item list-group-item-action list-group-item-success" name="horario3" value="<?php echo $row['horario3'];?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Modificar</button>
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
</body>
</html>