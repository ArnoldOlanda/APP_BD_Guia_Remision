<?php
	class TransportistaModel{
		
		private $GuiaRemision;//nombre de base de datos
		
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			
		}
		public function get_TransportistaModel(){
			$sql="SELECT * FROM Transportista";
			$resultado=$this->GuiaRemision->query($sql);
			
			return $this->resultado;
		}
		
		
	}
?>