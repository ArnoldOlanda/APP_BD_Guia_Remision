<?php

    require_once('../dbConnection.php');

    function getGuiaFiltroNroGuia($nro_guia){
        $db=BD::crearInstancia();
        $data=[];
        $resultado=$db->prepare("call sp_lista_guia_remision_filtro_nro_guia(?)");
        $resultado->execute([$nro_guia]);
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
        {
            $data[] = $row;
        }
        return $data;
    }

    if($_POST){

        $nroGuia=$_POST['nroGuia'];
        $data=getGuiaFiltroNroGuia($nroGuia);
        
        echo json_encode($data);
    }

?>