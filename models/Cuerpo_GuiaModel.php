<?php
	class Cuerpo_GuiaModel{
		
		private $GuiaRemision;//nombre de base de datos
		
		
		public function __construct(){
			$this->GuiaRemision=Conectar::conexion();//conecta con la base de datos
			
		}
		public function get_Cuerpo_GuiaModel(){
			$sql="SELECT * FROM Cuerpo_Guia";
			$resultado=$this->GuiaRemision->query($sql);
			
			return $this->resultado;
		}
		public function registrar(){
			$ID_Producto =$_POST['ID_Producto'];
			$Cantidad = $_POST['Cantidad'];
			$Peso = $_POST['Peso'];
			$insertar="INSERT INTO  Cuerpo_Guia VALUES ('$ID_Producto','$Cantidad','$Peso')";

		}
		
		
	}
?>