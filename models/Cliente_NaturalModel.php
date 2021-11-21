<?php
	include_once("dbConnection.php");
	class Cliente_NaturalModel{
		private $db;
		
		public function __construct(){
			$this->db = BD::crearInstancia();
		}
		public function get_Clientes_Naturales(){
			$sql="call sp_lista_cliente_natural()";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$devu[] = $row;
			}
			return $devu;
		}
		public function get_Cliente_Natural_Epecifico($Num_DNI){
			$resultado = $this->db->preparate("call sp_buscar_cliente_natural_dni(?);");
			$resultado->execute([$Num_DNI]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$devu[] = $row;
			}
			return $devu;
		}
		public function crear_Clientes_natural(){
			$sql="call sp_insertar_cliente_natural(?,?,?,?,?)";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devu[] = $row;
			}
			return $devu;
		}
		
			
	}
?>