<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
 
 
//$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
//$idUsuario = $_POST['idUsuario'];
 
$conexion= new Conexion();
 
$query = "INSERT INTO Menu(titulo,descripcion,precio) VALUES (?,?,?,?,2)";
$statement = $conexion->prepare($query);
$statement->bind_param('ssss',$titulo,$descripcion,$precio,$idUsuario);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;

if($resultado > 0) {

    echo 'Registro guardado';
} else {
    echo 'No se guardo';
}




 ?>