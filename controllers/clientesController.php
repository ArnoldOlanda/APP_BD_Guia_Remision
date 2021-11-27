<?php
    require_once("./models/Cliente_NaturalModel.php");
    require_once("./models/ClienteJuridicoModel.php");
    require_once("./models/DireccionClienteJuridicoModel.php");
	require_once("./models/DireccionesModel.php");	
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
        public function listarDireccionesJuridico(){
            // if($_POST){
            //     $rucJ=$_POST['destinatario'];
            //     $direccionesJ=new DireccionesJuridicoModel();
            //     $data=$direccionesJ->getDireccionesClienteJuridicoRUC('43454345');
                
            //     echo json_encode("recibido");
            // }
        }

        
		public function createOrModifyJuridico(){
			if($_POST){
				$clave=$_POST['clave'];
				$ruc=$_POST['ruc'];
				$nombre_empresa=$_POST['nombre_empresa'];
				$direccion=$_POST['direccion'];
				$cliente = new Cliente_Juridico();
				$direccion2 = new DireccionesModel();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($clave=="crear"){ 
					$direccion2->createDireccion($direccion);
					
					$cliente->createCliente_Juridico($ruc,$nombre_empresa);
					$direccion2->relacionarDireccion_juridico($ruc);
				}
				else{ 
				
				$cliente->updateCliente_Juridico($ruc,$direccion,$nombre_empresa);
				
				}
				

				header('Location:./?ctrl=clientes&acc=listar_juridico');
			}
		}
		public function createOrModifyNatural(){
			if($_POST){
				$clave=$_POST['clave'];
				$dni=$_POST['dni_natural'];
				$nombre=$_POST['nombres_natural'];
				$apellidos=$_POST['apellidos_natural'];
				$direccion=$_POST['direccion_natural'];
				$telefono=$_POST['telefono_natural'];
				$cliente = new Cliente_NaturalModel();
				$direccion2 = new DireccionesModel();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($clave=="crear") {
					$direccion2->createDireccion($direccion);
					$cliente->createCliente_Natural($dni,$nombre,$apellidos,$telefono);
				}
				else {
					$direccion2->updateDireccion($dni,$direccion);
					$cliente->updateCliente_Natural($clave,$apellidos,$nombre,$telefono);
				}
				header('Location:./?ctrl=clientes&acc=listar_natural');
			}
		}
		public function createOrModifyDireccion(){
			if($_POST){
				$clave=$_POST['clave'];
				$ruc_direc=$_POST['ruc_direccion'];
				$cod_direc=$_POST['cod_direc'];
				$direccion=$_POST['direccion_detalle'];
				$direccion2 = new DireccionesModel();
				
				//Si esta vacio significa que se quiere ingresar un nuevo registro		
				if($clave=="crear") {
					
					$direccion2->createDireccion($direccion);
					$direccion2->relacionarDireccion_juridico($ruc_direc);
				}
				else {
					$direccion2->updateDireccion_juridico($cod_direc,$direccion);
				}
				
				header('Location:./?ctrl=clientes&acc=detalle&nro='. $ruc_direc);
			}
		}
		
		
		public function deleteNatural(){
			if($_GET){
				$clave=$_GET['clave'];
				$cliente = new Cliente_NaturalModel();
				$cliente->deleteCliente_Natural($clave);
				header('Location:./?ctrl=clientes&acc=listar_natural');
			}
		}  

		public function deleteJuridico(){
			if($_GET){
				$clave=$_GET['clave'];
				$cliente = new Cliente_Juridico();
				$cliente->deleteCliente_Juridico($clave);
				header('Location:./?ctrl=clientes&acc=listar_juridico');
			}
		}		
		
		public function deleteDetalle(){
			if($_GET){
				$clave=$_GET['clave'];
				$cod_direc=$_GET['cod'];
				$Direccion = new DireccionesModel();
				$Direccion->deleteDireccion($cod_direc);
				header('Location:./?ctrl=clientes&acc=detalle&nro='.$clave);
			}
		}
		
       public function detalle(){
            if($_GET){
                $cliente=new Cliente_Juridico();
                $nroGuia=$_GET['nro'];

                $result=$cliente->get_cliente_juridico($nroGuia);
            }
            require_once('./views/Cliente/detalleJuridico.php');
        }
    }
?>	