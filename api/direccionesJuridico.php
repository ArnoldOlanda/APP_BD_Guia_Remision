<?php
    require_once("../models/DireccionClienteJuridicoModel.php");

    if($_POST){
        $rucOrDni=$_POST['destinatario'];
        if(strlen($rucOrDni)<9){
            $direccionN=new DireccionesJuridicoNaturalModel();
            $data=$direccionN->getDireccionesClienteNaturalDni($rucOrDni);
        }else{
            $direccionesJ=new DireccionesJuridicoNaturalModel();
            $data=$direccionesJ->getDireccionesClienteJuridicoRUC($rucOrDni);
        }
        echo json_encode($data);
        
    }
?>