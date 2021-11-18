<?php
	class VehiculoModel{
		
		private $GuiaRemision;//nombre de base de datos
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			
		}
		public function get_VehiculoModel(){
			$sql="SELECT * FROM Vehiculo";
			$resultado=$this->GuiaRemision->query($sql);
			
			return $this->resultado;
		}
			
		
	}
?>