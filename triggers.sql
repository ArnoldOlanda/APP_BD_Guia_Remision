delimiter //
create trigger before_delete_cliente_natural before delete on 
cliente_natural for each row
begin
    delete from guia_remision where dni_cliente=old.dni;
end//

delimiter //
create trigger before_delete_guia before delete on
guia_remision for each row
begin
	delete from cuerpo_guia where nro_guia=old.nro_guia;
end//

delimiter //
create trigger after_delete_guia after delete on
guia_remision for each row
begin
	if old.cod_tipo_comprobante=1 then
		delete from factura where nro_factura=old.nro_factura;
	elseif old.cod_tipo_comprobante=2 then
		delete from boleta where nro_boleta=old.nro_boleta;
	end if;
end//x

delimiter //
create trigger before_delete_cliente_juridico before delete on 
cliente_juridico for each row
begin
	 
	delete from guia_remision where RUC=old.ruc;
	delete from factura where RUC=old.ruc;
	delete from direcciones_cliente_juridico where RUC=old.ruc;
end//


delimiter //
create trigger before_delete_producto before delete on producto for each row
begin
    delete from cuerpo_guia where Id_Producto=old.Id_Producto;
    delete from transportar where Id_Producto=old.Id_Producto;
end//



delimiter //
create trigger before_delete_vehiculos before delete on vehiculo for each row
begin
    update guia_remision set Placa= null where Placa= old.Placa;
    delete from conducir where Placa= old.Placa;
    delete from transportar where Placa= old.Placa;
end//

delimiter //
create trigger before_delete_conductores before delete on transportista for each row
begin
    update guia_remision set Nro_Licencia= null where Nro_Licencia= old.Licencia_Conducir;
    delete from conducir where Licencia_Conducir= old.Licencia_Conducir;
end//