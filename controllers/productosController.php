<?php
	require_once ("./dbConnection.php");
	require_once ("models/ProductoModel.php");
	class ProductosController{
	
		public function listar(){
			
			$producto = new ProductoModel();
			$result = $producto->get_Lista_Productos();
			
			require_once "views/Producto/listarProductos.php";
		}
		
		public function createOrModify(){
			if($_POST){
				$clave=$_POST['clave'];
				$unidad=$_POST['unidadMedida'];
				$descripcion=$_POST['descripcion'];
				$producto = new ProductoModel();
				//Si esta vacio significa que se quiere ingresar un nuevo registro
				if($clave=="crear") $producto->createProducto($unidad,$descripcion);
				else $producto->updateProducto($clave,$unidad,$descripcion);

				header('Location:./?ctrl=productos&acc=listar');
			}
		}
		
		public function delete(){
			if($_GET){
				$clave=$_GET['clave'];
				$producto = new ProductoModel();
				$producto->deleteProducto($clave);
				header('Location:./?ctrl=productos&acc=listar');
			}
		}
		
		public function consultar($id){
			
			//$producto = new Producto();
			//$data = $producto-> consultar($id);
			require_once "views/Producto/delete.php";
		}	
	}
?>
