<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

$id = $_POST['id'];
$tipoMenu = $_POST['tipoMenu'];
$idPrecio = $_POST['idPrecio'];
$idProducto = $_POST['idProducto'];
$idUsuario = $_POST['idUsuario'];


$query = "INSERT INTO Menu(id,tipoMenu,idPrecio,idProducto,idUsuario) VALUES (?,?,?,?,?)";
$statement = $conexion->prepare($query);
$statement->bind_param('sssss',$this->id,$this->tipoMenu,$this->idPrecio,$this->idProducto,$this->idUsuario);
$statement->execute();
$statement->close();
$conexion->close();






?>