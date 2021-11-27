<body>
	<div class="head">
		<h2>Productos</h2>
		<button id="btnOpenModal" class="btn">Nuevo</button>
	</div>

	<table border="1" width="80%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Unidad de medida</th>
				<th>Descripcion</th>
				<th>Acciones</th>
			</tr>

		</thead>

		<tbody>

		</tbody>
		<?php foreach ($result as $dato) {
			echo "<tr>";
			echo "<td>" . $dato["Id_Producto"] . "</td>";
			echo "<td>" . $dato["Unidad_Medida"] . "</td>";
			echo "<td>" . $dato["Descripcion"] . "</td>";
			echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
			echo "<a href='./?ctrl=productos&acc=eliminar&id=" . $dato["Id_Producto"] . "'>Eliminar</a>";
			echo "<input type=hidden value='".$dato['Id_Producto']."-".$dato['Unidad_Medida']."-".$dato['Descripcion']."'></td>";
			echo "</tr>";
		}
		?>

	</table>
	<div class="modal-background">
		<form action="./?ctrl=productos&acc=createOrModify" method="post" class="modal-container">
			<div class="modal-title">
				<h3 id="titleModal">Nuevo producto</h3>
			</div>
			<div class="modal-body">
				<input type="text" name="unidadMedida" id="unidadMedida" placeholder="unidad de medida" autocomplete="off">
				<input type="text" name="descripcion" id="descripcion" placeholder="descripcion" autocomplete="off">
				<input type="hidden" name="idProd" id="idProd" value="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn" id="btnCloseModal">Cancelar</button>
				<button type="submit" class="btn" id="btnSubmitData">Registrar</button>
			</div>
		</form>
	</div>
</body>
