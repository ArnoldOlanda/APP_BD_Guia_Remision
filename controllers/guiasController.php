<?php
    require_once('./models/GuiaDeRemisionModel.php');

    class GuiasController
    {
        public function listar()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $data=$guia->get_guiaRemisionTodo();
            }
            require_once('./views/Guia/motrar_guia.php');
        }
        public function listarBoleta()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $data=$guia->get_guiaRemisionBoleta();
            }
            require_once('./views/Guia/GuiaBoleta.php');
        }
        public function listarFactura()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $data=$guia->get_guiaRemisionFactura();
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
        public function buscar()
        {
            if($_GET){
                //$guia=new Guia_remision();
                //$data=$guia->consultar($_GET['nroGuia']);
            }
            require_once('./views/Guia/buscar.php');
        }

    }
?>
