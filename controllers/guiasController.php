<?php
    require_once('./models/guia.php');

    class GuiasController
    {
        public function listar()
        {
            $data=[][];
            if($_GET){
                $guia=new Guia();
                $data=$guia->consultar_todo();
            }
            require_once('./views/Guia/index.php');
        }
        public function insertar()
        {
            if($_POST){
                $guia=new Guia();
                $guia->registrar_BD();
                header('Location:index');
            }
            require_once('./views/Guia/create.php');
        }
        public function buscar()
        {
            if($_GET){
                $guia=new Guia();
                $data=$guia->consultar($_GET['nroGuia']);
            }
            require_once('./views/Guia/buscar.php');
        }

    }
?>
