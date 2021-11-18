<?php
    require_once("./models/Cliente_NaturalModel.php");

    class ClientesController{
        public function listar(){
         
			$cliente=new Cliente();
          
            $dataN=$cliente->get_Clientes_naturales();
    
            $dataJ=$cliente->get_Clientes_juridicos();
            
            require_once("./views/Cliente/listar.php");
        }
        public function insertar(){
			$cliente=new Cliente();
            if($_POST['tipoCliente']=='Natural'){
                $dni= $_POST["dni"];
				$nombre= $_POST;
				$direccion= $_POST;
				$telefono= $_POST;
				
                //Set all data of post method to object of model
                $cliente->crear_Clientes_natural($dni,$nombre,$direccion);
            }else{
               
                //Set all data of post method to object of model
                $cliente->crear_Clientes_juridico();
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