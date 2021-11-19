<?php
	include_once("dbConnection.php");
	class Cliente_Juridico {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_ListaCliente_Juridico()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_ClienteJuridico() select j.RUC, d.Codigo, j.Nombre_Empresa, d.Direccion from Cliente_Juridico j  inner join Direcciones d on j.Cod_Domicilio_Fiscal = d.codigo;]
			$sql = "call Lista_ClienteJuridico();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuCliJuri[] = $row;
			}
			return $devuCliJuri;
		}
		public function get_ListaCliente_JuridicoPorRUC($RUCJ)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_ClienteJuridicoPorRUCJ(IN RUCJ char(11)) select j.RUC, d.Codigo, j.Nombre_Empresa, d.Direccion from Cliente_Juridico j inner join Direcciones d on j.Cod_Domicilio_Fiscal = d.codigo where j.RUC = RUCJ;]
			$resultado = $this->db->preparate("call Lista_ClienteJuridicoPorRUCJ('"+$RUCJ+"');");
			$resultado->execute($resultado,[$RUCJ]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuCliJuri[] = $row;
			}
			return $devuCliJuri;
		}

	}
?>