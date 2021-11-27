<?php
	include_once("dbConnection.php");
	class DireccionesModel {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
		}


		public function getAllDirecciones()
		{
			$data=[];
			$sql = "call sp_lista_direcciones();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}
			return $data;
		}
		public function createDireccion($direc)
		{
			$resultado=$this->db->prepare("call sp_insertar_direccion(?)");
			$resultado->execute([$direc]);
		}
		
		public function updateDireccion($dni,$direc){
			$resultado=$this->db->prepare("call sp_actualizar_direccion(?,?)");
			$resultado->execute([$dni,$direc]);
		}

		public function updateDireccion_juridico($cod_direc,$direc){
			$resultado=$this->db->prepare("call sp_actualizar_direccion_juridico(?,?)");
			$resultado->execute([$cod_direc,$direc]);
		}

		public function relacionarDireccion_juridico($ruc){
			
			$resultado=$this->db->prepare("call sp_relacionar_direccion_juridico(?)");
			$resultado->execute([$ruc]);
		}
		
		public function deleteDireccion($cod){
			$resultado=$this->db->prepare("call sp_eliminar_direccion(?)");
			$resultado->execute([$cod]);
		}		
	}
?>