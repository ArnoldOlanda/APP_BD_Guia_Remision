<?php
    require_once('./models/GuiaDeRemisionModel.php');
    require_once('./models/Cliente_NaturalModel.php');
    require_once('./models/ClienteJuridicoModel.php');

    class GuiasController
    {
        public function listar()
        {
            $data=[];
            $guia=new Guia_remision();
            if($_GET){

                $clienteNatural=new Cliente_NaturalModel();
                $clienteJuridico=new Cliente_Juridico();

                $data=$guia->getAllGuias();
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();
                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['nombres']];
                }
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/mostrar_guia.php');
        }
        public function listarBoleta()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $data=$guia->getGuiasBoleta();

                
            }
            require_once('./views/Guia/GuiaBoleta.php');
        }
        public function listarFactura()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $clienteJuridico=new Cliente_Juridico();

                $data=$guia->getGuiasFactura();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();

                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/GuiaFactura.php');
        }

        public function detalle(){
            if($_GET){
                $guia=new Guia_remision();
                $nroGuia=$_GET['nro'];

                $result=$guia->get_guiaRemisionNroGuia($nroGuia);
            }
            require_once('./views/Guia/detalle.php');
        }
        public function insertar()
        {
            if($_POST){
                //$guia=new Guia_remision();
                //$guia->registrar_BD();
                header('Location:index');
            }
            require_once('./views/Guia/ingresarGuia.php');
        }
        public function filtrar()
        {
            if($_POST){
                $filtroNroGuia=$_POST['fNroGuia'];
                $filtroFecha=$_POST['fFecha'];
                $filtroCliente=$_POST['fCliente'];

                $guia=new Guia_remision();
                $clienteNatural=new Cliente_NaturalModel();
                $clienteJuridico=new Cliente_Juridico();
                if($filtroNroGuia!="" && $filtroFecha=="" && $filtroCliente==""){
                    $data=$guia->getGuiaFiltroNroGuia($filtroNroGuia);

                }else if($filtroNroGuia=="" && $filtroFecha!="" && $filtroCliente==""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasFiltroFecha($fechaArray[1],$fechaArray[0]);

                }else if($filtroNroGuia=="" && $filtroFecha=="" && $filtroCliente!=""){
                    if(strlen($filtroCliente)<9){
                        $data=$guia->getGuiasFiltroClienteNatural($filtroCliente);
                    }else{
                        $data=$guia->getGuiasFiltroClienteJuridico($filtroCliente);
                    }
                }else if($filtroNroGuia=="" && $filtroFecha!="" && $filtroCliente!=""){
                    $fechaArray=explode('-',$filtroFecha);
                    if(strlen($filtroCliente)<9){
                        $data=$guia->getGuiasFiltroFechaClienteNatural($fechaArray[1],$fechaArray[0],$filtroCliente);
                    }else{
                        $data=$guia->getGuiasFiltroFechaClienteJuridico($fechaArray[1],$fechaArray[0],$filtroCliente);
                    }
                }
                
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();
                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['nombre']];
                }
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/mostrar_guia.php');
        }
        public function facturaFiltrar()
        {
            if($_POST){
                $filtroNroFactura=$_POST['fNroFactura'];
                $filtroFecha=$_POST['fFecha'];
                $filtroCliente=$_POST['fCliente'];

                $guia=new Guia_remision();
                $clienteJuridico=new Cliente_Juridico();

                if($filtroNroFactura!="" && $filtroFecha=="" && $filtroCliente==""){
                    $data=$guia->getGuiaFacturaFiltroNroFactura($filtroNroFactura);

                }else if($filtroNroFactura=="" && $filtroFecha!="" && $filtroCliente==""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasFacturaFiltroFecha($fechaArray[1],$fechaArray[0]);

                }else if($filtroNroFactura=="" && $filtroFecha=="" && $filtroCliente!=""){
                    $data=$guia->getGuiasFacturaFiltroCliente($filtroCliente);

                }else if($filtroNroFactura=="" && $filtroFecha!="" && $filtroCliente!=""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasFacturaFiltroFechaCliente($fechaArray[1],$fechaArray[0],$filtroCliente);
                }
                
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/GuiaFactura.php');
        }

        public function boletaFiltrar()
        {
            if($_POST){
                $filtroNroBoleta=$_POST['fNroBoleta'];
                $filtroFecha=$_POST['fFecha'];
                $filtroCliente=$_POST['fCliente'];

                $guia=new Guia_remision();
                $clienteNatural=new Cliente_NaturalModel();

                if($filtroNroBoleta!="" && $filtroFecha=="" && $filtroCliente==""){
                    $data=$guia->getGuiaBoletaFiltroNroBoleta($filtroNroBoleta);

                }else if($filtroNroBoleta=="" && $filtroFecha!="" && $filtroCliente==""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasBoletaFiltroFecha($fechaArray[1],$fechaArray[0]);

                }else if($filtroNroBoleta=="" && $filtroFecha=="" && $filtroCliente!=""){
                    $data=$guia->getGuiasBoletaFiltroCliente($filtroCliente);

                }else if($filtroNroBoleta=="" && $filtroFecha!="" && $filtroCliente!=""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasBoletaFiltroFechaCliente($fechaArray[1],$fechaArray[0],$filtroCliente);
                }
                
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['nombre']];
                }
            }
            require_once('./views/Guia/GuiaBoleta.php');
        }
    }
?>
