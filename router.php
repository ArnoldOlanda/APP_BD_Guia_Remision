<?php
    include_once("controllers/".$controller."Controller.php");
    //Creamos el nombre para la instacia del objeto controller
    $objNameController= ucfirst($controller)."Controller"; //ucfirst() convierte la primera letra de un string a Mayuscula

    $controladorPaginas = new $objNameController();
    $controladorPaginas->$action();
    
?>