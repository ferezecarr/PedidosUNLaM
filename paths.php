<?php

// RUTAS DESDE DISCO C PARA LA PROGRAMACION PHP

	// EL INDEX DEL PROYECTO
    $INDEX_DIR = $_SERVER["DOCUMENT_ROOT"] . "index.php";

    // CONEXION A LA DB
    $CONEXION_DIR  = $_SERVER["DOCUMENT_ROOT"] .  "/application/helpers/conexion/Conexion.php";

    //TODAS LAS RUTAS DE LA CARPETA INC DENTRO DE HELPERS
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/inc/";
    $HEADER_DIR = $INC_DIR . "header.php";
    $NAVBAR_DIR = $INC_DIR . "navbar.php";
    $NAVBAR_1_DIR = $INC_DIR . "navbar1.php";
    $NAVBAR_2_DIR = $INC_DIR . "navbar2.php";
    $NAVBAR_3_DIR = $INC_DIR . "navbar3.php";
   
    $INDEX_HOST = "http://localhost/application/vistas/index.php";

    $CON_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/config/";

    $CONFIG_DIR = $CON_DIR . "config.php";

    //RUTAS DESDE EL LOCALHOST PARA LOS HREF O FORMULARIOS O LOS HEADER
	// EL INDEX DEL PROYECTO
    $INDEX_HOST = "http://localhost/application/vistas/index.php";

    // TODAS LAS RUTAS DE LAS SESIONES DENTRO DE SEGURIDAD DENTRO DE HELPERS
    $SESION_OUT_HOST = "http://localhost/application/helpers/seguridad/sesiones/sesionOut.php";
	$SESION_IN_HOST = "http://localhost/application/helpers/seguridad/sesiones/sesion.php";
    $VALIDAR_LOGIN_HOST = "http://localhost/application/helpers/seguridad/ValidarLogin.php";
    $REGISTRAR_LOGIN_HOST = "http://localhost/application/helpers/seguridad/registrarLogin.php";

    $PANEL_COMERCIO_HOST = "http://localhost/application/vistas/comercio.php";
    $PANEL_CLIENTE_HOST = "http://localhost/application/vistas/cliente.php";
    $PANEL_DELIVERY_HOST = "http://localhost/application/vistas/delivery.php";

?>