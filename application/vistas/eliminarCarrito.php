<?php
/*
* Eliminar un producto del carrito
*/
session_start();

if(!empty($_SESSION["carrito"])){

	$carrito  = $_SESSION["carrito"];
	if(count($carrito)==1){ unset($_SESSION["carrito"]); }
	else{
		$newcart = array();
		foreach($carrito as $c){
			if($c["idMenu"]!=$_GET["idMenu"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["carrito"] = $newcart;
	}
}
print "<script>window.location='carrito.php';</script>";

?>

