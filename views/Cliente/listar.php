<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>GUIAS</title>
</head>
<body>
    
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
			<?php foreach($dataN as $daton){
				echo "<tr>";
				echo "<td>".$daton["dni"]."</td>";
				echo "<td>".$daton["Nombre"]."</td>";
				echo "<td>".$daton["direccion"]."</td>";
				echo "<td>".$daton["telefono"]."</td>";
				echo "</tr>";
			}
					
			?>

        </tbody>
    </table>
	
	<br>
	<table border="1" width="80%">
        <thead>
            <tr>
                <th>Ruc</th>
                <th>Nombre</th>
                <th>Direccion</th>
               
            </tr>
        </thead>
        <tbody>
			<?php foreach($dataJ as $datoj){
				echo "<tr>";
				echo "<td>".$datoj["ruc"]."</td>";
				echo "<td>".$datoj["nombre_empresa"]."</td>";
				echo "<td>".$datoj["direccion"]."</td>";
				echo "</tr>";
			}
					
			?>

        </tbody>
    </table>
</body>
</html>