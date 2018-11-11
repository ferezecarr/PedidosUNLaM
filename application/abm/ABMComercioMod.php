<?php 
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
 
$idComercio=$_POST['idComercio'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$horario1 = $_POST['horario1'];
$horario2 = $_POST['horario2'];
$horario3 = $_POST['horario3'];
$idUsuario= $_POST['idUsuario'];

$activo = $_POST['activo']; 

$mediosPago =isset($_POST['mediopago']) ? $_POST['mediopago'] : null;


$arraymedioPago= null;
$num_array = count($mediosPago);
$contador =0;

if($num_array >0){
	foreach ($mediosPago as $key => $value) {
		if($contador != $num_array-1)
			$arraymedioPago .=$value.' ';
		else
			$arraymedioPago .=$value;
		  $contador++;
	}
}	

 $conexion= new Conexion();


 $query = "UPDATE comercio SET idComercio = ? , nombre = ? ,direccion = ? ,mediosPago = ? , horario1 = ? , horario2 = ?,horario3 = ?, activo = ?, idUsuario = ? WHERE idComercio=$idComercio ";

$statement =$conexion->prepare($query);

$statement->bind_param('issssssii',$idComercio,$nombre,$direccion,$arraymedioPago,$horario1,$horario2,$horario3,$activo,$idUsuario);

$statement->execute();
            $resultado= $statement->get_result();
            $resultado = $statement->affected_rows;

$statement->close();


if($resultado > 0) {

         echo 'Registro guardado';
        header("Location: " .$PANEL_COMERCIO_HOST );
     }
      else{ 
          echo 'No se guardo';
         }




 ?>