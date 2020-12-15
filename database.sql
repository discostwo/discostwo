-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2020 a las 19:37:36
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `disco's two`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `IDArticulo` int(10) NOT NULL,
  `NombreArticulo` varchar(30) NOT NULL,
  `Artista` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` float NOT NULL,
  `Tipo` enum('CD','Vinilo','Digital','Merchan') NOT NULL,
  `Stock` int(6) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`IDArticulo`, `NombreArticulo`, `Artista`, `Descripcion`, `Precio`, `Tipo`, `Stock`, `Imagen`, `video`) VALUES
(1, 'Moral Panic ', 'Nothing But Thieves', '‘This album is about the tension in the air. It\'s about people. It\'s about you’', 15, 'CD', 0, 'moral.jpg', 'https://www.youtube.com/embed/sSD9ePFUkvM'),
(2, '[+ +]', 'LOONA', '', 30, 'Vinilo', 1, 'loona.jpg', 'https://www.youtube.com/embed/846cjX0ZTrk'),
(3, 'Cicatrices', 'Natos y Waor', '', 5, 'Digital', 20, 'natos.jpg', 'a'),
(4, 'Sudadera Simulation Theory', 'Muse', '', 30, 'Merchan', 30, 'SudaderaMuse.jpg', 'a'),
(5, 'POST HUMAN: SURVIVAL HORROR', 'Bring Me The Horizon', '', 25, 'Vinilo', 0, 'posthumanvinilo.png', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IDCliente` int(10) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `NombreCliente` varchar(50) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDCliente`, `DNI`, `Email`, `Contraseña`, `NombreCliente`, `Apellidos`, `Telefono`, `Ciudad`, `Direccion`) VALUES
(1, '11111111A', '', '', 'Luis', 'Martinez Rodriguez', '999888775', 'Villagarcia del Llano', 'Calle Luis 1 1ºA'),
(2, '11111111B', '', '', 'Pepe', 'Garcia Lopez', '111111111', 'Albacete', 'Calle Pepe 2 1ºA'),
(3, '11111111C', '', '', 'Maria', 'Perez Garcia', '111111122', 'Madrid', 'Calle María 2 2ºB'),
(4, '11111111D', '', '', 'Antonio', 'Garcia Rodriguez', '123123123', 'Valencia', 'Calle Antonio 5ºA'),
(19, '12312366A', '', '', 'Pepe', 'Garcia Garcia', '123123666', 'Madrid', 'Calle Pepe 153 1F'),
(38, 'J', '', '', 'Ramon', 'De Llano', '0', 'Albacete', 'Calle 123'),
(39, '12312366B', '', '', 'Gonzalo', 'Cantos', '111333222', 'Madrid', 'Calle 123'),
(61, '12341242B', 'hoola', '', 'hola', 'hola', '12341234124', 'hola', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IDCompra` int(10) NOT NULL,
  `FechaCompra` date NOT NULL,
  `MetodoPago` enum('PayPal','VISA','MasterCard','Contrarrembolso') NOT NULL,
  `PrecioTotal` float NOT NULL,
  `IDCliente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`IDCompra`, `FechaCompra`, `MetodoPago`, `PrecioTotal`, `IDCliente`) VALUES
(1, '2020-11-02', 'VISA', 50, 1),
(2, '2020-10-14', 'PayPal', 30, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetocomprado`
--

CREATE TABLE `objetocomprado` (
  `IDObjetoComprado` int(10) NOT NULL,
  `CantidadCompra` int(11) NOT NULL,
  `IDArticulo` int(10) NOT NULL,
  `IDCompra` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `objetocomprado`
--

INSERT INTO `objetocomprado` (`IDObjetoComprado`, `CantidadCompra`, `IDArticulo`, `IDCompra`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `IDPedido` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDArticulo` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`IDPedido`, `IDCliente`, `IDArticulo`, `Fecha`, `Direccion`, `Estado`) VALUES
(29, 38, 2, '2020-12-09 20:22:44', '', 0),
(32, 38, 3, '2020-12-10 11:56:16', '', 0),
(33, 38, 3, '2020-12-10 11:57:16', '', 0),
(34, 38, 3, '2020-12-10 11:57:20', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`IDArticulo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IDCompra`),
  ADD KEY `IDCliente` (`IDCliente`);

--
-- Indices de la tabla `objetocomprado`
--
ALTER TABLE `objetocomprado`
  ADD PRIMARY KEY (`IDObjetoComprado`),
  ADD KEY `IDArticulo` (`IDArticulo`),
  ADD KEY `IDCompra` (`IDCompra`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IDPedido`),
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDArticulo` (`IDArticulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `IDArticulo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `IDCompra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `objetocomprado`
--
ALTER TABLE `objetocomprado`
  MODIFY `IDObjetoComprado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `IDPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`);

--
-- Filtros para la tabla `objetocomprado`
--
ALTER TABLE `objetocomprado`
  ADD CONSTRAINT `objetocomprado_ibfk_1` FOREIGN KEY (`IDArticulo`) REFERENCES `articulo` (`IDArticulo`),
  ADD CONSTRAINT `objetocomprado_ibfk_2` FOREIGN KEY (`IDCompra`) REFERENCES `compra` (`IDCompra`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`IDArticulo`) REFERENCES `articulo` (`IDArticulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
