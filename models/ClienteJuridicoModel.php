<?php
	include_once("dbConnection.php");
	class Cliente_Juridico {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_ListaCliente_Juridico()
		{
			$sql = "call sp_lista_cliente_juridico();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuCliJuri[] = $row;
			}
			return $devuCliJuri;
		}
		public function get_ListaCliente_JuridicoPorRUC($RUCJ)
		{
			$resultado = $this->db->preparate("call sp_buscar_cliente_juridico_ruc(?);");
			$resultado->execute([$RUCJ]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuCliJuri[] = $row;
			}
			return $devuCliJuri;
		}
		
		public function crear_Clientes_juridico(){
			$sql="call sp_insertar_cliente_juridico(?,?,?)";
			$resultado=$this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devu[] = $row;
			}
			return $devu;
		}

	}
?>