<?php
	include_once("dbConnection.php");
	class Factura {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_ListaFactura()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_Factura() select f.Nro_Factura, concat_ws( '-',f.Dia,f.Mes,f.Año) as 'Fecha', f.RUC, j.Nombre_Empresa from factura f inner join Cliente_Juridico j on f.RUC = j.RUC;]
			$sql = "call Lista_Factura();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuLFactura[] = $row;
			}
			return $devuLFactura;
		}
		public function get_ListaFacturaPorNumero($FacturaN)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_FacturaPorNum(IN NumeroF char(12)) select f.Nro_Factura, concat_ws( '-',f.Dia,f.Mes,f.Año) as 'Fecha', f.RUC, j.Nombre_Empresa from factura f inner join Cliente_Juridico j on f.RUC = j.RUC where f.Nro_Factura = NumeroF;]
			$resultado = $this->db->preparate("call Lista_FacturaPorNum('"+$FacturaN+"');");
			$resultado->execute($resultado,[$FacturaN]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$devuLFactura[] = $row;
			}
			return $devuLFactura;
		}

	}
?>