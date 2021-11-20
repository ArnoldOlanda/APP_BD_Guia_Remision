<?php
	include_once("dbConnection.php");
	class Guia_remision {
		private $db;
		public function __construct(){
			$this->db = BD::crearInstancia();
		}

		public function get_guiaRemisionTodo()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaRemision as SELECT * FROM Guia_Remision]
			$sql = "call Lista_GuiaRemision";
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
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaNroFactura @numeroF char(12) as select * from Guia_Remision g inner join Factura f on g.Nro_Factura = f.Nro_Factura where f.Nro_Factura = @numeroF]
			$resultado = $this->db->preparate("EXECUTE Lista_GuiaNroFactura '"+$FacturaN+"'");
			$resultado->execute($resultado,[$FacturaN]);
			while ($row = $resultado->fetch_assoc()) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionNroBoleta($BoletaN)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaNroBoleta @numeroB char(12) as select * from Guia_Remision g inner join Boleta b on g.Nro_Boleta = b.Nro_Boleta where b.Nro_Boleta = @numeroB]
			$resultado = $this->db->preparate("EXECUTE Lista_GuiaNroBoleta '"+$BoletaN+"'");
			$resultado->execute($resultado,[$BoletaN]);
			while ($row = $resultado->fetch_assoc()) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionPorNombre($NombreCli)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaPorNombreCliente @nombreCliente varchar(50) as SELECT * FROM Guia_Remision g inner join (SELECT RUC AS 'Num_doc',Nombre_Empresa AS 'Nombre' from  Cliente_juridico UNION  SELECT DNI,concat(Nombres,' ',Apellidos) FROM Cliente_Natural) c on g.RUC = c.Num_doc where c.Nombre like ('%'+@nombreCliente+'%');]
			$resultado = $this->db->preparate("EXECUTE Lista_GuiaPorNombreCliente '"+$NombreCli+"'");
			$resultado->execute($resultado,[$NombreCli]);
			while ($row = $resultado->fetch_assoc()) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionPorConductor($NombreCon)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaPorConductor @nombresConductor varchar(40) as SELECT * FROM Guia_Remision g inner join (select concat(Apellidos,' ', Nombres) as nombreC,Licencia_Conducir from Transportista) c on g.Nro_Licencia = c.Licencia_Conducir where c.nombreC like ('%'+@nombresConductor+'%');]
			$resultado = $this->db->preparate("EXECUTE Lista_GuiaPorConductor '"+$NombreCon+"'");
			$resultado->execute($resultado,[$NombreCon]);
			while ($row = $resultado->fetch_assoc()) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionporFecha($anno,$mes)
		{
			//$sql = "select * from Guia_Remision g inner join Cliente_Natural c on g.Dni_Cliente = c.DNI where c.Apellidos='"++"'";
			//$resultado = $this->db->query($sql);
			//while ($row = $resultado->fetch_assoc()) 
			//{
			//	$this ->Guia_remision[] = $row;
			//}
			return $this->Guia_remision;
		}



	}


?>