<?php
	include_once("./dbConnection.php");
	class Guia_remision {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function ingresarGuia($nroGuia,$feAnio,$feDia,$feMes,$ftAnio,$ftDia,$ftMes,$ptoPartida,$ptoLlegada,$nroLicencia,
		$nroPlaca,$rucTransp,$tipoComp,$motivoT,$firmaRes,$firmaCli,$confClie,$nroFac,$nroBol,$rucj,$dni,$dataProductos){
			
			if($tipoComp=='1'){
				if($nroGuia=="" || $nroPlaca=="" || $rucTransp==""){
					$ingresoGuia=$this->db->prepare("call sp_ingresar_guia(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$ingresoGuia->execute([$nroGuia,$feAnio,$feDia,$feMes,$ftAnio,$ftDia,$ftMes,$ptoPartida,$ptoLlegada,NULL,NULL,NULL,
				$tipoComp,$motivoT,$firmaRes,$firmaCli,$confClie,$nroFac,NULL,$rucj,NULL]);
				}else{
					$ingresoGuia=$this->db->prepare("call sp_ingresar_guia(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$ingresoGuia->execute([$nroGuia,$feAnio,$feDia,$feMes,$ftAnio,$ftDia,$ftMes,$ptoPartida,$ptoLlegada,$nroLicencia,$nroPlaca,$rucTransp,
				$tipoComp,$motivoT,$firmaRes,$firmaCli,$confClie,$nroFac,NULL,$rucj,NULL]);
				}
				$ingresoGuia->closeCursor();
			}else if($tipoComp=='2'){
				if($nroGuia=="" || $nroPlaca=="" || $rucTransp==""){
					$ingresoGuia=$this->db->prepare("call sp_ingresar_guia(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$ingresoGuia->execute([$nroGuia,$feAnio,$feDia,$feMes,$ftAnio,$ftDia,$ftMes,$ptoPartida,$ptoLlegada,NULL,NULL,NULL,
				$tipoComp,$motivoT,$firmaRes,$firmaCli,$confClie,NULL,$nroBol,NULL,$dni]);
				}else{
					$ingresoGuia=$this->db->prepare("call sp_ingresar_guia(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$ingresoGuia->execute([$nroGuia,$feAnio,$feDia,$feMes,$ftAnio,$ftDia,$ftMes,$ptoPartida,$ptoLlegada,$nroLicencia,$nroPlaca,$rucTransp,
					$tipoComp,$motivoT,$firmaRes,$firmaCli,$confClie,NULL,$nroBol,NULL,$dni]);
				}
				$ingresoGuia->closeCursor();
			}
			foreach ($dataProductos as $value) {
				$ingresoDetalle=$this->db->prepare("call sp_ingresar_cuerpo_guia(?,?,?,?,?)");
				$ingresoDetalle->execute([$nroGuia,$value[0],$value[1],$value[2],$nroPlaca]);
			}
			
		}
		public function getAllGuias()
		{
			$sql = "call sp_lista_guia_remision();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function getGuiasBoleta()
		{
			$sql = "call sp_lista_guia_remision_boleta();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function getGuiasFactura()
		{
			$sql = "call sp_lista_guia_remision_factura();";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function getGuiaFiltroNroGuia($nro_guia){
			$data=[];
			$resultado=$this->db->prepare("call sp_lista_guia_remision_filtro_nro_guia(?)");
			$resultado->execute([$nro_guia]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}
			return $data;
			
		}
		public function getGuiasFiltroFecha($mes,$anio){
			$data=[];
			$resultado=$this->db->prepare("call sp_lista_guia_remision_filtro_fecha(?,?)");
			$resultado->execute([$mes,$anio]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}

			return $data;
		}
		public function getGuiasFiltroClienteNatural($dni){
			$data=[];
			$resultado=$this->db->prepare("call sp_lista_guia_remision_filtro_cliente_natural(?)");
			$resultado->execute([$dni]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}

			return $data;
		}
		public function getGuiasFiltroClienteJuridico($ruc){
			$data=[];
			$resultado=$this->db->prepare("call sp_lista_guia_remision_filtro_cliente_juridico(?)");
			$resultado->execute([$ruc]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}

			return $data;
		}
		public function getGuiasFiltroFechaClienteNatural($mes,$anio,$dni){
			$data=[];
			$resultado=$this->db->prepare("call sp_lista_guia_remision_filtro_fecha_cliente_juridico(?,?,?)");
			$resultado->execute([$mes,$anio,$dni]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}

			return $data;
		}
		public function getGuiasFiltroFechaClienteJuridico($mes,$anio,$ruc){
			$data=[];
			$resultado=$this->db->prepare("call sp_lista_guia_remision_filtro_fecha_cliente_juridico(?,?,?)");
			$resultado->execute([$mes,$anio,$ruc]);

			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}

			return $data;
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
		
		public function getGuiaFacturaFiltroNroFactura($FacturaN)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_factura_filtro_nro_factura(?)");
			$resultado->execute([$FacturaN]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		public function getGuiasFacturaFiltroFecha($mes,$anio)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_factura_filtro_fecha(?,?)");
			$resultado->execute([$mes,$anio]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		public function getGuiasFacturaFiltroCliente($ruc)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_factura_filtro_cliente(?)");
			$resultado->execute([$ruc]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}

		public function getGuiasFacturaFiltroFechaCliente($mes,$anio,$ruc)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_factura_filtro_fecha_cliente(?,?,?)");
			$resultado->execute([$mes,$anio,$ruc]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		public function getGuiaBoletaFiltroNroBoleta($BoletaN)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_boleta_filtro_nro_boleta(?)");
			$resultado->execute([$BoletaN]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function getGuiasBoletaFiltroFecha($mes,$anio)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_boleta_filtro_fecha(?,?)");
			$resultado->execute([$mes,$anio]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		public function getGuiasBoletaFiltroCliente($dni)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_boleta_filtro_cliente(?)");
			$resultado->execute([$dni]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		public function getGuiasBoletaFiltroFechaCliente($mes,$anio,$dni)
		{
			$result=[];
			$resultado = $this->db->prepare("CALL sp_lista_guia_remision_boleta_filtro_fecha_cliente(?,?,?)");
			$resultado->execute([$mes,$anio,$dni]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
			return $result;
		}
		
	}


?>