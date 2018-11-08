CREATE DATABASE IF NOT EXISTS pw2;
USE pw2;

CREATE TABLE Rol(
    idRol INT NOT NULL,
    tipoRol VARCHAR(50) NOT NULL,
    PRIMARY KEY(idRol)
);

CREATE TABLE Usuario(
    idUsuario INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    idRol INT,
    PRIMARY KEY(idUsuario,idRol),
    FOREIGN KEY(idRol) REFERENCES Rol(idRol) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Login(
    idLogin INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    idUsuario INT,
    PRIMARY KEY(idLogin,idUsuario),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Menu(
    idMenu INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    precio FLOAT NOT NULL,
    archivo varchar(100) NOT NULL, 
    idUsuario INT,
    PRIMARY KEY(idMenu,idUsuario),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Oferta(
    idOferta INT NOT NULL AUTO_INCREMENT,
    tipoOferta VARCHAR(50) NOT NULL,
    idUsuario INT,
    precio FLOAT,
    PRIMARY KEY(idOferta,idUsuario),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Pedido(
    idPedido INT NOT NULL AUTO_INCREMENT,
    tipoPedido VARCHAR(50) NOT NULL,
    idMenu INT,
    idUsuario INT,
    PRIMARY KEY(idPedido,idMenu,idUsuario),
    FOREIGN KEY(idMenu) REFERENCES Menu(idMenu) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Entrega(
    idEntrega INT NOT NULL AUTO_INCREMENT,
    tipoEntrega VARCHAR(50) NOT NULL,
    idUsuario INT,
    PRIMARY KEY(idEntrega,idUsuario),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Venta(
    idVenta INT NOT NULL AUTO_INCREMENT,
    idUsuario INT,
    PRIMARY KEY(idVenta,idUsuario),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Viaje(
    idViaje INT NOT NULL AUTO_INCREMENT,
    idUsuario INT,
    idPedido INT,
    PRIMARY KEY(idViaje,idUsuario,idPedido),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(idPedido) REFERENCES Pedido(idPedido) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Rol(idRol,tipoRol) VALUES(1,"Cliente"),
                                    (2,"Comercio"),
                                    (3,"Delivery"),
                                    (4,"Administrador");

INSERT INTO Usuario(idUsuario,email,password,nombre,apellido,direccion,telefono,categoria,idRol) 
    VALUES(1,'cliente@cliente.com','cliente','Pepe','Pepe','Av.Peron 4351','44506789','Cliente',1),
        (2,'comercio@comercio.com','comercio','Juan','Juan','Av.Saenz 789','44509875','Comercio',2),
        (3,'delivery@delivery.com','delivery','Jose','Jose','Av.Rivadavia 8765','44890765','Delivery',3),
        (4,'administrador@administrador.com','admin','Admin','Admin','Av.Administrador','44509876','Administrador',4);

INSERT INTO Login(idLogin,email,password,idUsuario)
    VALUES(1,'cliente@cliente.com','cliente',1),
        (2,'comercio@comercio.com','comercio',2),
        (3,'delivery@delivery.com','delivery',3),
        (4,'administrador@administrador.com','administrador',4);

INSERT INTO Menu(idMenu,titulo,descripcion,precio,idUsuario)
    VALUES(1,'Milanesa con pure','Milanesa con pure',150.00,1),
        (2,'Carne con papas al horno','Carne con papas al horno',200.00,2),
        (3,'Ensalada Mixta','Ensalada Mixta',100.00,3);

INSERT INTO Oferta(idOferta,tipoOferta,idUsuario,precio)
    VALUES(1,'Bife de chorizo con papas + gaseosa',3,175.00),
        (2,'Sopa de zapallo',2,70.00),
        (3,'Sandwich de vacio',1,100.00);

INSERT INTO Pedido(idPedido,tipoPedido,idMenu,idUsuario)
    VALUES(1,'En Preparacion',1,1),
        (2,'Enviado',2,2),
        (3,'Entregado',3,3);

INSERT INTO Entrega(idEntrega,tipoEntrega,idUsuario)
    VALUES(1,'En Espera',1),
        (2,'En Viaje',2),
        (3,'Entregado',3);

INSERT INTO Venta(idVenta,idUsuario)
    VALUES(1,1),
        (2,2),
        (3,3);

INSERT INTO Viaje(idViaje,idUsuario,idPedido)
    VALUES(1,1,1),
        (2,2,2),
        (3,3,3);