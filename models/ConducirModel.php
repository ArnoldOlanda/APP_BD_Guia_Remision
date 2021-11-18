<?php
	class ConducirModel{
		
		private $GuiaRemision;//nombre de base de datos
		//private Cuerpo_Guia
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			//$this->Cuerpo_Guia=array();
		}
		public function get_ConducirModel(){
			$sql="SELECT * FROM Conducir";
			$resultado=$this->GuiaRemision->query($sql);
			
			return $this->resultado;
		}
		
		
	}
?>