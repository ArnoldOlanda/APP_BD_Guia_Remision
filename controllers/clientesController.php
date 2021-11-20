<?php
    require_once("./models/Cliente_NaturalModel.php");

    class ClientesController{
        public function listar_natural(){
         
			$cliente=new Cliente();
          
            $dataN=$cliente->get_Clientes_naturales();
                
            require_once("./views/Cliente/listarClienteNatural.php");
        }
        public function listar_juridico(){
         
			$cliente=new Cliente();
             
            $dataJ=$cliente->get_Clientes_juridicos();
            
            require_once("./views/Cliente/listarClienteJuridico.php");
        }

        public function insertar(){
			$cliente=new Cliente();
            if($_POST['tipoCliente']=='Natural'){
                $dni= $_POST["dni"];
				$nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
				$direccion= $_POST['direccion'];
				$telefono= $_POST['telefono'];
				
                //Set all data of post method to object of model
                $cliente->crear_Clientes_natural($dni,$nombre,$apellido,$direccion,$telefono);
            }

            if($_POST['tipoCliente']=='Juridico'){
               $ruc=$_POST['ruc'];
               $codDomicilioFiscal=$_POST['codDomicilioFiscal'];
               $nombreEmpresa=$_POST['nombreEmpresa'];
                //Set all data of post method to object of model
                $cliente->crear_Clientes_juridico($ruc,$codDomicilioFiscal,$nombreEmpresa);
            }
            require_once("./views/Clientes/create.php");
        }
        public function buscar(){
            $cliente=new Cliente();
            if($_GET['tipoCliente']=='Natural'){
                
                $result=$cliente->buscar($_GET['dni']);
            }
            if($_GET['tipoCliente']=='Juridico'){
                $result=$cliente->buscar($_GET['ruc']);
            }

            require_once("./views/Clientes/buscar.php");
        }
        public function modificar(){
            $cliente=new Cliente();
            if($_POST['tipoCliente']=='Natural'){
                $dni= $_POST["dni"];
				$nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
				$direccion= $_POST['direccion'];
				$telefono= $_POST['telefono'];
				
                //Set all data of post method to object of model
                $cliente->modificar_Clientes_natural($dni,$nombre,$apellido,$direccion,$telefono);
            }

            if($_POST['tipoCliente']=='Juridico'){
               $ruc=$_POST['ruc'];
               $codDomicilioFiscal=$_POST['codDomicilioFiscal'];
               $nombreEmpresa=$_POST['nombreEmpresa'];
                //Set all data of post method to object of model
                $cliente->modificar_Clientes_juridico($ruc,$codDomicilioFiscal,$nombreEmpresa);
            }
            require_once("./views/Clientes/modificar.php");
        }
        public function eliminar(){
            $cliente=new Cliente();
            if($_GET['tipoCliente']=='Natural'){
                $cliente->eliminar($_GET['dni']);
            }
            if($_GET['tipoCliente']=='Juridico'){
                $cliente->eliminar($_GET['ruc']);
            }
            header('Location:?ctrl=clientes&acc=listar');
        }
    }
?>