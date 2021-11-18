<?php
	include_once("dbConnection.php");
	class Cliente{
		private $db;
		
		public function __construct(){
			$this->db = BD::crearInstancia();
		}
		public function get_Clientes_naturales(){
			$sql="call Lista_cliente_natural";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devu[] = $row;
			}
			return $devu;
		}
		public function get_Clientes_juridicos(){
			$sql="call Lista_cliente_juridico";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devu[] = $row;
			}
			return $devu;
		}
		public function crear_Clientes_natural(){
			$sql="call Lista_cliente_natural";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devu[] = $row;
			}
			return $devu;
		}
		
		public function crear_Clientes_juridico(){
			$sql="call Lista_cliente_juridico";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devu[] = $row;
			}
			return $devu;
		}
		
	}
?>