<?php

class Controller_Index extends Controller{
    function index(){
        $this->view->generate('index.php', 'template_index.php');
    }
}

?>