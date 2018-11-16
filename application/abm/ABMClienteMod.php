<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

$idUsuario = $_POST['idUsuario'];

$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$email = $_POST['email'];

$telefono=$_POST['telefono'];

$direccion = $_POST['direccion'];

$conexion= new Conexion();


$query = "UPDATE usuario SET idUsuario = ? , nombre = ? , apellido = ? , email = ? , direccion = ?, telefono = ? WHERE idUsuario=$idUsuario ";
$statement = $conexion->prepare($query);
$statement->bind_param('issssi',$idUsuario,$nombre,$apellido,$email,$direccion,$telefono);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;




if($resultado >0)

{
      header("Location: " . $PANEL_CLIENTE_HOST  );
    }

  else{
       echo "No se guardo";
    }




?>