<?php
	include_once("dbConnection.php");
	class Direccion_Cliente_Juridico {
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
		public function get_ListaDireccion_Cliente_JuridicoPorRUC($RUCD)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_DireccionCliJuridicoRUC(IN RUCD char(11)) select j.RUC, j.Cod_Direccion, d.Direccion from direcciones_cliente_juridico j inner join direcciones d on j.Cod_Direccion = d.codigo where RUC = RUCD;]
			$resultado = $this->db->preparate("call Lista_DireccionCliJuridicoRUC('"+$RUCD+"');");
			$resultado->execute($resultado,[$RUCD]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuDireccionCliJuri[] = $row;
			}
			return $devuDireccionCliJuri;
		}

	}
?>