<?php
	require_once "models/Vehiculo_Model.php";
	class VehiculoController{
		
	public function index(){
		
		$vehiculo = new Vehiculo();
		
		$data["producto"] = $producto->get_vehiculos();
		
		require_once "views/Vehiculo/index.php";
	}
	
	public function create(){
		
		$vehiculo = new Vehiculo();
		$vehiculo-> registrar_BD();
		require_once "views/Vehiculo/create.php";
	}
	
	public function delete($id){
		
		$vehiculo = new Vehiculo();
		$vehiculo-> eliminar($id);
		require_once "views/Vehiculo/delete.php";
	}
	
	public function consultar(){
		
		$vehiculo = new Vehiculo();
		$data = $vehiculo-> consultar($_GET['placa']);
		
		require_once "views/Vehiculo/delete.php";
	}
	
	}
?>