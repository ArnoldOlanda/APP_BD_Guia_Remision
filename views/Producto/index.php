<?php

?>

<!DOCTYPE html>
<html>
	<head>
		<title> </title>
	</head>
	<body>
		<h2><?php echo $data["titulo"]; ?></h2>
		
		<table border ="1" width ="80%">
		<thead>
			<tr>
				<th>ID</th>
				<th>unidad de medida</th>
				<th>descripcion</th>
			</tr>
			
		</thead>
		
		<tbody>
		
		</tbody>
			<?php foreach($data["producto"] as $dato){
				echo "<tr>";
				echo "<td>".$dato["Id_Producto"]."</td>";
				echo "<td>".$dato["Unidad_Medida"]."</td>";
				echo "<td>".$dato["Descripcion"]."</td>";
				echo "</tr>";
			}
					
			?>
		
		</table>
		
	</body>
</html>