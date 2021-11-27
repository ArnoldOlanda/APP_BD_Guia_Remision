﻿ <link rel="stylesheet" href="css/table.css">
<div id="page-head">
    <div >
        <h3 style="font-size:30px" class="pad-all text-center">Consultar Guia Por Boleta</h3>
		<form action="./?ctrl=guias&acc=boletaFiltrar" method="POST" class="form-filtro">
            </br>
            Nro Boleta: <input type="text" name="fNroBoleta" style="color:black" autocomplete="off"> 
            Fecha: <input type="month" name="fFecha" id="Fecha_Emision" style="color:black"> 
            Cliente: <select name="fCliente" style="color:black">
            <option value="" selected disabled>Seleccione un cliente</option>
            <?php 
                foreach ($dataCliente as $value) {
                    echo "<option value='".$value[0]."'>".$value[1]."</option>";
                }
            ?>
            </select>
            <button type="submit" style="color:black">Buscar</button>
        </form>
    </div>
</div>
<!--Page content-->
<div id="page-content">

    <div class="pad-all text-center">
        <table width="100%">
            <thead>
                <tr>	
					<th>Nro Guia</th>
                    <th>Boleta</th>
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
                            echo "<td>" . $dato["Numero de Boleta"] . "</td>";
                            echo "<td>" . $dato["Fecha emision"] . "</td>";
                            echo "<td>" . $dato["Cliente natural"] . "</td>";
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