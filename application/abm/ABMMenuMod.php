<?php


require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

$id = $_POST['idMenu'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$idUsuario=$_POST['idUsuario'];

$conexion= new Conexion();

$query = "UPDATE menu SET idMenu = ? , titulo = ? , descripcion = ? , precio = ? , idUsuario = ? WHERE idMenu=$id ";
$statement = $conexion->prepare($query);
$statement->bind_param('isssi',$id,$titulo,$descripcion,$precio,$idUsuario);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;


if($resultado >0)

{
      header("Location: " .$MODIFICAR_MENU_HOST  );
    }

  else{
       header("Location: " .$CARGAR_MENU );
    }







 

  


?>