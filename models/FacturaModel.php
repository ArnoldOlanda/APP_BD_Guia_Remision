<?php
	include_once("../dbConnection.php");
	class FacturaModel{
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
		}
		
		public function getFacturaNro($nroFactura)
		{
			$data=[];
			$resultado = $this->db->prepare("call sp_busca_factura_numero(?)");
			$resultado->execute([$nroFactura]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
		}
		// public function get_ListaFactura()
		// {
		// 	//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_Factura() select f.Nro_Factura, concat_ws( '-',f.Dia,f.Mes,f.Año) as 'Fecha', f.RUC, j.Nombre_Empresa from factura f inner join Cliente_Juridico j on f.RUC = j.RUC;]
		// 	$sql = "call Lista_Factura();";
		// 	$resultado = $this->db->query($sql);
		// 	while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
		// 	{
		// 		$devuLFactura[] = $row;
		// 	}
		// 	return $devuLFactura;
		// }

	}
?>