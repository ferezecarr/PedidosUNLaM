<?php


require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

//$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
//$idUsuario = $_POST['idUsuario'];

$conexion= new Conexion();


$query = "UPDATE FROM Menu WHERE ";
$statement = $conexion->prepare($query);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;



if($resultado >0)

{
     echo "Registro guardado";
    }

  else{
        echo "Error al guardar";
    }







 

  


?>