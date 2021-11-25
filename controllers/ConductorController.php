<?php
	require_once "models/Conductor_Model.php";
	class VehiculoController{
		
	public function index(){
	
		$conductor = new Conductor();
		$data["titulo"] = "Vehiculo";
		$data["producto"] = $producto->get_vehiculos();
		
		require_once "views/Vehiculo/index.php";
	}
	
	public function create(){
		
		$conductor = new Conductor();
		$conductor-> registrar_BD();
		require_once "views/Vehiculo/create.php";
	}
	
	public function delete($licencia){
		
		$conductor = new Conductor();
		$conductor-> eliminar($licencia);
		require_once "views/Conductor/delete.php";
	}
	
	public function consultar(){

		$conductor = new Conductor();
		$data = $conductor-> consultar($_GET['licencia']);
		
		require_once "views/Conductor/delete.php";
	}
	
	}
?>