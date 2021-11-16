<?php
	class ProductosController{
	
	public function index(){
		require_once "models/Productos_Model.php";
		$producto = new Producto();
		$data["titulo"] = "Productos";
		$data["producto"] = $producto->get_productos();
		
		require_once "views/Producto/index.php";
	}
	
	public function create(){
		require_once "models/Productos_Model.php";
		$producto = new Producto();
		$producto-> registrar_BD();
		require_once "views/Producto/create.php";
	}
	
	public function delete($id){
		require_once "models/Productos_Model.php";
		$producto = new Producto();
		$producto-> eliminar($id);
		require_once "views/Producto/delete.php";
	}
	
	public function consultar($id){
		require_once "models/Productos_Model.php";
		$producto = new Producto();
		$data = $producto-> consultar($id);
		
		require_once "views/Producto/delete.php";
	}
	
	}
?>
