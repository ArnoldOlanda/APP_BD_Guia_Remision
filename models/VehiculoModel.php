<?php
include_once("dbConnection.php");
	class VehiculoModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=BD::CrearInstancia();//conecta con la base de datos
		}

		public function get_Lista_vehiculos(){
			$sql = "call sp_lista_vehiculos();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaVehiculo[] = $row;
			}
			return $ListaVehiculo;
		}

		public function get_Consulta_Vehiculo($NumPlanca)
		{
			$resultado = $this->db->preparate("call Consulta_Vehiculo('"+$NumPlanca+"');");
			$resultado->execute([$NumPlanca]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$Devuelve[] = $row;
			}
			return $Devuelve;
		}
		public function createVehiculo($n_placa,$marca,$constancia){
			$resultado = $this->db->prepare("call sp_insertar_vehiculo(?,?,?)");
			$resultado->execute([$n_placa,$marca,$constancia]);
		}
		public function updateVehiculo($placa,$marca,$constancia){
			$resultado = $this->db->prepare("call sp_actualizar_vehiculo(?,?,?)");
			$resultado->execute([$placa,$marca,$constancia]);
		}
		public function deleteVehiculo($placa){
			$resultado = $this->db->prepare("call sp_eliminar_vehiculo(?)");
			$resultado->execute([$placa]);
		}
	}
?>