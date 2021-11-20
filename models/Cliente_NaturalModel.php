<?php
	include_once("dbConnection.php");
	class Cliente_NaturalModel{
		private $db;
		
		public function __construct(){
			$this->db = BD::crearInstancia();
		}
		public function get_Clientes_Naturales(){
			$sql="call Lista_ClienteNatural()";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$devu[] = $row;
			}
			return $devu;
		}
		public function get_Cliente_Natural_Epecifico($Num_DNI){
			$resultado = $this->db->preparate("call Consulta_ClienteNaturalEspecifico('"+$Num_DNI+"');");
			$resultado->execute($resultado,[$Num_DNI]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$devu[] = $row;
			}
			return $devu;
		}	
	}
?>