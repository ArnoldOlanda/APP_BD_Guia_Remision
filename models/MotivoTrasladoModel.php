<?php
	include_once("dbConnection.php");
	class MotivoTrasladoModel {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function getAllMotivosTraslado()
		{
			$result=[];
			$sql = "call sp_lista_motivo_traslado();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}

	}
?>