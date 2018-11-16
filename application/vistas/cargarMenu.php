<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();
    session_start();

    $idUsuario=$_SESSION['idUsuario'];


    $conexion= new Conexion();
    $query="SELECT * FROM comercio WHERE idUsuario=$idUsuario";
    $resultado2 = $conexion->query($query);
    $row2=$resultado2->fetch_assoc();
    $idComercio= $row2['idComercio'];


/*$valor= "";
    
    if(!empty($_POST))
    {
        $valor = $_POST['campo'];
        if(!empty($valor)){
            $valor;
        }
    }*/
    $sql = "SELECT * FROM menu WHERE  idComercio = $idComercio ";
    $resultado = $conexion->query($sql);

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
                    <li class="breadcrumb-item active" aria-current="page"><a href="cargarMenu.php">Cargar Menú</a></li>
                </ol>
            </nav>    
        <div class="card" style="">
            <div class="card-header">
                Cargar Menu <h5> <?php echo $row2['nombre']; ?></h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                     <form action="<?php echo $AGREGAR_MENU_HOST; ?>" method="post">
                                   <input type="hidden" name="idUsuario"  value="<?php echo $idUsuario?>">
                                   <input type="hidden" name="idComercio"  value="<?php echo $row2['idComercio'];?>">
                                   <input type="submit" name="" class="btn btn-success btn-lg btn-block" value="Agregar Menu">
                                   </form>
                    <!--<a href="<?php /*echo*/ $AGREGAR_MENU_HOST; ?>" class="btn btn-success btn-lg btn-block">Agregar Menu</a>-->
                </div>
               <!-- <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="idMenu">IdMenu:</label>
                        <input type="text" id="campo" name="campo" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" id="enviar" name="enviar" class="btn btn-success btn-lg btn-block">Buscar</button>    
                </form>
            </div>-->

            <div class="card-header">
                Tabla de Menús
            </div> 
            
            <br>
            <div class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Precio</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                          <form action="<?php echo $MODIFICAR_MENU_HOST;?>" method="post">
                            <tr>
                                <td><?php echo $row['idMenu']; ?></td>
                                <td><?php echo $row['titulo']; ?></td>
                                <td><?php echo $row['precio']; ?></td>

             
                                    <td>
                                        <input type="hidden" name="idMenu"  value="<?php echo $row['idMenu'];?>">
                                         <input type="hidden" name="idComercio"  value="<?php echo $row2['idComercio'];?>">

                                        <input type="submit" name="" class="btn btn-success btn-mg btn-block" value="Modificar">
                                    </td>
                                </form>
                                <td>
                                   <form action="<?php echo $ABM_MENU_HOST_DEL; ?>" method="post">
                                   <input type="hidden" name="idMenu"  value="<?php echo $row['idMenu'];?>">
                                   <input type="submit" name="" class="btn btn-danger btn-mg btn-block"
                                    value="Eliminar"  data-toggle="modal" data-target="#confirm-delete">
                                   </form>
                                </td>
                            </tr>
                            <?php ;}?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                    </div>
                    
                    <div class="modal-body">
                        ¿Desea eliminar este registro?
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
     </div>
        <script>
         $(document).ready(function()
    {
    $('#confirm-delete').on('show.bs.modal',function(){
            $('.btn-ok').click(function(){
            console.log("Llamamos a la función de eliminación");
        });
    });
            
        $('#go').click(function()
        {
            $('#confirm-delete').modal('show');
           
        })
    });
        </script>   
        
</body>
</html>