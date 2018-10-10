drop database if exists pw2;
create database if not exists pw2;
use pw2;

create table login
(id int not null primary key,
mail varchar(50) not null,
contrasenia varchar(50) not null);

create table usuario
(id int not null primary key,
mail varchar(50) not null,
nombre varchar(50) not null);

create table cliente
(idCliente int not null primary key,
dirección varchar(50) not null);

create table comercio
(idComercio int not null primary key,
dirección varchar(50) not null);

create table repartidor
(idRepartidor int not null primary key,
estado bool not null,
numero int not null);

create table precio
(idPrecio int not null primary key,
descripción float not null);

create table producto
(idProducto int not null primary key,
descripción varchar(50) not null,
idPrecio int not null);

create table menu
(idMenu int not null primary key,
descripción varchar(200) not null,
idPrecio int not null,
idProducto int not null,
idComercio int not null);

create table oferta
(idOferta int not null primary key,
descripción varchar(50) not null,
idComercio int not null,
idPrecio int not null);


create table pedido
(idPedido int not null primary key,
descripción varchar(50) not null,
idMenu int not null);


create table entrega
(idEntrega int not null primary key,
descripcion varchar(50) not null,
idcomercio int not null,
idRepartidor int not null);

create table venta
(idVenta int not null primary key,
idComercio int not null);

create table viaje
(idViaje int not null primary key,
idComercio int not null,
idRepartidor int not null,
idPedido int not null);

alter table producto add foreign key (idPrecio) references precio(idPrecio);
alter table menu add foreign key (idPrecio) references precio(idPrecio);
alter table menu add foreign key (idComercio) references comercio(idComercio);
alter table menu add foreign key (idProducto) references producto(idProducto);
alter table oferta add foreign key (idComercio) references comercio(idComercio);
alter table oferta add foreign key (idPrecio) references precio(idPrecio);
alter table pedido add foreign key (idMenu) references menu(idMenu);
alter table entrega add foreign key (idComercio) references comercio(idComercio);
alter table entrega add foreign key (idRepartidor) references repartidor(idRepartidor);
alter table viaje add foreign key (idComercio) references comercio(idComercio);
alter table viaje add foreign key (idRepartidor) references repartidor(idRepartidor);
alter table viaje add foreign key (idPedido) references pedido(idPedido);