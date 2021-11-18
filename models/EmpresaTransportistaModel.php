<?php

	class Empresa_Transportista {
		private $db;
		private $Empresa_Transportista;

		public function __construct(){
			$this->db = BD::crearInstancia();
			$this->Empresa_Transportista = array();
		}
		public function get_guiaRemisionTodo()
		{
			$sql = "select * from Empresa_Transportista";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$this ->Empresa_Transportista[] = $row;
			}
			return $this->Empresa_Transportista;
		}
		public function get_guiaRemisionRUC(yzz)
		{
			$sql = "select * from Empresa_Transportista where RUC='"+yzz+"'";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$this ->Empresa_Transportista[] = $row;
			}
			return $this->Empresa_Transportista;
		}


	}
?>