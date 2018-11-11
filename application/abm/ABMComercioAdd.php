<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
 
 
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$horario1 = $_POST['horario1'];
$horario2 = $_POST['horario2'];
$horario3 = $_POST['horario3'];
$idUsuario= $_POST['idUsuario'];

$activo = 0; 

<<<<<<< HEAD
$mediosPago =isset($_POST['mediopago']) ? $_POST['mediopago'] : null;


$arraymedioPago= null;
$num_array = count($mediosPago);
$contador =0;

if($num_array >0){
	foreach ($mediosPago as $key => $value) {
=======
$mediosPago = "un valor";// isset($_POST['mediopago']) ? $_POST['mediopago'] : null;


/*$arraymedioPago= null;
$num_array = count($medioPago);
$contador =0;

if($num_array >0){
	foreach ($medioPago as $key => $value) {
>>>>>>> e3f10033323c91ad4f3c762c91cfe55965f79224
		if($contador != $num_array-1)
			$arraymedioPago .=$value.' ';
		else
			$arraymedioPago .=$value;
		  $contador++;
<<<<<<< HEAD
	}
}	
=======
	}*/
>>>>>>> e3f10033323c91ad4f3c762c91cfe55965f79224

 $conexion= new Conexion();



$query = "INSERT INTO comercio (nombre,direccion,mediosPago,horario1,horario2,horario3,activo,idUsuario) VALUES (?,?,?,?,?,?,?,?)";
$statement =$conexion->prepare($query);

<<<<<<< HEAD
$statement->bind_param('ssssssii',$nombre,$direccion,$arraymedioPago,$horario1,$horario2,$horario3,$activo,$idUsuario);
=======
$statement->bind_param('ssssssii',$nombre,$direccion,$mediosPago,$horario1,$horario2,$horario3,$activo,$idUsuario);
>>>>>>> e3f10033323c91ad4f3c762c91cfe55965f79224

$statement->execute();
            $resultado= $statement->get_result();
            $resultado = $statement->affected_rows;

$statement->close();


if($resultado > 0) {

         echo 'Registro guardado';
<<<<<<< HEAD
        header("Location: " .$PANEL_COMERCIO_HOST );
=======
        //header("Location: " .$CARGAR_MENU );
>>>>>>> e3f10033323c91ad4f3c762c91cfe55965f79224
     }
      else{ 
          echo 'No se guardo';
         }




 ?>