﻿ <link rel="stylesheet" href="css/table.css">
<div id="page-head">
    <div >
        <h3 style="font-size:30px" class="pad-all text-center">Consultar Guia Por Factura</h3>
		<div style="padding: 0% 2.6%;">
		</br>
        Nro Factura: <input type="text" style="color:black"> fecha: <input type="month" id="Fecha_Emision" style="color:black"> Cliente: <input type="text"style="color:black">
		<button type="submit" form="form1" value="Submit" style="color:black">Buscar</button>
		</div>
    </div>
</div>
<!--Page content-->
<div id="page-content">

  <div class="pad-all text-center">
        <table width="100%">
            <thead>
                <tr>
                    <th>Nro Guia</th>
                    <th>Factura</th>
                    <th>Fecha emision</th>
                    <th>Cliente</th>
                    <th>Punto partida</th>
                    <th>Punto llegada</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $dato) {
                            echo "<tr>";
                            echo "<td><b><a href='./?ctrl=guias&acc=detalle&nro=".$dato['Nro_Guia']."'>".$dato["Nro_Guia"]."</a></b></td>";
                            echo "<td>" . $dato["numero_factura"] . "</td>";
                            echo "<td>" . $dato["Fecha emision"] . "</td>";
                            echo "<td>" . $dato["Cliente juridico"] . "</td>";
                            echo "<td>" . $dato["Punto partida"] . "</td>";
                            echo "<td>" . $dato["Punto llegada"] . "</td>";
                            echo "</tr>";
                        }
                        ?>

            </tbody>
        </table>
    </div>

</div>
</div>