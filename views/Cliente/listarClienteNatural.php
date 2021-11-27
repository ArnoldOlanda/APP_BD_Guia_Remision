 <link rel="stylesheet" href="css/table.css">
    <div id="page-head">
        <div class="pad-all text-center">
            <h3 style="font-size:30px">Consultar Clientes Naturales</h3>
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
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>

                    </tr>
                </thead>
                <tbody>
					
                    <?php foreach ($dataN as $daton) {
                        echo "<tr>";
                        echo "<td>" . $daton["dni"] . "</td>";
                        echo "<td>" . $daton["nombres"] . " " . $daton["apellidos"] . "</td>";
                        echo "<td>" . $daton["direccion"] . "</td>";
                        echo "<td>" . $daton["telefono"] . "</td>";
						echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
						echo "<button class='btn btnDeleteRow'>Eliminar</button>";
						echo "<input type=hidden value='" . $daton['dni'] . "_" . $daton['apellidos'] . "_" . $daton['nombres'] . "_" . $daton['direccion'] ."_" . $daton['telefono'] ."'></td>";
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
    <input type="hidden" id="modalPara" value="natural">
		
</div>

