<?php
	require_once ("./dbConnection.php");
	require_once "models/VehiculoModel.php";
	class VehiculosController{
	

	
	public function listar(){
		
		$vehiculo = new VehiculoModel();
		
		$result = $vehiculo->get_Lista_vehiculos();
		
		require_once "views/Vehiculo/listarVehiculos.php";
	}
	
	public function createOrModify(){
		if($_POST){
			$clave=$_POST['clave'];
			$placa=$_POST['placa'];
			$marca=$_POST['marca'];
			$constancia=$_POST['constanciaInscripcion'];
			$vehiculo = new VehiculoModel();
			//Si esta vacio significa que se quiere ingresar un nuevo registro
			if($clave=="crear") $vehiculo->createVehiculo($placa,$marca,$constancia);
			else $vehiculo->updateVehiculo($clave,$marca,$constancia);

			header('Location:./?ctrl=vehiculos&acc=listar');
		}
	}
	
	public function delete($id){
		
		// $vehiculo = new VehiculoModel();
		// $vehiculo-> eliminar($id);
		// require_once "views/Vehiculo/delete.php";
	}
	

	
	}
?>