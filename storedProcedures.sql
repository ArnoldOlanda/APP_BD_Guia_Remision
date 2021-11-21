-- Para los nombres del los procedimientos usar la siguiente forma   sp_nombre_del_procedimiento  todo en minusculas.

--Guias (Guia o cuerpo de guia)
delimiter //
Create procedure sp_buscar_guia_nro (in nro char(11)) 
begin 
	SELECT g.Nro_Guia ,
	concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision',
	concat_ws( '-',g.FT_Dia,g.FT_Mes,g.FT_Año) as 'Fecha traslado',
	g.dni_cliente, concat_ws(' ',c.nombres,c.apellidos) 'Cliente natural',
	g.ruc,j.nombre_empresa 'Cliente juridico',
	d1.direccion 'Punto partida',d2.direccion 'Punto llegada',
	g.Nro_licencia,concat_ws(' ',ch.apellidos,ch.nombres) 'chofer',
	g.placa,v.marca,g.ruc_transportista,t.nombre_transportista,
	tp.tipo,m.Motivo, g.firma_responsable,g.firma_cliente,g.nombre_conf_cliente, 
	g.Nro_Boleta 'Numero de Boleta',g.Nro_Factura 
	FROM guia_remision g  
	left JOIN boleta b ON g.Nro_Boleta = b.Nro_Boleta
	left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo
	left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo
	left join cliente_natural c on g.Dni_Cliente=c.DNI
	left join cliente_juridico j on g.RUC=j.RUC
	left join transportista ch on g.nro_licencia=ch.licencia_conducir
	left join vehiculo v on g.placa=v.placa
	left join tipo_comprobante tp on g.cod_tipo_comprobante=tp.codigo
	left join empresa_transportista t on g.ruc_transportista=t.ruc
	left join motivo_traslado m on g.cod_motivo_traslado=m.codigo
	where g.Nro_Guia = nro;

	select p.descripcion,p.unidad_medida,c.cantidad,c.peso from cuerpo_guia c
	inner join producto p on c.id_producto=p.id_producto where c.nro_guia=nro;
end//

delimiter //
Create procedure sp_lista_guia_remision()
begin
	SELECT g.Nro_Guia ,
	g.Nro_Boleta as "numero_boleta",g.Nro_Factura 'numero_factura', 
	concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'fecha_emision',
	concat_ws(' ',c.nombres,c.apellidos) 'cliente_natural',
	j.nombre_empresa 'cliente_juridico',
	d1.direccion 'punto_partida',d2.direccion 'punto_llegada'
	FROM guia_remision g  
	left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo
	left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo
	left join cliente_natural c on g.Dni_Cliente=c.DNI
	left join cliente_juridico j on g.RUC=j.RUC;
end //

create procedure sp_lista_guia_remision_factura()
begin
    SELECT g.Nro_Guia ,
	g.Nro_Factura 'numero_factura', 
	concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision',
	j.nombre_empresa 'Cliente juridico',
	d1.direccion 'Punto partida',d2.direccion 'Punto llegada'
	FROM guia_remision g  
	left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo
	left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo
	left join cliente_juridico j on g.RUC=j.RUC
    Where g.Nro_Factura is not null;
end

create procedure sp_lista_guia_remision_boleta()
begin
	SELECT g.Nro_Guia ,
	g.Nro_Boleta as "Numero de Boleta", 
	concat_ws( '-',g.FE_Dia,g.FE_Mes,g.FE_Año) as 'Fecha emision',
	concat_ws(' ',c.nombres,c.apellidos) 'Cliente natural',
	d1.direccion 'Punto partida',d2.direccion 'Punto llegada'
	FROM guia_remision g  
	left join Direcciones d1 on g.Cod_Punto_Partida=d1.codigo
	left join Direcciones d2 on g.Cod_Punto_Llegada=d2.codigo
	left join cliente_natural c on g.Dni_Cliente=c.DNI
	Where g.Nro_Boleta is not null;
end

--Clientes (Juridico o natural)
delimiter //
create procedure sp_lista_cliente_juridico()
begin
	select c.ruc,c.nombre_empresa,d.direccion
    from cliente_juridico c inner join direcciones d
    on c.cod_domicilio_fiscal=d.codigo;
end//

create procedure sp_buscar_cliente_juridico_ruc(IN RUCJ char(11))
begin
    select j.RUC,j.Nombre_Empresa, d.Direccion from Cliente_Juridico j 
    inner join Direcciones d on j.Cod_Domicilio_Fiscal = d.codigo
    where j.RUC = RUCJ;
end

delimiter //
create procedure sp_lista_cliente_natural()
begin
	select c.dni,concat_ws(" ",c.apellidos,c.nombres) 'nombre',d.direccion,c.telefono
    from cliente_natural c inner join direcciones d
    on c.cod_direccion=d.codigo;
end//

delimiter //
create procedure sp_buscar_cliente_natural_dni(in dnic char(8))
begin
	select c.dni,concat_ws(" ",c.apellidos,c.nombres) 'nombre',d.direccion,c.telefono
    from cliente_natural c inner join direcciones d
    on c.cod_direccion=d.codigo
	where c.dni=dnic;
end//
--Productos---------------------------------------------------------------------------------
delimiter //
create procedure sp_lista_productos()
begin
	select * from producto;
end//

delimiter //
create procedure sp_insertar_producto(in unid varchar(15),in descrip varchar(60))
begin
	insert into producto (unidad_medida,descripcion) values (unid,descrip);
end//

delimiter //
create procedure sp_actualizar_producto(in unid varchar(15),in descrip varchar(60),in idProd int)
begin
	update producto set unidad_medida=unid,descripcion=descrip where id_producto=idProd;
end//

--Conductores--------------------------------------------------------------------------------------

--Vehiculos-----------------------------------------------------------------------------------------

--Facturas------------------------------------------------------------------------------------------
create procedure sp_lista_factura()
begin
    select f.Nro_Factura, concat_ws( '-',f.Dia,f.Mes,f.Año) as 'Fecha', f.RUC, j.Nombre_Empresa from factura f
    inner join Cliente_Juridico j on f.RUC = j.RUC;
end

create procedure sp_busca_factura_numero(IN NumeroF char(12))
begin
    select f.Nro_Factura, concat_ws( '-',f.Dia,f.Mes,f.Año) as 'Fecha', f.RUC, j.Nombre_Empresa from factura f
    inner join Cliente_Juridico j on f.RUC = j.RUC
    where f.Nro_Factura = NumeroF;
end

--Direcciones---------------------------------------------------------------------------------------
create procedure sp_lista_direcciones()
begin
    select * from Direcciones;
end

create procedure sp_buscar_direccion_codigo(IN CodigoDire int)
begin
    select * from Direcciones
    where Codigo = CodigoDire;
end

--Empresa transportista--------------------------------------------------------------------------------
create procedure sp_lista_empresa_transportista()
begin
    select * from Empresa_Transportista;
end

create procedure sp_busca_empresa_transportista_ruc(IN RUCT char(11))
begin
    select * from empresa_transportista
    where RUC = RUCT;
end

create procedure sp_lista_direccion_cliente_juridico()
begin
    select dj.ruc,d.direccion from direcciones_cliente_juridico dj
    inner join direcciones d on dj.cod_direccion=d.codigo;
end

create procedure sp_lista_direccion_cliente_juridico_ruc(in rucj char(11))
begin
    select dj.ruc,d.direccion from direcciones_cliente_juridico dj
    inner join direcciones d on dj.cod_direccion=d.codigo where dj.ruc=rucj;
end

--Tipo de comprobante--------------------------------------------------------------
create procedure sp_lista_tipo_comprobante()
begin
    select * from tipo_comprobante;
end
--Tipo de traslado-----------------------------------------------------------------
create procedure Lista_MotivoTraslado()
begin
	select * from motivo_traslado;
end



