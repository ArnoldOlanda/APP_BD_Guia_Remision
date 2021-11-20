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
            require_once('./views/IngresarGuia.php');
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
