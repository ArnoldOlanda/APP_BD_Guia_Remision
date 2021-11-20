<?php
	require_once ("./dbConnection.php");
	require_once ("models/ProductoModel.php");
	class ProductosController{
	
		public function listar(){
			
			$producto = new Producto();
			$result = $producto->get_Productos();
			
			require_once "views/Producto/listar.php";
		}
		
		public function createOrModify(){
			if($_POST){
				$id=$_POST['idProd'];
				$unidad=$_POST['unidadMedida'];
				$descripcion=$_POST['descripcion'];
				$producto = new Producto();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($id==""){ 
					$producto->createProducto($unidad,$descripcion);
				}else{
					$producto->updateProducto($id,$unidad,$descripcion);
				}
				header('Location:./?ctrl=productos&acc=listar');
			}
			
			
		}
		
		public function delete($id){
			
			//$producto = new Producto();
			//$producto-> eliminar($id);
			require_once "views/Producto/delete.php";
		}
		
		public function consultar($id){
			
			//$producto = new Producto();
			//$data = $producto-> consultar($id);
			
			require_once "views/Producto/delete.php";
		}
		public function modify($producto){
			
			//$producto-> ($id);
			require_once "views/Producto/modify.php";
		}
	
	}
?>
