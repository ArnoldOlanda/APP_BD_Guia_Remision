<?php
	class VehiculoModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=DB::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_vehiculos(){
			$sql = "call Lista_Vehiculo();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaVehiculo[] = $row;
			}
			return $ListaVehiculo;
		}

		public function get_Consulta_Vehiculo($NumPlanca)
		{
			$resultado = $this->db->preparate("call Consulta_Vehiculo('"+$NumPlanca+"');");
			$resultado->execute($resultado,[$NumPlanca]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}
			
		
	}
?>