<?php
	include_once("dbConnection.php");
	class EmpresaTransportistaModel {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function getAllEmpresaTransportista()
		{
			$data=[];
			$sql = "call sp_lista_empresa_transportista();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}
			return $data;
		}
		public function get_EmpresaTransportistaPorRUC($RUCT)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_EmpresaTransportistaPorRUC(IN RUCT char(11)) select * from empresa_transportista where RUC = RUCT;]
			$resultado = $this->db->preparate("call Lista_EmpresaTransportistaPorRUC('"+$RUCT+"')");
			$resultado->execute($resultado,[$RUCT]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuEmpreT[] = $row;
			}
			return $devuEmpreT;

		}


	}
?>