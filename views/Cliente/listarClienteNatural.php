
    <div id="page-head">
        <div class="pad-all text-center">
            <h3 style="font-size:30px">Consultar Clientes Naturales</h3>
            </p1>
        </div>
    </div>
    
    <!--Page content-->
    <div id="page-content">

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
                        echo "<td>" . $daton["nombre"] . "</td>";
                        echo "<td>" . $daton["direccion"] . "</td>";
                        echo "<td>" . $daton["telefono"] . "</td>";
                        echo "</tr>";
                    }

                    ?>

                </tbody>
            </table>
            </p1>
        </div>

    </div>

