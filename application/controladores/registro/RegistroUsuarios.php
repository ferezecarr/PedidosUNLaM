<?php

class RegistroUsuarios {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;

    public function __construct($id,$nombre,$apellido,$email,$password,$rol){
        $id->id = $id;
        $nombre->nombre = $nombre;
        $apellido->apellido = $apellido;
        $email->email = $email;
        $password->password = $password;
        $rol->rol = $rol;
    }

    public function registrar(){
        
    }



}




?>