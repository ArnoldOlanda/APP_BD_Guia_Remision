<?php
	class TransportarModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_Transportar(){
			$sql = "call Lista_Transportar();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaTransporte[] = $row;
			}
			return $ListaTransporte;
		}

		public function get_Consulta_Transportar($NumPlaca)
		{
			$resultado = $this->db->preparate("call Consulta_Transportar('"+$NumPlaca+"');");
			$resultado->execute($resultado,[$NumPlaca]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}
		
		
	}
?>