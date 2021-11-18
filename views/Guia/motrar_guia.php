<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>GUIAS</title>
</head>
<body>
    <h2>MOSTRAR GUIAS</h2>

    <table border="1" width="80%">
        <thead>
            <tr>
                <th>Nro_Guia</th>
                <th>Placa</th>
                <th>RUC</th>
               
            </tr>
        </thead>
        <tbody>
			<?php foreach($data as $dato){
				echo "<tr>";
				echo "<td>".$dato["Nro_Guia"]."</td>";
				echo "<td>".$dato["Placa"]."</td>";
				echo "<td>".$dato["RUC"]."</td>";
				echo "</tr>";
			}
					
			?>

        </tbody>
    </table>
</body>
</html>