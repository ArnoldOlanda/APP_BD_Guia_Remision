 <link rel="stylesheet" href="css/table.css">
 <div id="page-head">
     <div class="pad-all text-center">
         <h3 style="font-size:30px">Consultar Vehiculos</h3>

     </div>
 </div>
 <!--Page content-->
 <div id="page-content">
     </br>
     </br>
     <div class="pad-all text-center">
         <table width="100%">
             <thead>
                 <tr>
                     <th>Placa</th>
                     <th>Marca</th>
                     <th>Nro Constancia Inscripcion</th>
                 </tr>
             </thead>

             <tbody>

                 <?php
                    //echo var_dump($result);
                    foreach ($result as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato["Placa"] . "</td>";
                        echo "<td>" . $dato["Marca"] . "</td>";
                        echo "<td>" . $dato["Nro_Constancia_Inscripcion"] . "</td>";
                        echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
                        //echo "<a href='./?ctrl=productos&acc=eliminar&id=" . $dato["Id_Producto"] . "'>Eliminar</a>";
                        echo "<input type=hidden value='" . $dato['Placa'] . "_" . $dato['Marca'] . "_" . $dato['Nro_Constancia_Inscripcion'] . "'></td>";
                        echo "</tr>";
                    }
                    ?>
             </tbody>
         </table>
         <button id="btnOpenModal" class="btn">Nuevo</button>
     </div>
 </div>
 <div class="modal-background">
     <input type="hidden" id="modalPara" value="vehiculos">
     <!-- <form action="./?ctrl=productos&acc=createOrModify" method="post" class="modal-container">

         <div class="modal-title">
             <h3 id="titleModal">Nuevo Vehiculo</h3>
         </div>
         <div class="modal-body">
             <input type="text" name="placa" id="placa" placeholder="numero de placa" autocomplete="off">
             <input type="text" name="marca" id="marca" placeholder="marca del vehiculo" autocomplete="off">
             <input type="text" name="constanciaInscripcion" id="constanciaInscripcion" placeholder="numero de constancia" autocomplete="off">
             <input type="hidden" name="placa" id="campoClave" value="">
         </div>
         <div class="modal-footer">
             <button type="button" class="btn" id="btnCloseModal">Cancelar</button>
             <button type="submit" class="btn" id="btnSubmitData">Registrar</button>
         </div>
     </form> -->
 </div>