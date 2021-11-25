<?php
    require_once("./models/Cliente_NaturalModel.php");
    require_once("./models/ClienteJuridicoModel.php");

    class ClientesController{
        public function listar_natural(){
         
			$cliente=new Cliente_NaturalModel();
          
            $dataN=$cliente->get_Clientes_naturales();
                
            require_once("./views/Cliente/listarClienteNatural.php");
        }
        public function listar_juridico(){
         
			$cliente=new Cliente_Juridico();
             
            $dataJ=$cliente->get_ListaCliente_Juridico();
            
            require_once("./views/Cliente/listarClienteJuridico.php");
        }
		public function createOrModifyJuridico(){
			if($_POST){
				$clave=$_POST['clave'];
				$unidad=$_POST['unidadMedida'];
				$descripcion=$_POST['descripcion'];
				$cliente = new Cliente_Juridico();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($clave=="crear") $cliente->createCliente_Juridico($unidad,$descripcion);
				else $cliente->updateCliente_Juridico($clave,$unidad,$descripcion);

				header('Location:./?ctrl=clientes&acc=listar_juridico');
			}
		}
		public function createOrModifyNatural(){
			if($_POST){
				$clave=$_POST['clave'];
				$unidad=$_POST['unidadMedida'];
				$descripcion=$_POST['descripcion'];
				$cliente = new Cliente_NaturalModel();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($clave=="crear") $cliente->crear_Clientes_juridico($unidad,$descripcion);
				else $cliente->updateProducto($clave,$unidad,$descripcion);

				header('Location:./?ctrl=clientes&acc=listar_natural');
			}
		}
		

        public function insertar(){
			
            if($_POST['tipoCliente']=='Natural'){
                $cliente=new Cliente_NaturalModel();
                $dni= $_POST["dni"];
				$nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
				$direccion= $_POST['direccion'];
				$telefono= $_POST['telefono'];
				
                //Set all data of post method to object of model
                $cliente->crear_Clientes_natural($dni,$nombre,$apellido,$direccion,$telefono);
            }

            if($_POST['tipoCliente']=='Juridico'){
                $cliente=new Cliente_Juridico();
               $ruc=$_POST['ruc'];
               $codDomicilioFiscal=$_POST['codDomicilioFiscal'];
               $nombreEmpresa=$_POST['nombreEmpresa'];
                //Set all data of post method to object of model
                $cliente->crear_Clientes_juridico($ruc,$codDomicilioFiscal,$nombreEmpresa);
            }
            require_once("./views/Clientes/create.php");
        }
        public function buscar(){
            
            if($_GET['tipoCliente']=='Natural'){
                $cliente=new Cliente_NaturalModel();
                $result=$cliente->get_Cliente_Natural_Epecifico($_GET['dni']);
            }
            if($_GET['tipoCliente']=='Juridico'){
                $cliente=new Cliente_Juridico();
                $result=$cliente->get_ListaCliente_JuridicoPorRUC($_GET['ruc']);
            }

            require_once("./views/Clientes/buscar.php");
        }
        public function modificar(){
            if($_POST['tipoCliente']=='Natural'){
                $cliente=new Cliente_NaturalModel();
                $dni= $_POST["dni"];
				$nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
				$direccion= $_POST['direccion'];
				$telefono= $_POST['telefono'];
				
                //Set all data of post method to object of model
                $cliente->modificar_Clientes_natural($dni,$nombre,$apellido,$direccion,$telefono);
            }

            if($_POST['tipoCliente']=='Juridico'){
                $cliente=new Cliente_Juridico();
               $ruc=$_POST['ruc'];
               $codDomicilioFiscal=$_POST['codDomicilioFiscal'];
               $nombreEmpresa=$_POST['nombreEmpresa'];
                //Set all data of post method to object of model
                $cliente->modificar_Clientes_juridico($ruc,$codDomicilioFiscal,$nombreEmpresa);
            }
            require_once("./views/Clientes/modificar.php");
        }
        public function delete(){
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