<?php

// RUTAS DESDE DISCO C PARA LA PROGRAMACION PHP

	// EL INDEX DEL PROYECTO
    $INDEX_DIR = $_SERVER["DOCUMENT_ROOT"] . "index.php";

    //TODAS LAS RUTAS DE LA CARPETA INC DENTRO DE HELPERS
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/inc/";
    $HEADER_DIR = $INC_DIR . "header.php";
    $NAVBAR_DIR = $INC_DIR . "navbar.php";
    $NAVBAR_1_DIR = $INC_DIR . "navbar1.php";
    $NAVBAR_2_DIR = $INC_DIR . "navbar2.php";
   
    $INDEX_HOST = "http://localhost/application/vistas/index.php";

    $CON_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/config/";

    $CONFIG_DIR = $CON_DIR . "config.php";

?>