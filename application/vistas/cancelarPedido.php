<?php 
   require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
   require_once $CONEXION_DIR;

   $conexion= new Conexion();

   $idUsuario=$_POST['idUsuario'];
   $idPedido =$_POST['idPedido'];

//cambia en la tabla pedidos el estado de la entrega 

       $updatePedidos = mysqli_query($conexion, "UPDATE pedidos 
       	SET entrega='Cancelado' 
       	WHERE idPedido= '$idPedido'") or die(mysqli_error($conexion));

        
print "<script>window.location='misPedidos.php';</script>";
?>