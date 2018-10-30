<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
 
 
$idUsuario;
$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$numero = $_POST['numero'];
$categoria = $_POST['categoria'];
$idRol;
$tipoRol;
 
$conexion= new Conexion();

$queryRol = "INSERT INTO Rol(idRol,tipoRol) VALUES (?,?)";
$statement = $conexion->prepare($queryRol);
$statement->bind_param('ss',$idRol,$tipoRol);
$statement->execute();
$statement->close();
 
$idRol = $conexion->insert_id;
$query = "INSERT INTO Usuario(idUsuario,email,password,nombre,apellido,direccion,numero,categoria,idRol) VALUES (?,?,?,?,?,?,?,?,?)";
$statement = $conexion->prepare($query);
$statement->bind_param('ssssssssi',$idUsuario,$email,$password,$nombre,$apellido,$direccion,$numero,$categoria,$idRol);
$statement->execute();
$resultado=$statement->get_result();
$statement->close();

if($resultado > 0) {

    echo 'Registro guardado';
} else {
    echo 'No se guardo';
}




 ?>