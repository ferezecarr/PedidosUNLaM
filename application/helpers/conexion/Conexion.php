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
        
    }

?>