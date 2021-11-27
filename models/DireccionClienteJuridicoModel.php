<?php
	include_once("../dbConnection.php");
	class DireccionesJuridicoNaturalModel {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}

		public function get_ListaDireccion_Cliente_Juridico()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_DireccionCliJuridico() select * from direcciones_cliente_juridico;]
			$sql = "call Lista_DireccionCliJuridico();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuDireccionCliJuri[] = $row;
			}
			return $devuDireccionCliJuri;
		}
		public function getDireccionesClienteJuridicoRUC($RUCD)
		{
			$result=[];
			$resultado = $this->db->prepare("call sp_lista_direccion_cliente_juridico_ruc(?);");
			$resultado->execute([$RUCD]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		public function getDireccionesClienteNaturalDni($dni)
		{
			$result=[];
			$resultado = $this->db->prepare("call sp_buscar_direccion_cliente_natural_dni(?);");
			$resultado->execute([$dni]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		

	}
?>