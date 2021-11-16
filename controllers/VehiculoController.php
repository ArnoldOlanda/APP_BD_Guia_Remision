<?php
	class VehiculoController{
		
	public function index(){
		require_once "models/Vehiculo_Model.php";
		$vehiculo = new Vehiculo();
		$data["titulo"] = "Vehiculo";
		$data["producto"] = $producto->get_vehiculos();
		
		require_once "views/Vehiculo/index.php";
	}
	
	public function create(){
		require_once "models/Vehiculo_Model.php";
		$vehiculo = new Vehiculo();
		$vehiculo-> registrar_BD();
		require_once "views/Vehiculo/create.php";
	}
	
	public function delete($id){
		require_once "models/Vehiculo_Model.php";
		$vehiculo = new Vehiculo();
		$vehiculo-> eliminar($id);
		require_once "views/Vehiculo/delete.php";
	}
	
	public function consultar($id){
		require_once "models/Vehiculo_Model.php";
		$vehiculo = new Vehiculo();
		$data = $vehiculo-> consultar($id);
		
		require_once "views/Vehiculo/delete.php";
	}
	
	}
?>