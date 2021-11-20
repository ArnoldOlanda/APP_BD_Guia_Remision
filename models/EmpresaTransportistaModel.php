<?php
	include_once("dbConnection.php");
	class Empresa_Transportista {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_EmpresaTransportista()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_EmpresaTransportista() select * from Empresa_Transportista;]
			$sql = "call Lista_EmpresaTransportista();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuEmpreT[] = $row;
			}
			return $devuEmpreT;
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