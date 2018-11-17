<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();

if(!empty($_POST)){
	if(isset($_POST["idMenu"]) && isset($_POST["q"])){
		// si es el primer producto simplemente lo agregamos

		if(empty($_SESSION["carrito"])){
			$_SESSION["carrito"]=array( array("idMenu"=>$_POST["idMenu"],"q"=> $_POST["q"]));
		}else{
			// apartie del segundo producto:
			$carrito = $_SESSION["carrito"];
			$repetido = false;

			// recorremos el carrito en busqueda de producto repetido

			foreach ($carrito as $c) {
				// si el producto esta repetido rompemos el ciclo

				if($c["idMenu"]==$_POST["idMenu"]){
					$repetido=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos

			if($repetido){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable carrito y despues asignamos la variable carrito a la variable de sesion

				array_push($carrito, array("idMenu"=>$_POST["idMenu"],"q"=> $_POST["q"]));
				$_SESSION["carrito"] = $carrito;
			}
		}
		print "<script>window.location='carritoProductos.php';</script>";
	}
}

?>

