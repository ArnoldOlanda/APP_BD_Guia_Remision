<?php
	include_once("dbConnection.php");
	class TipoComprobanteModel {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function getAllTipoComprobante()
		{
			$data=[];
			$sql = "call sp_lista_tipo_comprobante();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}
			return $data;
		}

	}
?>