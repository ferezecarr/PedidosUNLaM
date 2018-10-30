<?php

    require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

    $conexion= new Conexion();


    $where = "";
    
    if(!empty($_POST))
    {
        $valor = $_POST['campo'];
        if(!empty($valor)){
            $where = "WHERE idMenu LIKE '%$valor'";
        }
    }
    $sql = "SELECT * FROM menu $where";
    $resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php

        require_once $HEADER_DIR;

    ?>
        <script src="application/vistas/js/jquery-3.1.1.min.js"></script>
        <script src="application/vistas/js/bootstrap.min.js"></script> 
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
    


    <div class="container-fluid">
        <div class="card" style="">
            
            <div class="row">
                <a href="<?php echo $ABM_MENU_HOST_ADD; ?>" class="btn btn-success">Nuevo Registro</a>
                
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <b>IdMenu: </b><input type="text" id="campo" name="campo" />
                    <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-success" />
                </form>
            </div>
            
            <br>
            
            <div class="row table-responsive">
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
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $row['idMenu']; ?></td>
                                <td><?php echo $row['titulo']; ?></td>
                                <td><?php echo $row['precio']; ?></td>
                                <td><button class="btn btn-success" >
                                    <a href="modificar.php?id=<?php echo $row['idMenu']; ?>"></a>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger"
                                    <a href="#" data-href="eliminar.php?id=<?php echo $row['idMenu']; ?>" data-toggle="modal" data-target="#confirm-delete"></a>
                                </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                
                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });
        </script>   
        
</body>
</html>