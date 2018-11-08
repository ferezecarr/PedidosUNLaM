<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
 
 
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$idUsuario=3;
 
$conexion= new Conexion();
/*
$queryUsuario = "SELECT U.idUsuario , U.email , U.nombre , U.direccion , U.numero
                 FROM Usuario AS U
                 WHERE U.idUsuario = ?";
$statement = $conexion->prepare($queryUsuario);
$statement->bind_param('sssss',$idUsuario,$email,$nombre,$direccion,$numero);
$statement->execute();
$statement->close();*/

$permitidos= array("image/jpg","image/jpeg","image/gif","image/png" );/*tipo de imagenes permitidas*/
$limite_kb=200;/*limite de tamaño que podemos subir al servidor*/

if($_FILES["imagen"]["error"] > 0) {
    echo "Error : " . $_FILES["file"]["error"] . "<br>";
    }
    else{

         if(file_exists("../imagenes/".$_FILES["imagen"]["name"]))
            {    echo "el archivo ya existe";
               }
              else
              {
                     if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size']<= $limite_kb*1024) 
                       {

                           $ruta="../imagenes/".$_FILES["imagen"]["name"];/*ruta en donde se va a guardar la imagen*/
                            move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);/*movemos la imagen del archivo temporal a la ruta especificada*/
                            $archivo=$_FILES["imagen"]["name"];/*lo que se guarda en la base de datos*/
                        }
                        else
                        {
                            echo "archivo no permitido";
                        }
                }
        }        


$query = "INSERT INTO menu(titulo,descripcion,precio,archivo,idUsuario) VALUES (?,?,?,?,?)";
$statement = $conexion->prepare($query);
$statement->bind_param('ssssi',$titulo,$descripcion,$precio,$archivo,$idUsuario);
$statement->execute();
$resultado=$statement->get_result();
$resultado = $statement->affected_rows;


$statement->close();

if($resultado > 0) {

    echo 'Registro guardado';
    header("Location: " .$CARGAR_MENU );
} else {
    echo 'No se guardo';
}




 ?>