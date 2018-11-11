<?php 
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;


$idComercio = $_POST['idComercio'];


$conexion= new Conexion();


$query = "DELETE  FROM  comercio  WHERE idComercio = ? ";
$statement = $conexion->prepare($query);
$statement->bind_param('i',$idComercio);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;



if($resultado >0)

{
        header("Location: " . $PANEL_ADMINISTRADOR_HOST );
    }

  else{
        echo "Error al eliminar";
    }

