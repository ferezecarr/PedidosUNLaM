<?php 
   require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
   require_once $CONEXION_DIR;


   $conexion= new Conexion();

   $idUsuario = $_POST['idUsuario'];
   $idPedido  = $_POST['idPedido'];
   $idComercio= $_POST['idComercio'];
   $importe   = $_POST['importePedido'];
   $entrega   = $_POST['entrega'];


//cambia en la tabla pedidos el estado de la entrega a entregado y guarda los datos en tabla liquidacion
    

    if($entrega != 'Entregado'){

       $updatePedidos = mysqli_query($conexion, "UPDATE pedidos 
       	SET entrega='Entregado',idDelivery = '$idUsuario' ,fechaEntrega = CURDATE(),horaEntrega = CURTIME()
       	WHERE idPedido= '$idPedido'") or die(mysqli_error($conexion));


       $liquidacion = mysqli_query($conexion, "INSERT into liquidacion
       	(idComercio,idDelivery,fechaEntrega,horaEntrega,importe) 
       	values ('$idComercio','$idUsuario',CURDATE(),CURTIME(),'$importe')")
        or die(mysqli_error($conexion));
   }
   else
   {
   	print "<script>window.location='pedidosRealizados.php';</script>";
   }

        
print "<script>window.location='pedidosRealizados.php';</script>";
?>