<div id="page-head">
    <div class="pad-all text-center">
        <h3 style="font-size:30px">Consultar Clientes Juridicos</h3>
        </p1>
    </div>
</div>

<!--Page content-->
<div id="page-content">

    <div class="pad-all text-center">
        <table width="100%">
            <thead>
                <tr>
                    <th>Ruc</th>
                    <th>Nombre</th>
                    <th>Direccion</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataJ as $datoj) {
                    echo "<tr>";
                    echo "<td>" . $datoj["ruc"] . "</td>";
                    echo "<td>" . $datoj["nombre_empresa"] . "</td>";
                    echo "<td>" . $datoj["direccion"] . "</td>";
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
        </p1>
    </div>

</div>