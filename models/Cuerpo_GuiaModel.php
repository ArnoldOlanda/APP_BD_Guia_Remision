<?php
	class Cuerpo_GuiaModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_Cuerpo_Guia(){
			$sql = "call Lista_Cuerpo_Guia();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaCuerpo_Guia[] = $row;
			}
			return $ListaCuerpo_Guia;
		}

		public function get_consulta_Cuerpo_Guia($NumCuerpo_Guia)
		{
			$resultado = $this->db->preparate("call Consulta_Cuerpo_Guia('"+$NumCuerpo_Guia+"');");
			$resultado->execute($resultado,[$NumCuerpo_Guia]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}

		public function registrar(){
			$ID_Producto =$_POST['ID_Producto'];
			$Cantidad = $_POST['Cantidad'];
			$Peso = $_POST['Peso'];
			$insertar="INSERT INTO  Cuerpo_Guia VALUES ('$ID_Producto','$Cantidad','$Peso')";

		}
		
		
	}
?>