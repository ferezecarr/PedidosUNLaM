<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";

require_once $CONFIG_DIR;

	class Conexion extends mysqli{
		public function __construct(){
			parent::__construct(Config::$host , Config::$user , Config::$pass , Config::$db);
			if($this->connect_errno){
				die('Error en la conexion a la base de datos');
			}
			
		}
		
		public function validarCampo($tabla , $columna , $valor){
			$query = "SELECT * FROM '$tabla' WHERE '$columna' = '$valor'";
			$sql = $this->query($query);
			$filas = $sql->num_rows();
			return $filas;
		}
		
		public function getUsuario($tabla , $columna , $valor){
			$query = "SELECT 'usuario' FROM '$tabla' WHERE '$columna' = '$valor'";
			$sql = $this->query(query);
			$usuario = $sql->fetch_assoc()["usuario"];
			return $usuario;
		}
        
    }

?>