
<!DOCTYPE html>

<html >
<head>
    <title></title>
    <link rel="stylesheet"  type="text/css" href="estito.css"/>
    <style type="text/css">
        .auto-style2 {
            height: 744px;
            margin-left: 0px;
        }
        .auto-style4 {
            height: 645px;
        }
    </style>
    </head>
<body class="auto-style2">
    <form id="form1" >
        <div style="background-color:#5CF1C4;">
            <br />
            <h1 class="titles">Ingresar Guia </h1>
            
        </div>
        <div class="auto-style4">
            <br />
            <a class="center">Nro Guia</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Nro_Guia"></asp:TextBox>
             <br />
            <a class="center">Fecha Emision Año</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="FE_Ano" ></asp:TextBox>
             <br />
            <a class="center">Fecha Emision Dia</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="FE_Dia" ></asp:TextBox>
             <br />
            <a class="center">Fecha Emision Mes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="FE_Mes" ></asp:TextBox>
             <br />
            <a class="center">Fecha traslado Año</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="FT_Año" ></asp:TextBox>
             <br />
            <a class="center">Fecha traslado Mes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="FT_Mes" ></asp:TextBox>
            <br />
            <a class="center">Fecha Emision Dia</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="FT_Dia" ></asp:TextBox>
             <br />
            <a class="center">Cod_Punto_Partida</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="Cod_Punto_Partida" </asp:TextBox>
             <br />
            <a class="center">Cod_Punto_Llegada</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Cod_Punto_Llegada" </asp:TextBox>
             <br />
            <a class="center">Nro_Licencia</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="Nro_Licencia" ></asp:TextBox>
             <br />
            <a class="center">Placa</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="Placa" ></asp:TextBox>
             <br />
            <a class="center">Ruc_Transportista</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Ruc_Transportista" ></asp:TextBox>
             <br />
            <a class="center">Cod_Tipo_Comprobante</a>&nbsp;<asp:TextBox ID="Cod_Tipo_Comprobante" runat="server"></asp:TextBox>
             <br />
            <a class="center">Cod_Motivo_Traslado</a>&nbsp; &nbsp;<asp:TextBox ID="Cod_Motivo_Traslado" runat="server"></asp:TextBox>
             <br />
            <a class="center">Firma_Responsable</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Firma_Responsable" runat="server"></asp:TextBox>
             <br />
            <a class="center">Firma_Cliente</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Firma_Cliente" runat="server"></asp:TextBox>
            <br />
            <a class="center">Nombre_Conf_Cliente</a>&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Nombre_Conf_Cliente" runat="server"></asp:TextBox>
             <br />
            <a class="center">Nro_Factura</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <asp:TextBox ID="Nro_Factura" ></asp:TextBox>
             <br />
            <a class="center">Nro_Boleta</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Nro_Boleta" ></asp:TextBox>
             <br />
            <a class="center">RUC</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="RUC" ></asp:TextBox>
             <br />
            <a class="center">Dni_Cliente</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<asp:TextBox ID="Dni_Cliente" ></asp:TextBox>
            <br />
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <asp:Button ID="Aceptar" Text="Aceptar" />
        </div>
       
    </form>
</body>
</html>