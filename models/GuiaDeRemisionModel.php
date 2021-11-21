<?php
	include_once("dbConnection.php");
	class Guia_remision {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_guiaRemisionTodo()
		{
			$sql = "call sp_lista_guia_remision();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionBoleta()
		{
			$sql = "call sp_lista_guia_remision_boleta();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionFactura()
		{
			$sql = "call sp_lista_guia_remision_factura();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionNroGuia($GuiaNumero)
		{
			$data=[];
			$resultado = $this->db->prepare("call sp_buscar_guia_nro(?)");
			$resultado->execute([$GuiaNumero]);
			
			$Guia_remision[] = $resultado->fetch(PDO::FETCH_ASSOC);	
			$resultado->nextRowset();
			while ($row =$resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Cuerpo_guia[] = $row;
			}	
			$data[]=$Guia_remision;
			$data[]=$Cuerpo_guia;

			return $data;
		}
		public function get_guiaRemisionNroFactura($FacturaN)
		{
			$resultado = $this->db->preparate("CALL Lista_GuiaRemisionPorFactura('"+$FacturaN+"')");
			$resultado->execute($resultado,[$FacturaN]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionNroBoleta($BoletaN)
		{
			$resultado = $this->db->preparate("CALL Lista_GuiaRemisionPorBoleta('"+$BoletaN+"')");
			$resultado->execute($resultado,[$BoletaN]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionPorNombre($NombreCli)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_GuiaPorNombreCliente(IN NCliente varchar(50)) SELECT g.Nro_Guia , g.Nro_Boleta as "Numero de Boleta",g.Nro_Factura, concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision', concat_ws( '-',g.FT_Dia,g.FT_Mes,g.FT_Año) as 'Fecha traslado', concat_ws(' ',c.nombres,c.apellidos) 'Cliente natural', j.nombre_empresa 'Cliente juridico', d1.direccion 'Punto partida',d2.direccion 'Punto llegada', m.Motivo FROM guia_remision g left JOIN boleta b ON g.Nro_Boleta = b.Nro_Boleta left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo left join cliente_natural c on g.Dni_Cliente=c.DNI left join cliente_juridico j on g.RUC=j.RUC left join motivo_traslado m on g.cod_motivo_traslado=m.codigo left join factura f on g.Nro_Factura = f.Nro_Factura Where concat_ws(' ',c.nombres,c.apellidos) like concat('%',NCliente,'%') UNION SELECT g.Nro_Guia , g.Nro_Boleta as "Numero de Boleta",g.Nro_Factura, concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision', concat_ws( '-',g.FT_Dia,g.FT_Mes,g.FT_Año) as 'Fecha traslado', concat_ws(' ',c.nombres,c.apellidos) 'Cliente natural', j.nombre_empresa 'Cliente juridico', d1.direccion 'Punto partida',d2.direccion 'Punto llegada', m.Motivo FROM guia_remision g left JOIN boleta b ON g.Nro_Boleta = b.Nro_Boleta left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo left join cliente_natural c on g.Dni_Cliente=c.DNI left join cliente_juridico j on g.RUC=j.RUC left join motivo_traslado m on g.cod_motivo_traslado=m.codigo left join factura f on g.Nro_Factura = f.Nro_Factura Where j.nombre_empresa like concat('%',NCliente,'%');]
			$resultado = $this->db->preparate("CALL Lista_GuiaPorNombreCliente('"+$NombreCli+"')");
			$resultado->execute($resultado,[$NombreCli]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionPorConductor($NombreCon)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_GuiaPorConductor(IN NConductor varchar(50) ) SELECT g.Nro_Guia , g.Nro_Boleta as "Numero de Boleta",g.Nro_Factura, concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision', concat_ws( '-',g.FT_Dia,g.FT_Mes,g.FT_Año) as 'Fecha traslado', concat_ws(' ',c.nombres,c.apellidos) 'Cliente natural', concat_ws(' ', t.Nombres,t.Apellidos) 'Conductor', j.nombre_empresa 'Cliente juridico', d1.direccion 'Punto partida',d2.direccion 'Punto llegada', m.Motivo FROM guia_remision g  left JOIN boleta b ON g.Nro_Boleta = b.Nro_Boleta left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo left join cliente_natural c on g.Dni_Cliente=c.DNI left join cliente_juridico j on g.RUC=j.RUC left join motivo_traslado m on g.cod_motivo_traslado=m.codigo left join factura f on g.Nro_Factura = f.Nro_Factura left join transportista t on g.Nro_Licencia = t.Licencia_Conducir where concat_ws(' ', t.Nombres,t.Apellidos) like concat('%',NConductor,'%');]
			$resultado = $this->db->preparate("CALL Lista_GuiaPorConductor('"+$NombreCon+"')");
			$resultado->execute($resultado,[$NombreCon]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionporFecha($mes,$anno)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[create procedure Lista_GuiaPorMesAño(In FMes char(2), Faño char(4) ) SELECT g.Nro_Guia , g.Nro_Boleta as "Numero de Boleta",g.Nro_Factura, concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision', concat_ws( '-',g.FT_Dia,g.FT_Mes,g.FT_Año) as 'Fecha traslado', concat_ws(' ',c.nombres,c.apellidos) 'Cliente natural', concat_ws(' ', t.Nombres,t.Apellidos) 'Conductor', j.nombre_empresa 'Cliente juridico', d1.direccion 'Punto partida',d2.direccion 'Punto llegada', m.Motivo FROM guia_remision g  left JOIN boleta b ON g.Nro_Boleta = b.Nro_Boleta left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo left join cliente_natural c on g.Dni_Cliente=c.DNI left join cliente_juridico j on g.RUC=j.RUC left join motivo_traslado m on g.cod_motivo_traslado=m.codigo left join factura f on g.Nro_Factura = f.Nro_Factura left join transportista t on g.Nro_Licencia = t.Licencia_Conducir where g.FE_Mes = FMes  and g.FE_Año = Faño;
			$resultado = $this->db->preparate("CALL Lista_GuiaPorMesAño ('"+$mes+"','"+$anno+"')");
			$resultado->execute($resultado,[$mes,$anno]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$this ->Guia_remision[] = $row;
			}
			return $this->Guia_remision;
		}



	}


?>