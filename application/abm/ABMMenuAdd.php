<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
 
 
$id;
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$archivo = $_POST['file'];
$idUsuario;
$email;
$nombre;
$direccion;
$numero;
 
$conexion= new Conexion();

$queryUsuario = "SELECT U.idUsuario , U.email , U.nombre , U.direccion , U.numero
                 FROM Usuario AS U
                 WHERE U.idUsuario = ?";
$statement = $conexion->prepare($queryUsuario);
$statement->bind_param('sssss',$idUsuario,$email,$nombre,$direccion,$numero);
$statement->execute();
$statement->close();
 

$idUsuario = $conexion->insert_id;
$query = "INSERT INTO Menu(id,titulo,descripcion,precio,archivo,idUsuario) VALUES (?,?,?,?,?,?)";
$statement = $conexion->prepare($query);
$statement->bind_param('sssssi',$id,$titulo,$descripcion,$precio,$archivo,$idUsuario);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;

if($_FILES["file"]["error"] > 0) {
    echo "Error : " . $_FILES["file"]["error"] . "<br>";
} else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
    if(file_exists("upload/" . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " ya existe. ";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]);
        echo "Almacenado en: " . "upload/" . $_FILES["file"]["name"];
    }
}
$statement->close();

if($resultado > 0) {

    echo 'Registro guardado';
} else {
    echo 'No se guardo';
}




 ?>