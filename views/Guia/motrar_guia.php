<body>
    <h3>Guias de remision</h3>

    <table width="100%">
        <thead>
            <tr>
                <th>Nro Guia</th>
                <th>Boleta</th>
                <th>Factura</th>
                <th>Fecha emision</th>
                <th>Fecha traslado</th>
                <th>Cliente natural</th>
                <th>Cliente juridico</th>
                <th>Punto partida</th>
                <th>Punto llegada</th>
                <th>Motivo</th>
               
            </tr>
        </thead>
        <tbody>
			<?php foreach($data as $dato){
                    echo "<tr>";
                    echo "<td>".$dato["Nro_Guia"]."</td>";
                    echo "<td>".$dato["Numero de Boleta"]."</td>";
                    echo "<td>".$dato["Nro_Factura"]."</td>";
                    echo "<td>".$dato["Fecha emision"]."</td>";
                    echo "<td>".$dato["Fecha traslado"]."</td>";
                    echo "<td>".$dato["Cliente natural"]."</td>";
                    echo "<td>".$dato["Cliente juridico"]."</td>";
                    echo "<td>".$dato["Punto partida"]."</td>";
                    echo "<td>".$dato["Punto llegada"]."</td>";
                    echo "<td>".$dato["Motivo"]."</td>";
                    echo "</tr>";
                }	
			?>

        </tbody>
    </table>
</body>
