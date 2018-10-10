<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$contrasenia = $_POST['password'];
$repetirContrasenia = $_POST['password-confirm'];
$categoria = $_POST['categoria'];

$conexion = new conexion;
//Si la misma tiene un problema se muestra un mensaje por pantalla
if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}
//Se realiza la consulta a la bd
$query = "INSERT INTO empleado (nombre, apellido, email, contrasenia, repetirContrasenia, categoria) VALUES ( ?, ?, ?, ?, ?, ?)";


?>