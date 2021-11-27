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
		
		public function createCliente_Juridico($ruc,$nomb){
			$resultado=$this->db->prepare("call sp_insertar_cliente_juridico(?,?)");
			$resultado->execute([$ruc,$nomb]);

		}
		public function updateCliente_Juridico($ruc,$direc,$nomb){
			$resultado=$this->db->prepare("call sp_actualizar_cliente_juridico(?,?,?)");
			$resultado->execute([$ruc,$direc,$nomb]);
		}
		public function deleteCliente_Juridico($id){
			$resultado=$this->db->prepare("call sp_eliminar_cliente_juridico(?)");
			$resultado->execute([$id]);
		}

		public function get_cliente_juridico($ruc)
		{
			$data=[];
			$cliente=[];
			$resultado = $this->db->prepare("call sp_buscar_cliente_juridico_ruc(?)");
			$resultado->execute([$ruc]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$cliente[] = $row;
			}
			
			$data[]=$cliente;
			
			$detalle=[];
			$resultado = $this->db->prepare("call sp_lista_direccion_cliente_juridico_ruc(?)");
			$resultado->execute([$ruc]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$detalle[] = $row;
			}
			
			
			$data[]=$detalle;

			return $data;
		}
	}
?>