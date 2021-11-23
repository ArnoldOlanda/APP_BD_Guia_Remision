
<?php
//echo var_dump($result[1]);
?>
<div id="page-head">
    <div >
        <h3 style="font-size:30px" class="pad-all text-center">Detalle Guia de remision</h3>
		
    </div>
</div>


<div class="container-g">
   	<br>
	<br>
	<br>
	<br>
	
        <?php foreach ($result[0] as $data) {
            echo "<a href='./?ctrl=guias&acc=listar'>Volver</a>";
            echo "<h3>Guia Nro: ".$data['Nro_Guia']."</h3>";
            echo "<div class='grid-container-g'>";
            echo "<div class='grid-item-g'><b>Fecha de emision:</b><br>" . $data['Fecha emision'] . "</div>";
            echo "<div class='grid-item-g'><b>Fecha de traslado:</b><br>" . $data['Fecha traslado'] . "</div>";
            if ($data['dni_cliente'] != "") {
                echo "<div class='grid-item-g'><b>Nro de DNI del cliente:</b><br>" . $data['dni_cliente'] . "</div>";
                echo "<div class='grid-item-g'><b>Nombre del cliente:</b><br>" . $data['Cliente natural']."</div>";
            }
            if ($data['ruc'] != "") {
                echo "<div class='grid-item-g'><b>RUC de la empresa/cliente:</b><br>" . $data['ruc'] . "</div>";
                echo "<div class='grid-item-g'><b>Nombre de la empresa/cliente:</b><br>" . $data['Cliente juridico'] . "</div>";
            }
            echo "<div class='grid-item-g'><b>Punto de partida:</b><br>" . $data['Punto partida'] . "</div>";
            echo "<div class='grid-item-g'><b>Punto de llegada:</b><br>" . $data['Punto llegada'] . "</div>";
            echo "<div class='grid-item-g'>";
            echo "<table border='1'><tr><th>Producto</th><th>Unidad medida</th><th>Cantidad</th><th>Peso</th></tr>";
            foreach ($result[1] as $detalle) {
                echo "<tr><td>".$detalle['descripcion']."</td>";
                echo "<td>".$detalle['unidad_medida']."</td>";
                echo "<td>".$detalle['cantidad']."</td>";
                echo "<td>".$detalle['peso']."</td></tr>";
            }
            echo "</table></div>";
            if ($data['Nro_licencia'] != "") {
                echo "<div class='grid-item-g'><b>Nro de licencia:</b><br>" . $data['Nro_licencia'] . "</div>";
                echo "<div class='grid-item-g'><b>Nombre del conductor:</b><br>" . $data['chofer'] . "</div>";
            }
            if($data['placa']!=""){
                echo "<div class='grid-item-g'><b>Placa del vehiculo:</b><br>" . $data['placa'] . "</div>";
                echo "<div class='grid-item-g'><b>Marca del vehiculo:</b><br>" . $data['marca'] . "</div>";
            }
            if($data['ruc_transportista']!=""){
                echo "<div class='grid-item-g'><b>RUC empresa transportista:</b><br>" . $data['ruc_transportista'] . "</div>";
                echo "<div class='grid-item-g'><b>Nombre empresa transportista:</b><br>" . $data['nombre_transportista'] . "</div>";
            }
            echo "<div class='grid-item-g'><b>Tipo de comprobante:</b><br>" . $data['tipo'] . "</div>";
            if($data['Numero de Boleta']!="") echo "<div class='grid-item-g'><b>Numero de boleta:</b><br>" . $data['Numero de Boleta'] . "</div>";
            if($data['Nro_Factura']!="")echo "<div class='grid-item-g'><b>Numero de factura:</b><br>" . $data['Nro_Factura'] . "</div>";
            echo "<div class='grid-item-g'><b>Motivo de traslado:</b><br>" . $data['Motivo'] . "</div>";

            if($data['firma_responsable']==1)echo "<div class='grid-item-g'><b>Firma del responsable:</b><br>SI</div>";
            else echo "<div class='grid-item-g'><b>Firma del responsable:</b><br>NO</div>";
            if($data['firma_cliente']==1)echo "<div class='grid-item-g'><b>Firma del cliente:</b><br>SI</div>";
            else echo "<div class='grid-item-g'><b>Firma del cliente:</b><br>NO</div>";
            if($data['nombre_conf_cliente']=="") echo "<div class='grid-item-g'><b>Nombre de quien confirma:</b><br>N/A</div>";
            else echo "<div class='grid-item-g'><b>Nombre de quien confirma:</b><br>".$data['nombre_conf_cliente']."</div>";
                        echo "</div>";
        }
        ?>
    
</div>