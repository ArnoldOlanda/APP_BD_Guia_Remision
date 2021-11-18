<?php
	class ProductoModel{
		
		private $GuiaRemision;//nombre de base de datos
		
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			
		}
		public function get_ProductoModel(){
			$sql="SELECT * FROM Producto";
			$resultado=$this->GuiaRemision->query($sql);
			
			return $this->resultado;
		}
		
		
	}
?>