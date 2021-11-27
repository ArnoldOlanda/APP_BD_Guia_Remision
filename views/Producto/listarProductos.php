 <link rel="stylesheet" href="css/table.css">
<div id="page-head">
    <div class="pad-all text-center">
        <h3 style="font-size:30px">Consultar Productos</h3>
        
    </div>
</div>
<!--Page content-->
<div id="page-content">
</br>
    <div class="pad-all text-center">
        <table width="100%" id="table-productos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unidad de medida</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>
           
            <?php foreach ($result as $dato) {
                echo "<tr>";
                echo "<td>" . $dato["Id_Producto"] . "</td>";
                echo "<td>" . $dato["Unidad_Medida"] . "</td>";
                echo "<td>" . $dato["Descripcion"] . "</td>";
                echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
                echo "<button class='btn btnDeleteRow'>Eliminar</button>";
                echo "<input type=hidden value='" . $dato['Id_Producto'] . "_" . $dato['Unidad_Medida'] . "_" . $dato['Descripcion'] . "'></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
		<button id="btnOpenModal" class="btn" >Nuevo</button>
    </div>
</div>
<input type="hidden" id="nameForm" value="">
<div class="modal-background">
    <input type="hidden" id="modalPara" value="productos">
</div>