﻿ <link rel="stylesheet" href="css/table.css">
<div id="page-head">
    <div class="pad-all text-center">
        <h3 style="font-size:30px">Consultar Clientes Juridicos</h3>
        </p1>
    </div>
</div>

<!--Page content-->
<div id="page-content">
</br>
    <div class="pad-all text-center">
        <table width="100%">
            <thead>
                <tr>
                    <th>Ruc</th>
                    <th>Nombre</th>
                    <th>Direccion Domicilio fiscal</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataJ as $datoj) {
                    echo "<tr>";
					echo "<td><b><a href='./?ctrl=clientes&acc=detalle&nro=".$datoj['ruc']."'>".$datoj["ruc"]."</a></b></td>";
                  
                    echo "<td>" . $datoj["nombre_empresa"] . "</td>";
                    echo "<td>" . $datoj["direccion"] . "</td>";
					echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
					echo "<button class='btn btnDeleteRow'>Eliminar</button>";
					echo "<input type=hidden value='" . $datoj['ruc'] . "_" . $datoj['nombre_empresa'] . "_" . $datoj['direccion'] ."'></td>";
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
        <button id="btnOpenModal" class="btn">Nuevo</button>
    </div>

</div>
<input type="hidden" id="nameForm" value="">
<div class="modal-background">
    <input type="hidden" id="modalPara" value="juridico">
	
</div>
