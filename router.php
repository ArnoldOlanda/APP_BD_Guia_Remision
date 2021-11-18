<?php
    //$_SERVER[‘REQUEST_URI’]: De aquí obtenemos la url relativa del script sobre el dominio, por ejemplo /ejemplo-obtener-url.php
	
    include_once("controllers/".$controller."Controller.php");
    
    //Creamos el nombre para la instacia del objeto controller
    $objNameController= ucfirst($controller)."Controller"; //ucfirst() convierte la primera letra de un string a Mayuscula

    $controladorPaginas = new $objNameController();
    
    //if($action=="") $action="error";
    $controladorPaginas->$action();
    
?>