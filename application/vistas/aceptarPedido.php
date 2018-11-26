<?php 
   require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
   require_once $CONEXION_DIR;

   $conexion= new Conexion();

   $idUsuario=$_POST['idUsuario'];
   $idPedido =$_POST['idPedido'];

//cambia en la tabla pedidos el estado de la entrega y guarda el delivery que lo acepta

       $updatePedidos = mysqli_query($conexion, "UPDATE pedidos 
       	SET entrega='En viaje',idDelivery = '$idUsuario' 
       	WHERE idPedido= '$idPedido'") or die(mysqli_error($conexion));

        
print "<script>window.location='pedidosDisponibles.php';</script>";
?>