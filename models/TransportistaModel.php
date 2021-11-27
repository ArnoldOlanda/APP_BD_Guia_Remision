<?php
	require_once('./dbConnection.php');
	class TransportistaModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=BD::CrearInstancia();//conecta con la base de datos
		}

		public function getAllTransportistas(){
			$ListaTransportista=[];
			$sql = "call sp_lista_conductores();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$ListaTransportista[] = $row;
			}
			return $ListaTransportista;
		}

		public function createConductor($nroLicen,$dni,$ape,$nom,$tel){
			$data=[];
			$resultado=$this->db->prepare("call sp_insertar_transportista(?,?,?,?,?)");
			$resultado->execute([$nroLicen,$dni,$ape,$nom,$tel]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}
		public function updateConductor($nroLicen,$dni,$ape,$nom,$tel){
			$data=[];
			$resultado=$this->db->prepare("call sp_actualizar_transportista(?,?,?,?,?)");
			$resultado->execute([$nroLicen,$dni,$ape,$nom,$tel]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$data[] = $row;
			}
			return $data;
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
		public function deleteTransportista($NumLicencia){
			$resultado=$this->db->prepare("call sp_eliminar_transportista(?)");
			$resultado->execute([$NumLicencia]);
		}	
		
	}
?>