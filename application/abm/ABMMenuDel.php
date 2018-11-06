<?php


require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;


$id = $_POST['idMenu'];


$conexion= new Conexion();


$query = "DELETE  FROM  menu  WHERE idMenu = ? ";
$statement = $conexion->prepare($query);
$statement->bind_param('i',$id);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;



if($resultado >0)

{
        header("Location: " .$CARGAR_MENU );
    }

  else{
        echo "Error al eliminar";
    }




