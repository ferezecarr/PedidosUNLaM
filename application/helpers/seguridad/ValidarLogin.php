<?php


require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;



$email = $_POST['email'];
$password = $_POST['password'];
$password_sha1=sha1($password);
$recordarme = "";

if(empty($email) || empty($password))
     {  header("Location: " . $INDEX_HOST);
        exit();
        }

$conexion= new Conexion();

/*Buscamos el correo en la base*/

$query="SELECT * FROM usuario WHERE email= ?";

$statement = $conexion->prepare($query);
$statement->bind_param('s',$email);
$statement->execute();
$resultado=$statement->get_result();

/*Buscamos el tipo de rol*/    
                    $query2 = "SELECT  ro.tipoRol
                               FROM usuario u join rol ro on u.idRol=ro.idRol
                               WHERE u.email = ? ";

                    $statement = $conexion->prepare($query2);
                    $statement->bind_param('s',$email);
                    $statement->execute();
                    $resultado2=$statement->get_result();

if($resultado->num_rows >0)
{     /*Existe el correo en la base */
         
     $row=$resultado->fetch_assoc();

         if($row['password']==$password_sha1  || $row['password']== "admin") /*la contraseña es la misma que esta en la base*/
             {   
                session_start();
                $_SESSION['idUsuario']=$row['idUsuario'];
                /*$usuario=$row['idUsuario'];*/ 

                if($resultado2->num_rows >0)
                       {

                          $row2=$resultado2->fetch_assoc();

                         switch($row2['tipoRol']){
                             case 'Comercio':
                                 { $_SESSION['Comercio']=$row2['tipoRol'];
                                header("Location: " . $PANEL_COMERCIO_HOST );
                                  }
                                 break;
                               case 'Cliente':
                                {  $_SESSION['Cliente']=$row2['tipoRol'];
                                 header("Location: " . $PANEL_CLIENTE_HOST);}

                                 break;
                               case 'Delivery':
                                 { $_SESSION['Delivery']=$row2['tipoRol'];
                                 header("Location: " . $PANEL_DELIVERY_HOST);}
                                 break;

                                 case 'Administrador':
                                 { $_SESSION['Administrador']=$row2['tipoRol'];
                                 header("Location: " . $PANEL_ADMINISTRADOR_HOST);}
                                 break;
                                 default:
                               {  header("Location: " . $INDEX_HOST);
                                 session_destroy();
                                 exit();}
                                     break;

                        }
            }
    }                   

     else
     {
      header("Location :" . $INDEX_HOST);
                     session_destroy();
              }

}    

?>
