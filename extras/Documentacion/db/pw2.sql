-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2018 a las 16:18:05
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

drop database if exists pw2;
create database if not exists pw2;
use pw2;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `totalCompra` float NOT NULL,
  `estado` varchar(20) NOT NULL,
  `idComercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `email`, `fecha`, `hora`, `totalCompra`, `estado`, `idComercio`) VALUES
(38, 'cliente2@cliente.com', '2018-11-25', '08:45:11', 200, 'Pago', 2),
(40, 'luisamensajes@hotmail.com', '2018-11-25', '11:25:47', 300, 'Pago', 0),
(41, 'cliente2@cliente.com', '2018-11-25', '13:05:14', 400, 'Pago', 0),
(42, 'cliente2@cliente.com', '2018-11-25', '13:06:19', 250, 'Pago', 3),
(43, 'cliente@cliente.com', '2018-11-26', '15:11:57', 400, 'Pago', 0),
(44, 'cliente@cliente.com', '2018-11-26', '15:39:10', 200, 'Pago', 0),
(45, 'cliente@cliente.com', '2018-11-27', '22:42:14', 400, 'Pago', 0),
(46, 'luisamensajes@hotmail.com', '2018-11-29', '16:08:22', 120, 'Pago', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `idComercio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `mediosPago` varchar(100) NOT NULL,
  `horario1` varchar(100) NOT NULL,
  `horario2` varchar(50) NOT NULL,
  `horario3` varchar(50) NOT NULL,
  `activo` int(2) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`idComercio`, `nombre`, `direccion`, `mediosPago`, `horario1`, `horario2`, `horario3`, `activo`, `idUsuario`) VALUES
(0, 'La cantina de al lado', ' Almafuerte 3001, San Justo', 'un valor', 'Lunes a Viernes de 8:00 a 20:00 hs', 'Sabados de 8:00 a 00:00 hs', 'Domingos y Feriados de 10:00 a 23:00 hs', 1, 5),
(2, 'El ultimo pancho', 'Mosconi 2494, Ramos Mejia', 'Efectivo', 'de 15 a 20hs', 'de 20 a 24 hs', 'de 08 a 12 hs', 1, 18),
(3, 'Pancho villa', 'Almafuerte 3351,\r\nSan Justo', 'un valor', 'Lunes a Viernes de 8:00 a 20:00 hs', 'Sabados de 8:00 a 00:00 hs', 'Domingos y Feriados de 11:00 a 23:00 hs', 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecarrito`
--

CREATE TABLE `detallecarrito` (
  `idDetalle` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idCarrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `idEntrega` int(11) NOT NULL,
  `tipoEntrega` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`idEntrega`, `tipoEntrega`) VALUES
(1, 'Pendiente'),
(2, 'En Viaje'),
(3, 'Entregado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `idLiquidacion` int(11) NOT NULL,
  `idComercio` int(11) NOT NULL,
  `idDelivery` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `horaEntrega` time NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`idLiquidacion`, `idComercio`, `idDelivery`, `fechaEntrega`, `horaEntrega`, `importe`) VALUES
(1, 3, 19, '2018-11-25', '22:41:28', 250),
(2, 0, 15, '2018-11-25', '23:05:09', 300),
(3, 0, 15, '2018-11-26', '22:30:57', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idLogin`, `email`, `password`, `idUsuario`) VALUES
(4, 'administrador@administrador.com', 'administrador', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `idComercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `titulo`, `descripcion`, `precio`, `archivo`, `idComercio`) VALUES
(6, 'Pancho mexicano', ' salchichas con crema de palta', 120, 'pancho con guacamole.jpg', 2),
(7, 'pancho con papas fritas', 'Pancho con papas fritas', 100, 'pancho con papas.jpg', 2),
(8, 'Pancho con diferentes salsas', 'Panchos con diferentes salsas', 95, 'panchos con diferentes salsas.jpg', 2),
(9, 'Hamburguesa con papas', 'Hamburguesa con papas fritas', 200, 'combo hambuguesa.jpg', 0),
(10, 'Tapas con cerveza', 'diferentes comidas pequeÃ±as con cerveza', 200, 'entrada con cerveza.jpg', 0),
(11, 'Picada', 'Cantimpalo, chorizo colorado - salamin - mortadela - Salame-aceitunas-pickles etc', 300, 'picada.jpg', 0),
(12, 'Especial pancho villa', 'Especial pancho villa', 250, 'especial pancho.jpg', 3),
(13, 'Hot dog americano', 'Pancho con papas fritas y salsa americana', 150, 'pancho americano.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `idOferta` int(11) NOT NULL,
  `tipoOferta` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `horaEntrega` time NOT NULL,
  `entrega` varchar(30) NOT NULL,
  `idDelivery` int(11) NOT NULL,
  `idCarrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `fechaEntrega`, `horaEntrega`, `entrega`, `idDelivery`, `idCarrito`) VALUES
(15, '0000-00-00', '00:00:00', 'Entregado', 19, 38),
(18, '2018-11-25', '23:05:09', 'Entregado', 15, 40),
(19, '2018-11-25', '22:36:06', 'Entregado', 19, 41),
(20, '2018-11-25', '22:41:28', 'Entregado', 19, 42),
(21, '0000-00-00', '00:00:00', 'Cancelado', 0, 43),
(22, '2018-11-26', '22:30:56', 'Entregado', 15, 44),
(23, '0000-00-00', '00:00:00', 'Pendiente', 0, 45),
(24, '0000-00-00', '00:00:00', 'Pendiente', 0, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `tipoRol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(1, 'Cliente'),
(2, 'Comercio'),
(3, 'Delivery'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `categoria`, `idRol`) VALUES
(4, 'Dios Admin', 'Admin', 'administrador@administrador.com', 'admin', 'Av.Administrador', '44509876', 'Administrador', 4),
(5, 'Rodrigo', 'Gonzalez', 'comercio1@comercio.com', '592bd52a1a347976b32a561138c2cbc36d6cecd5', 'Arieta 2016', '11523647', 'Comercio', 2),
(7, 'Melisa', 'Perez', 'cliente2@cliente.com', 'd94019fd760a71edf11844bb5c601a4de95aacaf', ' Av. Dr. Ignacio Arieta 2640, San Justo', '11256369', 'Cliente', 1),
(8, 'Leandro', 'Santoro', 'comercio3@comercio.com', '592bd52a1a347976b32a561138c2cbc36d6cecd5', 'Peru 256', '11456852', 'Comercio', 2),
(10, 'Luisa', 'Benitez', 'luisamensajes@hotmail.com', 'd94019fd760a71edf11844bb5c601a4de95aacaf', 'Pres. Juan Domingo Peron 2700,San Justo', '11698452', 'Cliente', 1),
(15, 'Repartidor', 'Gomez', 'delivery2@delivery.com', '391cb1e07c5f1f4e3000e0fd125802c7a9b1dc96', 'Tucasa 125', '11456789', 'Delivery', 3),
(17, 'Pepe', 'Cibrian', 'cliente@cliente.com', 'd94019fd760a71edf11844bb5c601a4de95aacaf', 'Av. Pres. Dr. Arturo Umberto Illia 2617,San Justo', '11256347', 'Cliente', 1),
(18, 'Juan', 'Juancho', 'comercio@comercio.com', '592bd52a1a347976b32a561138c2cbc36d6cecd5', 'Almafuerte 123', '11245789', 'Comercio', 2),
(19, 'Jose', 'Josesito', 'delivery@delivery.com', '391cb1e07c5f1f4e3000e0fd125802c7a9b1dc96', 'micasa 123', '11256478', 'Delivery', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idViaje` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`idComercio`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `detallecarrito`
--
ALTER TABLE `detallecarrito`
  ADD PRIMARY KEY (`idDetalle`,`idMenu`,`cantidad`),
  ADD KEY `idMenu` (`idMenu`),
  ADD KEY `idUsuario` (`cantidad`),
  ADD KEY `pedido_fk` (`idCarrito`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`idEntrega`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`idLiquidacion`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `menu_fk_1` (`idComercio`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`idOferta`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `pedidos_FK` (`idCarrito`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`idRol`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`idViaje`,`idUsuario`,`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPedido` (`idPedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `idComercio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallecarrito`
--
ALTER TABLE `detallecarrito`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `idEntrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `idLiquidacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `idViaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD CONSTRAINT `comercio_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecarrito`
--
ALTER TABLE `detallecarrito`
  ADD CONSTRAINT `pedido_fk` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_fk_1` FOREIGN KEY (`idComercio`) REFERENCES `comercio` (`idComercio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_FK` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
