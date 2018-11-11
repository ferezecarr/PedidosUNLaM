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

$mediosPago = "un valor";// isset($_POST['mediopago']) ? $_POST['mediopago'] : null;


/*$arraymedioPago= null;
$num_array = count($medioPago);
$contador =0;

if($num_array >0){
	foreach ($medioPago as $key => $value) {
		if($contador != $num_array-1)
			$arraymedioPago .=$value.' ';
		else
			$arraymedioPago .=$value;
		  $contador++;
	}*/

 $conexion= new Conexion();



$query = "INSERT INTO comercio (nombre,direccion,mediosPago,horario1,horario2,horario3,activo,idUsuario) VALUES (?,?,?,?,?,?,?,?)";
$statement =$conexion->prepare($query);

$statement->bind_param('ssssssii',$nombre,$direccion,$mediosPago,$horario1,$horario2,$horario3,$activo,$idUsuario);

$statement->execute();
            $resultado= $statement->get_result();
            $resultado = $statement->affected_rows;

$statement->close();


if($resultado > 0) {

         echo 'Registro guardado';
        //header("Location: " .$CARGAR_MENU );
     }
      else{ 
          echo 'No se guardo';
         }




 ?>