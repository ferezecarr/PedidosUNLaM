<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;

class ControladorLogin {

  private $email;
  private $password;
  private $categoria;

  public function __construct($email , $password , $categoria)
  {
    this->$email = email;
    this->$password = password;
    this->$categoria = categoria;
  }

  public function listarUsuarios(){
    $mysqli = new Conexion();
    $consulta = "SELECT * FROM usuario";
    $resultado = $mysqli->query($consulta);
    $filas = $resultado->num_rows();

    if(isset($_POST["email"])) {
      
    }
  }

  public function registrarUsuario(){
    $mysqli = new Conexion();
    
  }

}


?>