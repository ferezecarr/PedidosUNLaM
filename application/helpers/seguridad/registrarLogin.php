<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$idUsuario;
$idRol;
$idLogin;
$email = $_POST['email'];
$nombre = $_POST['nombre'];
//$direccion = $_POST['direccion'];
//$numero = $_POST['numero'];
//$tipoRol = $_POST['tipoRol'];
$categoria = $_POST['categoria'];

$recordarme = "";

if($categoria == 'Cliente'){
    $idRol = 1;
} if($categoria == 'Comercio') {
    $idRol = 2;
} if($categoria == 'Delivery') {
    $idRol = 3;
} if($categoria == 'Administrador') {
    $idRol = 4;
}

$conexion = new Conexion();

if ($conexion->connect_error){
    die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}

$query = "INSERT INTO Usuario(idUsuario,email,nombre,direccion,numero,idRol)
          VALUES(?,?,?,?,?,?)";



$statement = $conexion->prepare($query);
$statement->bind_param('sssssi',$idUsuario,$email,$nombre,$direccion,$numero,$idRol);
$statement->execute();
$statement->close();


$idUsuario = $conexion->insert_id;
$query_login = "INSERT INTO Login(idLogin,email, password, idUsuario) VALUES (?,?, ?, ?)";
$statement = $conexion->prepare($query_login);
$statement->bind_param('sssi',$idLogin, $email, $password, $idUsuario);
$statement->execute();
$statement->close(); 


?>