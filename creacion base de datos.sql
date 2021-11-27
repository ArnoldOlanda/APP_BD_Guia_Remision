CREATE DATABASE BD_Guia_Remision;

use BD_Guia_Remision;
CREATE TABLE Empresa_Transportista(
	RUC char(11)  PRIMARY KEY,
	Nombre_Transportista varchar(50) not null
);
CREATE TABLE Tipo_Comprobante(
	Codigo int auto_increment PRIMARY KEY,
	Tipo varchar(15) not null
);
CREATE TABLE Motivo_Traslado(
	Codigo int auto_increment PRIMARY KEY,
	Motivo varchar(60) not null
);
CREATE TABLE Direcciones(
	Codigo int auto_increment primary key,
    Direccion varchar(120) not null
);
CREATE TABLE Cliente_Natural(
	DNI char(8) PRIMARY KEY,
    Cod_Direccion int  not null,
	Apellidos varchar(20) not null,
    Nombres varchar(20) not null,
    Telefono char(9) not null,
    foreign key (Cod_Direccion) references Direcciones(Codigo)
);
CREATE TABLE Cliente_juridico(
	RUC char(11) PRIMARY KEY,
	Cod_Domicilio_Fiscal int not null,
    Nombre_Empresa varchar(50) not null,
    foreign key (Cod_Domicilio_Fiscal) references Direcciones(Codigo)
);
CREATE TABLE Direcciones_Cliente_Juridico(
	RUC char(11) not null,
    Cod_Direccion int not null,
    primary key(RUC,Cod_Direccion),
    foreign key (RUC) references Cliente_juridico(RUC),
    foreign key (Cod_Direccion) references Direcciones(Codigo)
);
CREATE TABLE Factura(
	Nro_Factura char(12) PRIMARY KEY,
	Mes char(2) not null,
    Dia char(2) not null,
    Año char(4) not null,
    RUC char(11) not null, 
    foreign key (RUC) references Cliente_juridico(RUC)
);
CREATE TABLE Boleta(
	Nro_Boleta char(12) Primary key,
    Mes char(2) not null,
    Dia char(2) not null,
    Año Char(4) not null,
    Dni_Cliente char(8) not null,
    foreign key(Dni_Cliente) references Cliente_Natural(DNI)
);

CREATE TABLE Transportista(
	Licencia_Conducir char(9) PRIMARY KEY,
    DNI char(8) not null,
	Apellidos varchar(20) not null,
    Nombres varchar(20) not null,
    Telefono char(9) not null
);
CREATE TABLE Vehiculo(
	Placa varchar(7) PRIMARY KEY,
    Marca varchar(12) not null,
	Nro_Constancia_Inscripcion char(10) not null
);
create table Conducir(
	Licencia_Conducir char(9) not null,
    Placa varchar(7) not null,
    primary key(Licencia_Conducir,Placa),
    Foreign key (Licencia_Conducir) references Transportista(Licencia_Conducir),
    foreign key (Placa) references Vehiculo(Placa)
);
create table Producto(
	Id_Producto int auto_increment primary key,
    Unidad_Medida varchar(15) not null,
    Descripcion varchar(60) not null
);
create table Transportar(
	Placa varchar(7) not null,
    Id_Producto int not null,
    primary key(Placa,Id_Producto),
	foreign key (Placa) references Vehiculo(Placa),
    foreign key (Id_Producto) references Producto(Id_Producto)
);
create table Guia_Remision(
	Nro_Guia char(11) primary key,
    FE_Año char(4) not null,
    FE_Dia char(2) not null,
    FE_Mes char(2) not null,
    FT_Año char(4) not null,
    FT_Dia char(2) not null,
    FT_Mes char(2) not null,
    Cod_Punto_Partida int not null,
    Cod_Punto_Llegada int not null,
    Nro_Licencia char(9)null,
    Placa varchar(7),
    Ruc_Transportista char(11),
    Cod_Tipo_Comprobante  int,
    Cod_Motivo_Traslado  int not null,
    Firma_Responsable boolean not null,
    Firma_Cliente boolean not null,
    Nombre_Conf_Cliente varchar(15),
    Nro_Factura char(12),
    Nro_Boleta char(12),
    RUC char(11),
    Dni_Cliente char(8),
	foreign key (Cod_Punto_Partida) references Direcciones(Codigo),
    foreign key (Cod_Punto_Llegada) references Direcciones(Codigo),
    foreign key (Nro_Licencia) references Transportista(Licencia_Conducir),
    foreign key (Placa) references Vehiculo(Placa),
    foreign key (Ruc_Transportista) references Empresa_Transportista(RUC),
    foreign key (Cod_Tipo_Comprobante) references Tipo_Comprobante(Codigo),
    foreign key (Cod_Motivo_Traslado) references Motivo_Traslado(Codigo),
    foreign key (Nro_Factura) references Factura(Nro_Factura),
    foreign key (Nro_Boleta) references Boleta(Nro_Boleta),
    foreign key (RUC) references Cliente_juridico(RUC),
    foreign key (Dni_Cliente) references Cliente_Natural(DNI)
);
create table Cuerpo_Guia(
	Nro_Guia char(11) not null,
    Id_Producto int not null,
    Cantidad int not null,
    Peso varchar(10) not null,
    primary key(Nro_Guia,Id_Producto),
    foreign key (Nro_Guia) references Guia_Remision(Nro_Guia),
    foreign key (Id_Producto) references Producto(Id_Producto)
);

create index iApellido on Cliente_Natural(Apellidos);
create index iTransportista on Transportista(Apellidos);
create index iAño on Guia_Remision(FE_Año);