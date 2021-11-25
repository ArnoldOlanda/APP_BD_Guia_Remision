<?php
	class TransportistaModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_Transportista(){
			$sql = "call Lista_Transportista();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaTransportista[] = $row;
			}
			return $ListaTransportista;
		}

		public function get_Consulta_Transportista($NumLicencia)
		{
			$resultado = $this->db->preparate("call Consulta_TransportistaEspecifico('"+$NumLicencia+"');");
			$resultado->execute($resultado,[$NumLicencia]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}
		
		
	}
?>