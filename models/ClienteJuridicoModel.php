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
		
		public function createCliente_Juridico($unid,$desc){
			$resultado=$this->db->prepare("call sp_insertar_producto(?,?)");
			$resultado->execute([$unid,$desc]);

		}
		public function updateCliente_Juridico($id,$unid,$desc){
			$resultado=$this->db->prepare("call sp_actualizar_producto(?,?,?)");
			$resultado->execute([$unid,$desc,$id]);
		}
		public function deleteCliente_Juridico($id){
			$resultado=$this->db->prepare("call sp_eliminar_producto(?)");
			$resultado->execute([$id]);
		}

	}
?>