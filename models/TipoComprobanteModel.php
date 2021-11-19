<?php
	include_once("dbConnection.php");
	class Tipo_Comprobante {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_ListaTipoComprobante()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_TipoComprobante() select * from tipo_comprobante;]
			$sql = "call Lista_TipoComprobante();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuTipoC[] = $row;
			}
			return $devuTipoC;
		}

	}
?>