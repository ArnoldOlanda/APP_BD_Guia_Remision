<?php
	include_once("dbConnection.php");
	class Motivo_Traslado {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_ListaMotivoTraslado()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_MotivoTraslado() select * from motivo_traslado;]
			$sql = "call Lista_MotivoTraslado();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuMotivoT[] = $row;
			}
			return $devuMotivoT;
		}

	}
?>