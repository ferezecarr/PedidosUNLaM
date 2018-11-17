<?php 
 require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
    require_once $CONEXION_DIR;

 $conexion= new Conexion();
session_start();
/*GUARDA EN TABLAS LOS RESULTADOS DE LA COMPRA DEL CARRITO*/
echo "Hola";

/*if(!empty($_POST)){

$q1 = $con->query("insert into cart(client_email,created_at) value(\"$_POST[email]\",NOW())");
if($q1){

$cart_id = $con->insert_id;

foreach($_SESSION["carrito"] as $c){

$q1 = $con->query("insert into cart_product(product_id,q,cart_id) value($c[product_id],$c[q],$cart_id)");
}
unset($_SESSION["carrito"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='carritoProductos.php';</script>";*/
?>