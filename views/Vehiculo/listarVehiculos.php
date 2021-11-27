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
                        echo "<button class='btn btnDeleteRow'>Eliminar</button>";
                        echo "<input type=hidden value='" . $dato['Placa'] . "_" . $dato['Marca'] . "_" . $dato['Nro_Constancia_Inscripcion'] . "'></td>";
                        echo "</tr>";
                    }
                    ?>
             </tbody>
         </table>
         <button id="btnOpenModal" class="btn">Nuevo</button>
     </div>
 </div>
 <input type="hidden" id="nameForm" value="">
 <div class="modal-background">
     <input type="hidden" id="modalPara" value="vehiculos">
 </div>