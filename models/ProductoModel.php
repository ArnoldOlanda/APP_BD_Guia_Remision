<?php
	class Producto{
		
		public function __construct(){
			$this->db = BD::crearInstancia();
		}
		public function get_Productos(){
			$sql="call sp_lista_productos";
			$resultado=$this->db->query($sql);
			
			return $resultado;
		}
		public function createProducto($unid,$desc){
			$resultado=$this->db->prepare("call sp_insert_producto(?,?)");
			$resultado->execute([$unid,$desc]);

		}
		public function updateProducto($id,$unid,$desc){
			$resultado=$this->db->prepare("call sp_update_producto(?,?,?)");
			$resultado->execute([$unid,$desc,$id]);

		}
		
		
	}
?>