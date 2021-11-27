 <link rel="stylesheet" href="css/table.css">
<div id="page-head">
    <div >
        <h3 style="font-size:30px" class="pad-all text-center">Guias de Remision</h3>
		<form action="./?ctrl=guias&acc=filtrar" method="POST" class="form-filtro">
            </br>
            Nro Guia: <input type="text" name="fNroGuia" style="color:black" autocomplete="off"> 
            Fecha: <input type="month" name="fFecha" id="Fecha_Emision" style="color:black"> 
            Cliente: <select name="fCliente" style="color:black">
            <option value="" selected disabled>Seleccione un cliente</option>
            <?php 
                foreach ($dataCliente as $value) {
                    echo "<option value='".$value[0]."'>".$value[1]."</option>";
                }
            ?>
            </select>
            <button type="submit" value="Submit" style="color:black">Buscar</button>
        </form>
    </div>
</div>
<div id="page-content">
    </br>
    <div class="pad-all text-center">
        <table width="100%">
        <thead>
            <tr >
                <th>Nro Guia</th>
                <th>Nro Documento</th>
                <th>Tipo de documento</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Punto partida</th>
                <th>Punto llegada</th>
            </tr>
        </thead>
        <tbody>
			<?php
                foreach($data as $dato){
                    echo "<tr>";
                    echo "<td><b><a href='./?ctrl=guias&acc=detalle&nro=".$dato['Nro_Guia']."'>".$dato["Nro_Guia"]."</a></b></td>";
                    if($dato['numero_factura']=="" && $dato['numero_boleta']!="") {
                        echo "<td>".$dato["numero_boleta"]."</td>";
                        echo "<td>Boleta</td>";
                    }
                    else if($dato['numero_boleta']=="" && $dato['numero_factura']!="") {
                        echo "<td>".$dato["numero_factura"]."</td>";
                        echo "<td>Factura</td>";
                    }
                    else{
                        echo "<td>ninguno</td>";
                        echo "<td>ninguno</td>";
                    }
                    echo "<td>".$dato["fecha_emision"]."</td>";
                    if($dato['cliente_natural']=="") echo "<td>".substr($dato["cliente_juridico"],0,25)."...</td>";
                    else if ($dato['cliente_juridico']=="") echo "<td>".substr($dato["cliente_natural"],0,25)."...</td>";
                    
                    echo "<td>".substr($dato["punto_partida"],0,30)."...</td>";
                    echo "<td>".substr($dato["punto_llegada"],0,30)."...</td>";
                    //echo "<td>".$dato["Motivo"]."</td>";
                    echo "</tr>";
                }	
			?>

        </tbody>
        </table>
    </div>
</div>

