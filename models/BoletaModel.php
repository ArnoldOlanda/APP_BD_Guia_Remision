<?php
	class BoletaModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_ListaBoleta(){
			$sql = "call Lista_Boleta();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$ListBoletas[] = $row;
			}
			return $ListBoletas;
		}

		public function get_BoletaEspecifica($NumBoleta)
		{
			$resultado = $this->db->preparate("call Consulta_BoletaEspecifica('"+$NumBoleta+"');");
			$resultado->execute($resultado,[$NumBoleta]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}

		
	}
?>