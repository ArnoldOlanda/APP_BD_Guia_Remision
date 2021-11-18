<?php

	class Guia_remision {
		private $db;
		

		public function __construct(){
			$this->db = BD::crearInstancia();
			
		}
		public function get_guiaRemisionTodo()
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaRemision as SELECT * FROM Guia_Remision]
			$sql = "EXECUTE Lista_GuiaRemision";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
		}
		public function get_guiaRemisionNroGuia($GuiaNumero)
		{
			//ESTOS ES LO QUE VA EN LA BASE DE DATOS[Create procedure Lista_GuiaNroGuia @codigo char(11) as select * from Guia_Remision where Nro_Guia = @codigo]
			$resultado = $this->db->preparate("EXECUTE Lista_GuiaNroGuia '"+$GuiaNumero+"'");
			$resultado->execute($resultado,[$GuiaNumero]);
			while ($row = $resultado->fetch_assoc()) 
			{
				$Guia_remision[] = $row;
			}
			return $Guia_remision;
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
		public function get_guiaRemisionPorNombre($BoletaN)
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
		public function get_guiaRemisionporFecha(yy,zz)
		{
			$sql = "select * from Guia_Remision g inner join Cliente_Natural c on g.Dni_Cliente = c.DNI where c.Apellidos='"+ape+"'";
			$resultado = $this->db->query($sql);
			while ($row = $resultado->fetch_assoc()) 
			{
				$this ->Guia_remision[] = $row;
			}
			return $this->Guia_remision;
		}


	}


?>