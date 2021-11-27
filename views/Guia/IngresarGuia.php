<div id="page-head">
    <div class="pad-all text-center">
        <h3 style="font-size:30px">Ingresar Guia</h3>
        </p1>
    </div>
</div>
<!--Page content-->
<div id="page-content">
    <div class="">
        <input type="hidden" id="nameForm" value="ingresoGuia">
        <form action="./?ctrl=guias&acc=registrar" method="POST" class="nueva-guia-grid-container">
            <div class="grid-item">
                <h2>Agrosur S y G</h2>
            </div>
            <div class="grid-item">
                <h4>GUIA DE REMISION-REMITENTE</h4>
                <label for="nroGuia">Numero Guia<br><input type="text" id="nroGuia" name="nroGuia" autocomplete="off" required></label>
                <span id="errorMessageNroGuia" style="color:red;"></span>
            </div>
            <div class="grid-item">
                <label for="fechaEmision">Fecha de emision<br><input type="date" name="fechaEmision" id="fechaEmision" min="2020-01-01" max="2030-12-31"></label>
            </div>
            <div class="grid-item"><label for="fechaTraslado">Fecha de traslado<br><input type="date" name="fechaTraslado" id="fechaTraslado" min="2020-01-01" max="2030-12-31"></label></div>
            <div class="grid-item">
            <span><b>DATOS DEL CLIENTE</b></span>
                <label for="destinatario">Destinatario
                    <select name="destinatario" id="destinatario">
                        <option value="" disabled selected>Seleccione un destinatario</option>
                        <?php
                            
                            foreach ($mainData[1] as $value) {
                                echo "<option value='".$value[0]."' >".$value[1]."</option>";
                            }
                        ?>
                    </select>
                </label>
                <label for="rucDni">RUC/DNI<br><input type="text" id="rucDni" readonly></label>
            </div>
            <div class="grid-item">
                <span><b>DATOS DEL VEHICULO</b></span>
                <label for="placa">Placa<br>
                    <select id="placa" name="placa">
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                            foreach ($mainData[2] as $value) {
                                echo "<option value='".$value['Placa']."_".$value['Marca']."_".$value['Nro_Constancia_Inscripcion']."'>".$value['Placa']."</option>";
                            }
                        ?>
                    </select>
                </label>
                <label for="marca">Marca<br><input type="text" id="marca" readonly></label>
                <label for="nroConstancia">Constancia de inscripcion<br><input type="text" id="nroConstancia" readonly></label>
                <br><br>
                <label for="nombreChofer">Nombre del chofer<br>
                    <select id="nombreChofer" name="nombreChofer">
                        <option value="" disabled selected>Seleccione un chofer</option>
                        <?php
                            foreach ($mainData[3] as $value) {
                                echo "<option value='".$value['Licencia_Conducir']."'>".$value['Apellidos']." ".$value['Nombres']."</option>";
                            }
                        ?>
                    </select>
                </label>
                <label for="nroLicencia">Numero Licencia<br><input type="text" id="nroLicencia" readonly></label>
                
            </div>
            <div class="grid-item">
                <label for="puntoPartida">Punto Partida<br>
                    <select name="puntoPartida" id="puntoPartida">
                        <option value="" selected disabled>Seleccione una direccion</option>
                        <?php 
                            foreach ($mainData[0] as $value) {
                                echo "<option value='".$value['Codigo']."'>".$value['Direccion']."</option>";
                            }
                        ?>
                    </select>
                </label>
            </div>
            <div class="grid-item">
                <label for="puntoLlegada">Punto Llegada<br>
                    <select name="puntoLlegada" id="puntoLlegada">
                        <option value="" selected disabled>Seleccione una direccion</option>
                    </select>
                </label>
            </div>
            
            <div class="grid-item">
                <table width='100%' border="1" id="tableDetalleGuia">
                    <tr>
                        <th>Producto</th>
                        <th>Unidad de Medida</th>
                        <th>Cantidad</th>
                        <th>Peso total</th>
                    </tr>
                    <tr class="rowDetalleGuia1">
                        <td><select name="producto1" id="producto1">
                            <option value="" disabled selected>Seleccione un producto</option>
                            <?php 
                                foreach ($mainData[4] as $value) {
                                    echo "<option value='".$value['Id_Producto']."_".$value['Unidad_Medida']."'>".$value['Descripcion']."</option>";
                                }
                            ?>
                        </select></td>
                        <td><input type="text" id="unidadMedida1" readonly></td>
                        <td><input type="number" name="cantidad1"></td>
                        <td><input type="text" name="peso1"></td>
                    </tr>
                </table>
                <button type="button" class="btn" id="btnAgregarFilaDetalle">Agregar fila</button>
                <button type="button" class="btn" id="btnEliminarFilaDetalle">Eliminar fila</button>
                <input type="hidden" name="totalFilasDetalle" id="totalFilasDetalle" value="1">
            </div>
            
            <div class="grid-item">
            <span><b>DATOS DE LA EMPRESA TRANSPORTISTA Y EL TIPO DE COMPROBANTE</b></span>
                <label for="nombreTransportista">Nombre Transportista<br>
                    <select id="nombreTransportista" name="nombreTransportista">
                        <option value="" disabled selected>Seleccione una opcion</option>
                        <?php 
                            foreach ($mainData[5] as $value) {
                                echo "<option value='".$value['RUC']."'>".$value['Nombre_Transportista']."</option>";
                            }
                        ?>
                    </select>
                </label>
                <label for="rucTransportista">RUC Transportista<br><input type="text" id="rucTransportista" readonly></label>

                <label for="tipoComprobante">Tipo Comprobante<br>
                    <!-- <select id="tipoComprobante" name="tipoComprobante"> -->
                        <!-- <option value="" disabled selected>Seleccione un tipo de comprobante</option> -->
                        <?php 
                            //foreach ($mainData[6] as $value) {
                              //  echo "<option value='".$value['Codigo']."'>".$value['Tipo']."</option>";
                            //}
                        ?>
                    <!-- </select> -->
                    <input type="text" id="tipoComprobanteTexto" readonly>
                    <input type="hidden" id="tipoComprobante" name="tipoComprobante">
                </label>
                <label for="nroComprobante">Numero Comprobante<br><input type="text" id="nroComprobante" name="nroComprobante" autocomplete="off" require></label>
                <span style="color:red;" id="errorMessageTipoComprobante"></span>
                <!-- <label for="nroFactura">Numero Factura<input type="text" id="nroFactura"></label>
                <label for="nroBoleta">Numero Boleta<input type="text" id="nroBoleta"></label> -->
            </div>
            <div class="grid-item">
                <label for="motivoTraslado">Motivo Traslado<br>
                    <select id="motivoTraslado" name="motivoTraslado">
                        <option value="" disabled selected>Seleccione un motivo</option>
                        <?php 
                            foreach ($mainData[7] as $value) {
                                echo "<option value='".$value['Codigo']."'>".$value['Motivo']."</option>";
                            }
                        ?>
                    </select>
                </label>
            </div>
            <div class="grid-item">
                <label for="firmaResponsable">Firma del responsable<br>
                    <select id="firmaResponsable" name="firmaResponsable">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </label>
                <label for="firmaCliente">Firma del cliente<br>
                    <select id="firmaCliente" name="firmaCliente">
                    <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </label>
                <label for="nombreConfCLiente">Nombre de quien confirma<br>
                    <input type="text" name="nombreConfCLiente" id="nombreConfCLiente" autocomplete="off">
                </label>
                
            </div>
            <button type="submit" class="btn">Ingresar guia</button>
        </form>
    </div>
</div>