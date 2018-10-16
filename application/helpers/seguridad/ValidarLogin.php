<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$email = $_POST['email'];
$password = $_POST['password'];
//$recordarme = "";

$conexion = new Conexion();

$query = "SELECT LO.email, LO.password, ROL.descripcion, U.nombre, U.telefono, U.direccion, U.edad 
          FROM login AS LO INNER JOIN usuario AS U ON LO.idUsuario = U.idUsuario  
          INNER JOIN rol AS ROL ON U.idRol = ROL.idRol 
          WHERE LO.email = ? AND LO.password = ? ";



$statement = $conexion->prepare($query);
$statement->bind_param('ss',$email,$password);
$statement->execute();
$resultado = $statement->get_result();
$row = mysql_affected_rows($resultado);

var_dump($row);

/*if(isset($_COOKIE['recordarme2'])){
    $recordarme = $_COOKIE['recordarme2'];
} if(isset($_POST['recordarme'])){
    $recordarme = $_POST['recordarme'];
    setcookie('recordarme2',$recordarme,0,'/');
}*/

if($resultado->num_rows > 0){

    $id = $row[6];
    $rol = $row[2];
    $email = $row[3];
    $descripcion = $row[4];
    $nombre = $row[5];
    $telefono = $row[7];
    $direccion = $row[8];
    $edad = $row[9];

    $_SESSION['id'] = $id;
	$_SESSION['email'] = $email;
	$_SESSION['rol'] = $rol;
	$_SESSION['nombre'] = $nombre;
    $_SESSION['descripcion'] = $descripcion;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;
    $_SESSION['edad'] = $edad;
	$_SESSION["autentic"] = true;

     
    switch($rol){
        case 'comercio':
            header("Location: " . $PANEL_COMERCIO_HOST );
            break;
        case 'cliente':
            header("Location: " . $PANEL_CLIENTE_HOST);
            break;
        case 'delivery':
            header("Location: " . $PANEL_DELIVERY_HOST);
            break;
        default:
            header("Location: " . $INDEX_HOST);
            session_destroy();
            exit();
                break;
    }
} else {
    header("Location: " . $INDEX_HOST);
    session_destroy();
}


?>