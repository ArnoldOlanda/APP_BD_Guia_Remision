<?php
	include_once("dbConnection.php");
	class Direcciones {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
		}


		public function get_ListaDirecciones()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_Direcciones() select * from Direcciones;]
			$sql = "call Lista_Direcciones();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devudire[] = $row;
			}
			return $devudire;
		}
		public function get_ListaDireccionCodigo($CodigoDire)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_DireccionPorCodigo(IN CodigoDire int) select * from Direcciones where Codigo = CodigoDire;]
			$resultado = $this->db->preparate("call Lista_DireccionPorCodigo("+$CodigoDire+")");
			$resultado->execute($resultado,[$CodigoDire]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devudire[] = $row;
			}
			return $devudire;

		}


	}
?>