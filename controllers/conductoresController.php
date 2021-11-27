<?php
	require_once "models/TransportistaModel.php";
	class ConductoresController{
		
	public function listar(){
	
		$conductor = new TransportistaModel();
		$result=$conductor->getAllTransportistas();
		
		require_once "views/Conductor/listaConductores.php";
	}
	public function createOrModify(){
		if($_POST){
			$clave=$_POST['clave'];
			$nroLicencia=$_POST['nroLicencia'];
			$dni=$_POST['dni'];
			$apellidos=$_POST['apellidos'];
			$nombres=$_POST['nombres'];
			$telefono=$_POST['telefono'];

			$conductor = new TransportistaModel();
			//Si el valor de clave es "crear" significa que se quiere ingresar un nuevo registro
			if($clave=="crear") $conductor->createConductor($nroLicencia,$dni,$apellidos,$nombres,$telefono);
			else $conductor->updateConductor($nroLicencia,$dni,$apellidos,$nombres,$telefono);

			header('Location:./?ctrl=conductores&acc=listar');
		}
	}
	public function delete(){
			if($_GET){
				$clave=$_GET['clave'];
				$conductor = new TransportistaModel();
				$conductor->deleteTransportista($clave);
				header('Location:./?ctrl=conductores&acc=listar');
			}
		}
	
	}
?>