<?php
    //$url= $_SERVER["REQUEST_URI"];
    //Por defecto
    $controller='Paginas';
    $action='inicio';

    if(isset($_GET['ctrl']) && isset($_GET['acc'])){

        if ($_GET['ctrl']!="" && $_GET['acc']!="") { //Validar cadenas vacias
            $controller=$_GET['ctrl'];
            $action=$_GET['acc'];
        }
    }
    require_once("views/bienvenida.php");
?>