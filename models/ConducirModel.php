<?php
	class ConducirModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_Conducir(){
			$sql = "call Lista_Conducir();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$ListadoConducir[] = $row;
			}
			return $ListadoConducir;
		}

		public function get_Consulta_Conducir_Especifico($NumLicencia)
		{
			$resultado = $this->db->preparate("call Consulta_Conducir('"+$NumLicencia+"');");
			$resultado->execute($resultado,[$NumLicencia]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}
		
	}
?>