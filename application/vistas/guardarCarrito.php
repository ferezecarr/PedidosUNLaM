<?php 
 require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

 $conexion= new Conexion();
session_start();
/*GUARDA EN TABLAS LOS RESULTADOS DE LA COMPRA DEL CARRITO*/


if(!empty($_POST)){

$q1 = $conexion->query("insert into carrito(email,fecha,hora,totalCompra,estado) value(\"$_POST[email]\",CURDATE(),CURTIME(),\"$_POST[sumatotal]\",'impago')");

if($q1){

$idCarrito = $conexion->insert_id;

foreach($_SESSION["carrito"] as $c){

$q1 = $conexion->query("insert into pedido(idMenu,cantidad,idCarrito) value($c[idMenu],$c[q],$idCarrito)");
}
unset($_SESSION["carrito"]);
}
}
print "<script>window.location='pagarCarrito.php?idCarrito=$idCarrito';</script>";
?>