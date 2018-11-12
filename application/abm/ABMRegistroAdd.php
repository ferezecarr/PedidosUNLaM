<?php

require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;


	
if(!empty($_POST))
{

$email    = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$nombre   = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono   = $_POST['telefono'];
$idRol    = $_POST['categoria'];

    switch ($idRol) {
    	case 1:
    		$categoria="Cliente";
    		break;
    	case 2:
    		$categoria="Comercio";
    		break;
    	case 3:
    		$categoria="Delivery";
    		break;
    	case 4:
    		$categoria="Administrador";
    		break;
    }

   
        $errors = array();


        if(strlen(trim($nombre)) < 1 || strlen(trim($apellido)) < 1 || strlen(trim($password)) < 1 || strlen(trim($password_confirm)) < 1 || strlen(trim($email)) < 1)
            {
             $errors[] = "Debe llenar todos los campos";   
            }
    

       /* if (filter_var($email, FILTER_VALIDATE_EMAIL))
       {
           
            $errors[] = "Dirección de correo inválida";

            }*/
    
    
        if (strcmp($password, $password_confirm) !== 0){
            
            $errors[] = "Las contraseñas no coinciden";
        }
    
    
  
     /*Buscar si el email existe en la base*/
       $conexion= new Conexion();
        
        $stmt = $conexion->prepare("SELECT idUsuario FROM usuario WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $num = $stmt->num_rows;
        $stmt->close();
        
        if ($num > 0){
              $errors[] = "El correo electronico $email ya existe";
        }
    

		if(count($errors) == 0)/*si no encontro errores encriptamos el password y guardamos los datos en la base*/
		{
			$password_sha1=sha1($password);
 
             $conexion= new Conexion();
 
            $query = "INSERT INTO usuario(nombre,apellido,email,password,direccion,telefono,categoria,idRol) VALUES (?,?,?,?,?,?,?,?)";
            $statement = $conexion->prepare($query);
            $statement->bind_param('sssssssi',$nombre,$apellido,$email,$password_sha1,$direccion,$telefono,$categoria,$idRol);
            $statement->execute();
            $resultado=$statement->get_result();
            $resultado = $statement->affected_rows;
            $statement->close();

                if($resultado > 0) {

                
                     echo 'Registro guardado';

                     } else {
                         echo "<script>
                            alert('Error al guardar');
                         </script>";
                    echo 'No se guardo';}
           
         }          
        
     }   

 ?>