<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>GUIAS</title>
</head>

<body>
    <!-- <form action="./?ctrl=clientes&acc=listar" method="post">
        <select name="tipoCliente" id="tipoCliente">
            <option value="" disabled selected>Seleccione una opcion</option>
            <option value="1">Clientes juridicos</option>
            <option value="2">Cliente naturales</option>
        </select>
        <input type="submit" value="Ver">
    </form> -->
    <table border="1" width="80%">
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
                echo "<td>" . $daton["Nombre"] . "</td>";
                echo "<td>" . $daton["direccion"] . "</td>";
                echo "<td>" . $daton["telefono"] . "</td>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>

    <br>
	
	
  
</body>

</html>