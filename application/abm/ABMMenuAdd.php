<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$idUsuario = $_POST['idUsuario'];


$query = "INSERT INTO Menu(titulo,descripcion,precio,idUsuario) VALUES (?,?,?,?)";
$statement = $conexion->prepare($query);
$statement->bind_param('ssss',$this->titulo,$this->descripcion,$this->precio,$this->idUsuario);
$statement->execute();
$statement->close();
$conexion->close();



if($resultado->num_rows >0)

{
     $row=$resultado->fetch_assoc();
     
    switch($row['tipoRol']){
        case 'Comercio':
            header("Location: " . $PANEL_COMERCIO_HOST );
            break;
        case 'Cliente':
            header("Location: " . $PANEL_CLIENTE_HOST);
            break;
        case 'Delivery':
            header("Location: " . $PANEL_DELIVERY_HOST);
            break;
        default:
            header("Location: " . $INDEX_HOST);
            session_destroy();
            exit();
                break;
    }
}
  else{
        header("Location :" . $INDEX_HOST);

        session_destroy();
    }



?>