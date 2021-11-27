<?php

    require_once('../models/GuiaDeRemisionModel.php');

    $guia=new Guia_remision();
    if($_POST){

        $nroGuia=$_POST['nroGuia'];
        $data=$guia->getGuiaFiltroNroGuia($nroGuia);
        //$data=$guia->getGuiaNroGuiaPorNro($nroGuia);
        
        echo json_encode($data);
    }

?>