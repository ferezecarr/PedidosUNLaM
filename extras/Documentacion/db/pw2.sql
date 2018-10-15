drop database if exists pw2;
create database if not exists pw2;
use pw2;

create table login
(id int not null primary key,
email varchar(50) not null,
contrasenia varchar(50) not null,
idRol int not null);

create table rol
(id int not null primary key,
descripcion varchar(50) not null);

create table usuario
(idUsuario int not null primary key,
email varchar(50) not null,
nombre varchar(50) not null,
direccion varchar(50) not null,
numero int not null,
idRol int not null);

create table precio
(idPrecio int not null primary key,
descripcion float not null);

create table producto
(idProducto int not null primary key,
descripcion varchar(50) not null,
idPrecio int not null);

create table menu
(idMenu int not null primary key,
descripcion varchar(200) not null,
idPrecio int not null,
idProducto int not null,
idUsuario int not null);

create table oferta
(idOferta int not null primary key,
descripcion varchar(50) not null,
idUsuario int not null,
idPrecio int not null);



create table pedido
(idPedido int not null primary key,
descripcion varchar(50) not null,
idMenu int not null,
idUsuario int not null);


create table entrega
(idEntrega int not null primary key,
descripcion varchar(50) not null,
idUsuario int not null);

create table venta
(idVenta int not null primary key,
idUsuario int not null);

create table viaje
(idViaje int not null primary key,
idUsuario int not null, 
idPedido int not null);

Alter table producto add foreign key (idPrecio) references precio(idPrecio);
Alter table menu add foreign key (idPrecio) references precio(idPrecio);
Alter table menu add foreign key (idUsuario) references usuario(idUsuario);
Alter table menu add foreign key (idProducto) references producto(idProducto);
Alter table oferta add foreign key (idUsuario) references usuario(idUsuario);
Alter table oferta add foreign key (idPrecio) references precio(idPrecio);
Alter table pedido add foreign key (idMenu) references menu(idMenu);
Alter table entrega add foreign key (idUsuario) references usuario(idUsuario);
Alter table entrega add foreign key (idUsuario) references usuario(idUsuario);
Alter table viaje add foreign key (idUsuario) references usuario(idUsuario);
Alter table viaje add foreign key (idPedido) references pedido(idPedido);

