<?php

	class Guia_remision {
		private $db;
		private $Guia_remision;

		public function __construct(){
			$this->db = BD::crearInstancia();
			$this->Guia_remision = array();
		}
		public function get_guiaRemisionTodo()
		{
			$sql = "select * from Guia_Remision";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$this ->Guia_remision[] = $row;
			}
			return $this->Guia_remision;
		}
		public function get_guiaRemision(xyz)
		{
			$sql = "select * from Guia_Remision where Nro_Guia = '" + xyz+"'";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$this ->Guia_remision[] = $row;
			}
			return $this->Guia_remision;
		}
		public function get_guiaRemisionPorApellido(ape)
		{
			$sql = "select * from Guia_Remision g inner join Cliente_Natural c on g.Dni_Cliente = c.DNI where c.Apellidos='"+ape+"'";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$this ->Guia_remision[] = $row;
			}
			return $this->Guia_remision;
		}


	}


?>