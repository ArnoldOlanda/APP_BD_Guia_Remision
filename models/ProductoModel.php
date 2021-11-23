<?php
	include_once('./dbConnection.php');
	class ProductoModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=BD::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_Productos(){
			$sql = "call sp_lista_productos();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaProductos[] = $row;
			}
			return $ListaProductos;
		}
		public function createProducto($unid,$desc){
			$resultado=$this->db->prepare("call sp_insertar_producto(?,?)");
			$resultado->execute([$unid,$desc]);

		}
		public function updateProducto($id,$unid,$desc){
			$resultado=$this->db->prepare("call sp_actualizar_producto(?,?,?)");
			$resultado->execute([$unid,$desc,$id]);

		}		
	}
?>