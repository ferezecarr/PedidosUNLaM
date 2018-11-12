<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

$idComercio=$_POST['idComercio'];

$activo = 1;


 $conexion= new Conexion();


 $query = "UPDATE comercio SET activo = $activo WHERE idComercio=$idComercio ";

$statement =$conexion->prepare($query);

$statement->execute();
            $resultado= $statement->get_result();
            $resultado = $statement->affected_rows;


$statement->close();


if($resultado > 0) {

         echo 'Registro guardado';
        header("Location: " .$PANEL_ADMINISTRADOR_HOST);
     }
      else{ 
          echo 'No se guardo';
         }


?>