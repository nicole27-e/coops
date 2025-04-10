-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2025 a las 06:22:54
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coops`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalago_capacidad`
--

CREATE TABLE `catalago_capacidad` (
  `id_capacidad` int(11) NOT NULL,
  `capacidad` text NOT NULL,
  `precio_capacidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalago_capacidad`
--

INSERT INTO `catalago_capacidad` (`id_capacidad`, `capacidad`, `precio_capacidad`) VALUES
(1, '15 OZ', 30),
(2, '16 OZ', 40),
(3, '24 OZ', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalago_color`
--

CREATE TABLE `catalago_color` (
  `id_color` int(11) NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalago_color`
--

INSERT INTO `catalago_color` (`id_color`, `color`) VALUES
(1, 'Verde'),
(2, 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalago_material`
--

CREATE TABLE `catalago_material` (
  `id_material` int(11) NOT NULL,
  `material` text NOT NULL,
  `precio_material` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalago_material`
--

INSERT INTO `catalago_material` (`id_material`, `material`, `precio_material`) VALUES
(1, 'Plástico', 40),
(2, 'Vidrio', 60),
(3, 'Metal', 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalago_producto`
--

CREATE TABLE `catalago_producto` (
  `id_producto` int(11) NOT NULL,
  `idtipo_vaso` int(11) NOT NULL,
  `id_capacidad` int(11) NOT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalago_producto`
--

INSERT INTO `catalago_producto` (`id_producto`, `idtipo_vaso`, `id_capacidad`, `id_material`) VALUES
(1, 1, 2, 1),
(2, 2, 3, 3),
(3, 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_vasos`
--

CREATE TABLE `catalogo_vasos` (
  `id_vasos` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_capacidad` int(11) NOT NULL,
  `idtipo_vaso` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogo_vasos`
--

INSERT INTO `catalogo_vasos` (`id_vasos`, `id_color`, `id_material`, `id_capacidad`, `idtipo_vaso`, `nombre`) VALUES
(1, 2, 1, 2, 1, 'Vaso 16OZ con tapa y popote '),
(3, 2, 3, 3, 2, 'Vaso Metal Con Tapa y Popote'),
(4, 1, 2, 1, 3, 'Tarro de Cristal Con Popote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `estado` text NOT NULL,
  `ciudad` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text NOT NULL,
  `cp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `direccion`, `estado`, `ciudad`, `telefono`, `email`, `cp`) VALUES
(1, 'Alejandra Diaz', 'Orion 881 Lomas del Sol', 'Sinaloa', 'Culiacan', '667-182-0973', 'arq.diazg@hotmail.com', '80016'),
(2, 'Ada Diaz', 'Polo Norte 3428 Santa Elena', 'Sinaloa', 'Culiacan', '667-013-8562', 'ada_diazg@hotmail.com', '80028'),
(4, 'nicole', 'Polo Norte 3428', 'CULIACAN', 'CULIACAN', '667-409-0186', 'espinozanicole2709@gmail.com', '80028');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `empleado` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `empleado`, `password`, `idrol`, `nombre`) VALUES
(1, '010101', 'empleado1', 1, 'nicole'),
(2, '010102', 'empleado2', 2, 'alonso'),
(3, '010103', 'empleado3', 2, 'jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_grabado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `id_cliente`, `id_producto`, `cantidad`, `id_grabado`, `descripcion`, `fecha_pedido`, `fecha_entrega`, `total`) VALUES
(1, 2, 2, 5, 1, 'Que diga Feliz Año Nuevo', '2024-12-05', '2024-12-25', 950),
(2, 4, 1, 1, 4, 'un diseño de la pepa pig en una bicicleta y un casco con el nombre de ALEJANDRIA', '2024-12-09', '2024-12-10', 280),
(3, 1, 2, 5, 2, 'a', '2024-12-11', '2024-12-21', 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'admin'),
(2, 'colaborador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_grabado`
--

CREATE TABLE `tipo_grabado` (
  `id_grabado` int(11) NOT NULL,
  `grabado` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio_grabado` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_grabado`
--

INSERT INTO `tipo_grabado` (`id_grabado`, `grabado`, `descripcion`, `precio_grabado`) VALUES
(1, 'Básico', '', 50),
(2, 'Intermedio', '', 100),
(3, 'Personalizado 1 ', '', 150),
(4, 'Personalizado 2', '', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vaso`
--

CREATE TABLE `tipo_vaso` (
  `idtipo_vaso` int(11) NOT NULL,
  `tipo_vaso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_vaso`
--

INSERT INTO `tipo_vaso` (`idtipo_vaso`, `tipo_vaso`) VALUES
(1, 'Vaso'),
(2, 'Termo'),
(3, 'Taza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalago_capacidad`
--
ALTER TABLE `catalago_capacidad`
  ADD PRIMARY KEY (`id_capacidad`);

--
-- Indices de la tabla `catalago_color`
--
ALTER TABLE `catalago_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `catalago_material`
--
ALTER TABLE `catalago_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `catalago_producto`
--
ALTER TABLE `catalago_producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `idtipo_vaso` (`idtipo_vaso`),
  ADD KEY `id_capacidad` (`id_capacidad`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `catalogo_vasos`
--
ALTER TABLE `catalogo_vasos`
  ADD PRIMARY KEY (`id_vasos`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_capacidad` (`id_capacidad`),
  ADD KEY `idtipo_vaso` (`idtipo_vaso`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `idrol` (`idrol`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `idtipo_grabado` (`id_grabado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipo_grabado`
--
ALTER TABLE `tipo_grabado`
  ADD PRIMARY KEY (`id_grabado`);

--
-- Indices de la tabla `tipo_vaso`
--
ALTER TABLE `tipo_vaso`
  ADD PRIMARY KEY (`idtipo_vaso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo_vasos`
--
ALTER TABLE `catalogo_vasos`
  MODIFY `id_vasos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalago_producto`
--
ALTER TABLE `catalago_producto`
  ADD CONSTRAINT `catalago_producto_ibfk_1` FOREIGN KEY (`id_capacidad`) REFERENCES `catalago_capacidad` (`id_capacidad`),
  ADD CONSTRAINT `catalago_producto_ibfk_2` FOREIGN KEY (`idtipo_vaso`) REFERENCES `tipo_vaso` (`idtipo_vaso`),
  ADD CONSTRAINT `catalago_producto_ibfk_3` FOREIGN KEY (`id_material`) REFERENCES `catalago_material` (`id_material`);

--
-- Filtros para la tabla `catalogo_vasos`
--
ALTER TABLE `catalogo_vasos`
  ADD CONSTRAINT `catalogo_vasos_ibfk_1` FOREIGN KEY (`idtipo_vaso`) REFERENCES `tipo_vaso` (`idtipo_vaso`),
  ADD CONSTRAINT `catalogo_vasos_ibfk_2` FOREIGN KEY (`id_capacidad`) REFERENCES `catalago_capacidad` (`id_capacidad`),
  ADD CONSTRAINT `catalogo_vasos_ibfk_3` FOREIGN KEY (`id_material`) REFERENCES `catalago_material` (`id_material`),
  ADD CONSTRAINT `catalogo_vasos_ibfk_4` FOREIGN KEY (`id_color`) REFERENCES `catalago_color` (`id_color`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `catalago_producto` (`id_producto`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_grabado`) REFERENCES `tipo_grabado` (`id_grabado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
