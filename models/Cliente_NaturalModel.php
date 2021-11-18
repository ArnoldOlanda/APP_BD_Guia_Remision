<?php
	class Cliente_NaturalModel{
		
		private $GuiaRemision;//nombre de base de datos
		
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			//$this->Cuerpo_Guia=array();
		}
		public function get_Cliente_NaturalModel(){
			$sql="SELECT * FROM ClienteNatural";
			$resultado=$this->GuiaRemision->query($sql);
			
			return $this->resultado;
		}
		
		
	}
?>