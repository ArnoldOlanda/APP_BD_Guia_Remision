<?php
	require_once('../dbConnection.php');
	class BoletaModel{
		
		private $db;//nombre de base de datos
		
		public function __construct(){
			$this->db=BD::CrearInstancia();//conecta con la base de datos
		}

		public function getBoletaNro($nroBoleta){
			$data=[];
			$resultado = $this->db->prepare("call sp_busca_boleta_numero(?)");
			$resultado->execute([$nroBoleta]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
		}
		
		// public function get_ListaBoleta(){
		// 	$sql = "call Lista_Boleta();";
		// 	$resultado = $this->db->query($sql);
		// 	while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
		// 		$ListBoletas[] = $row;
		// 	}
		// 	return $ListBoletas;
		// }

		
	}
?>