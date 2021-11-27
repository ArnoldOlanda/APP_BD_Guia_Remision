 <link rel="stylesheet" href="css/table.css">
    <div id="page-head">
        <div class="pad-all text-center">
            <h3 style="font-size:30px">Detalle Cliente Juridico</h3>
            </p1>
        </div>
    </div>
    
    <!--Page content-->
    <div id="page-content">
		</br>
        </br>
		</br>
			<?php foreach ($result[0] as $data) {
			echo "<a href='./?ctrl=clientes&acc=listar_Juridico'>Volver</a>";
			echo "<h3>RUC: <span id='ruc_cli'>".$data['RUC']." </span></h3>";
			echo "<p>Nombre: ".$data['Nombre_Empresa']."</p></br>";
			echo "<p>Direccion Domicio fiscal: ".$data['Direccion']."</p>";
			}
			
		?>
			
		 
		<div class="pad-all text-center">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Direcciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result[1] as $detalle) {
                        echo "<tr>";
                        echo "<td>" . $detalle["direccion"] . "</td>";
						echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
						echo "<button class='btn btnDeleteRow'>Eliminar</button>";
						echo "<input type=hidden value='" . $detalle['ruc'] . "_" . $detalle['codigo'] . "_" . $detalle['direccion'] ."'></td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
           <button id="btnOpenModal" class="btn">Nuevo</button>
        </div>

    </div>
<div class="modal-background">
    <input type="hidden" id="modalPara" value="detalleJuridico">
	
</div>


