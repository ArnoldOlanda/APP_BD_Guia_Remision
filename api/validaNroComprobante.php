<?php

    require_once('../models/BoletaModel.php');
    require_once('../models/FacturaModel.php');

    $boleta=new BoletaModel();
    $factura=new FacturaModel();

    if($_POST){
        $tipoComprobante=$_POST['tipoComprobante'];
        $nroComprobante=$_POST['nroComprobante'];
        if($tipoComprobante=='1'){
            $data=$factura->getFacturaNro($nroComprobante);
        }
        if($tipoComprobante=='2'){
            $data=$boleta->getBoletaNro($nroComprobante);
        }

        echo json_encode($data);
    }

?>