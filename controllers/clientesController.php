<?php
    require_once("./models/clienteNaturalModel.php");
    require_once("./models/clienteJuridicoModel.php");

    class ClientesController{
        public function listar(){
            $data=[][];
            if($_GET['tipoCliente']=='Natural'){
                $clienteNatural=new ClienteNatural();
                $data=$clienteNatural->consultar_todo();
            }else{
                $clienteJuridico=new ClienteJuridico();
                $data=$clienteJuridico->consultar_todo();
            }
            require_once("./views/Clientes/index.php");
        }
        public function insertar(){
            if($_POST['tipoCliente']=='Natural'){
                $clienteNatural=new ClienteNatural();
                //Set all data of post method to object of model
                $clienteNatural->registrar_BD();
            }else{
                $clienteJuridico=new ClienteJuridico();
                //Set all data of post method to object of model
                $clienteNatural->registrar_BD();
            }
            require_once("./views/Clientes/create.php");
        }
        public function buscar(){
            if($_GET['tipoCliente']=='Natural'){
                $clienteNatural=new ClienteNatural();
                $result=$clienteNatural->buscar($_GET['dni']);
            }else{
                $clienteJuridico=new ClienteJuridico();
                $result=$clienteJuridico->buscar($_GET['ruc']);
            }
            require_once("./views/Clientes/buscar.php");
        }
        public function modificar(){
            if($_POST['tipoCliente']=='Natural'){
                $clienteNatural=new ClienteNatural();
                //Set all data of post method to object of model
                $clienteNatural->modificar();
            }else{
                $clienteJuridico=new ClienteJuridico();
                //Set all data of post method to object of model
                $clienteJuridico->modificar();
            }
            require_once("./views/Clientes/modificar.php");
        }
        public function eliminar(){
            if($_GET['tipoCliente']=='Natural'){
                $clienteNatural=new ClienteNatural();
                $clienteNatural->eliminar($_GET['dni']);
            }else{
                $clienteJuridico=new ClienteJuridico();
                $clienteJuridico->eliminar($_GET['ruc']);
            }
            header('Location:?ctrl=clientes&acc=index');
        }
    }
?>