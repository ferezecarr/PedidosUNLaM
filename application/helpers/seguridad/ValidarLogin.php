<?php

/*require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$email = $_POST['email'];
$password = $_POST['password'];
//$recordarme = "";

$conexion = new Conexion();

$query = "SELECT Login.email , Login.password , Rol.tipoRol , Usuario.nombre, Usuario.numero , Usuario.direccion
          FROM Login INNER JOIN Usuario ON Login.idUsuario = Usuario.idUsuario
          INNER JOIN Rol ON Usuario.idRol = Rol.idRol
          WHERE Login.email = ? AND Login.password = ?";

$statement = $conexion->prepare($query);
$statement->bind_param('ss',$email,$password);
$statement->execute();
$resultado = $statement->get_result();
$row = mysqli_num_rows($resultado);
//$row = mysql_affected_rows($resultado);


if(isset($_COOKIE['recordarme2'])){
    $recordarme = $_COOKIE['recordarme2'];
} if(isset($_POST['recordarme'])){
    $recordarme = $_POST['recordarme'];
    setcookie('recordarme2',$recordarme,0,'/');
}

echo $resultado->num_rows;
exit;

if($resultado->num_rows > 0){

   
    
    $id = $row;
    $rol = $row[];
    echo var_dump($rol);
    exit();
    $nombre = $row;

    $_SESSION['id'] = $id;
	$_SESSION['rol'] = $rol;
	$_SESSION['nombre'] = $nombre;
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
}*/



require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;



$email = $_POST['email'];
$password = $_POST['password'];
$recordarme = "";

$conexion= new Conexion();

$query = "SELECT  u.idUsuario,ro.tipoRol
          FROM login lo join usuario u on u.idUsuario=lo.idUsuario 
          join rol ro on u.idRol = ro.idRol
          WHERE lo.email = ? AND lo.password = ? LIMIT 1";



$statement = $conexion->prepare($query);
$statement->bind_param('ss',$email,$password);
$statement->execute();
$resultado=$statement->get_result();


if($resultado->num_rows >0)

{
     $row=$resultado->fetch_assoc();
     
    switch($row['tipoRol']){
        case 'Comercio':
            header("Location: " . $PANEL_COMERCIO_HOST );
            break;
        case 'Cliente':
            header("Location: " . $PANEL_CLIENTE_HOST);
            break;
        case 'Delivery':
            header("Location: " . $PANEL_DELIVERY_HOST);
            break;
        default:
            header("Location: " . $INDEX_HOST);
            session_destroy();
            exit();
                break;
    }
}
  else{
        header("Location :" . $INDEX_HOST);

        session_destroy();
    }


?>

