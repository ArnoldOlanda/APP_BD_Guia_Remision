<?php
	class VehiculoController{
		
	public function index(){
		require_once "models/Conductor_Model.php";
		$conductor = new Conductor();
		$data["titulo"] = "Vehiculo";
		$data["producto"] = $producto->get_vehiculos();
		
		require_once "views/Vehiculo/index.php";
	}
	
	public function create(){
		require_once "models/Conductor_Model.php";
		$conductor = new Conductor();
		$conductor-> registrar_BD();
		require_once "views/Vehiculo/create.php";
	}
	
	public function delete($id){
		require_once "models/Conductor_Model.php";
		$conductor = new Conductor();
		$conductor-> eliminar($id);
		require_once "views/Conductor/delete.php";
	}
	
	public function consultar($id){
		require_once "models/Conductor_Model.php";
		$conductor = new Conductor();
		$data = $conductor-> consultar($id);
		
		require_once "views/Conductor/delete.php";
	}
	
	}
?>