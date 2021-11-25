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
                     <th>Licencia de conducir</th>
                     <th>DNI</th>
                     <th>Nombre</th>
                     <th>Telefono</th>
                     <th>Accion</th>
                 </tr>
             </thead>

             <tbody>
                 <?php
                    //echo var_dump($result);
                    foreach ($result as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato["Licencia_Conducir"] . "</td>";
                        echo "<td>" . $dato["DNI"] . "</td>";
                        echo "<td>" . $dato["Apellidos"] ." ".$dato['Nombres']. "</td>";
                        echo "<td>" . $dato["Telefono"] ."</td>";
                        echo "<td class='row'><button class='btn btnUpdateOpenModal'>Modificar</button>";
                        //echo "<button class='btn btnDeleteRow'>Eliminar</button>";
                        echo "<input type=hidden value='" . $dato['Licencia_Conducir'] . "_" . 
                            $dato['DNI'] . "_" . $dato['Apellidos'] ."_".$dato['Nombres']."_".$dato['Telefono']. "'></td>";
                        echo "</tr>";
                    }
                    ?>
             </tbody>
         </table>
         <button id="btnOpenModal" class="btn">Nuevo</button>
     </div>
 </div>
 <div class="modal-background">
     <input type="hidden" id="modalPara" value="conductores">
 </div>