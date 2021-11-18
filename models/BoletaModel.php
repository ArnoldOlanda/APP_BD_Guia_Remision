<?php
	class BoletaModel{
		
		private $GuiaRemision;//nombre de base de datos
		//private Boleta
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			//$this->Boleta=array();
		}
		public function get_BoletaModel(){
			$sql="SELECT * FROM Boleta";
			$resultado=$this->GuiaRemision->query($sql);
			return $this->resultado;
		}

		public function registrar_BD(){
			$Mes =$_POST['Mes'];
			$Dia = $_POST['Dia'];
			$Anio = $_POST['Anio'];
			$Dni_Cliente = $_POST['Dni_Cliente'];
			$insertar="INSERT INTO  Cuerpo_Guia VALUES ('$Mes','$Dia','$Anio','$Dni_Cliente')"

			GuiaRemision($insertar);
		}
		
		
	}
?>