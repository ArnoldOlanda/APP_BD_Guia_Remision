<div id="page-head">
    <div class="pad-all text-center">
        <h3 style="font-size:30px">Consultar Productos</h3>
        <br>
    </div>
</div>
<div id="page-content">
    <div class="pad-all text-center">
        <table width="100%">
        <thead>
            <tr>
                <th>Nro Guia</th>
                <th>Nro Documento</th>
                <th>Tipo de documento</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Punto partida</th>
                <th>Punto llegada</th>
                <!-- <th>Motivo</th> -->
               
            </tr>
        </thead>
        <tbody>
			<?php foreach($data as $dato){
                    echo "<tr>";
                    echo "<td><b><a href='./?ctrl=guias&acc=detalle&nro=".$dato['Nro_Guia']."'>".$dato["Nro_Guia"]."</a></b></td>";
                    if($dato['Nro_Factura']=="" && $dato['Numero de Boleta']!="") {
                        echo "<td>".$dato["Numero de Boleta"]."</td>";
                        echo "<td>Boleta</td>";
                    }
                    else if($dato['Numero de Boleta']=="" && $dato['Nro_Factura']!="") {
                        echo "<td>".$dato["Nro_Factura"]."</td>";
                        echo "<td>Factura</td>";
                    }
                    else{
                        echo "<td>ninguno</td>";
                        echo "<td>ninguno</td>";
                    }
                    echo "<td>".$dato["Fecha emision"]."</td>";
                    if($dato['Cliente natural']=="") echo "<td>".substr($dato["Cliente juridico"],0,25)."...</td>";
                    else if ($dato['Cliente juridico']=="") echo "<td>".substr($dato["Cliente natural"],0,25)."...</td>";
                    
                    echo "<td>".substr($dato["Punto partida"],0,30)."...</td>";
                    echo "<td>".substr($dato["Punto llegada"],0,30)."...</td>";
                    //echo "<td>".$dato["Motivo"]."</td>";
                    echo "</tr>";
                }	
			?>

        </tbody>
        </table>
    </div>
</div>

