<?php
	require_once("./models/DireccionesModel.php");	
    class DireccionesController{
       	public function createOrModify(){
			if($_POST){
				$clave=$_POST['clave'];
				$direccion=$_POST['Direccion'];
				$cliente = new Cliente_Juridico();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($clave=="crear") $cliente->createCliente_Juridico($unidad,$descripcion);
				else $cliente->updateCliente_Juridico($clave,$unidad,$descripcion);

				header('Location:./?ctrl=clientes&acc=listar_juridico');
				
				
			}
		}
		
		public function delete(){
			if($_GET){
				$clave=$_GET['clave'];
				$cliente = new Cliente_NaturalModel();
				$cliente->deleteCliente_Natural($clave);
				header('Location:./?ctrl=clientes&acc=listar_natural');
			}
		}
    }
?>	