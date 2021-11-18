<?php
	require_once "models/Productos_Model.php";
	class ProductosController{
	
		public function index(){
			
			$producto = new Producto();
			$data["producto"] = $producto->get_productos();
			
			require_once "views/Producto/index.php";
		}
		
		public function create(){
			
			$producto = new Producto();
			$producto-> registrar_BD();
			require_once "views/Producto/create.php";
		}
		
		public function delete($id){
			
			$producto = new Producto();
			$producto-> eliminar($id);
			require_once "views/Producto/delete.php";
		}
		
		public function consultar($id){
			
			$producto = new Producto();
			$data = $producto-> consultar($id);
			
			require_once "views/Producto/delete.php";
		}
		public function modify($producto){
			
			$producto-> ($id);
			require_once "views/Producto/modify.php";
		}
	
	}
?>
