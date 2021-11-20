<?php
	class ProductoModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_Productos(){
			$sql = "call Lista_Producto();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaProductos[] = $row;
			}
			return $ListaProductos;
		}		
	}
?>