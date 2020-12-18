-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2020 a las 01:03:40
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaauto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autolavado`
--

CREATE TABLE `autolavado` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `tamano` varchar(10) NOT NULL,
  `precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autolavado`
--

INSERT INTO `autolavado` (`id`, `idcliente`, `idempleado`, `tamano`, `precio`) VALUES
(2, 2, 5, 'L', 400),
(3, 2, 5, 'M', 500),
(4, 2, 5, 'L', 750),
(5, 2, 5, 'S', 250),
(6, 2, 5, 'S', 250),
(7, 1, 12, 'L', 750),
(8, 2, 5, 'S', 0),
(9, 1, 13, 'L', 750),
(10, 1, 12, 'L', 750),
(11, 1, 5, 'L', 750),
(12, 1, 5, 'S', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `clave`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'cli', 'ascl', 'asxs', '852'),
(2, '456', 'Luis', 'Lopez', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `clave`, `nombre`, `apellido`, `telefono`) VALUES
(5, '123', 'Antonio', 'Tomas', '7121735117'),
(7, 'Javier', 'Javier', 'Perez', '12345678'),
(12, '6789', 'ccc', 'ddd', '456'),
(13, '1243', 'Antonio', '12345', '489489'),
(14, '123456789', 'asasa', 'sasaasa', '7124'),
(15, '789', 'Juan', 'Perez', '7121455854'),
(16, '852', 'Jose', 'Salah', '7458745896');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id`, `descripcion`, `cantidad`) VALUES
(2, 'Pago de Agua', 150),
(3, 'Pago de luces', 250),
(4, 'Vacaciones', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoempleado`
--

CREATE TABLE `pagoempleado` (
  `id` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagoempleado`
--

INSERT INTO `pagoempleado` (`id`, `idempleado`, `cantidad`) VALUES
(13, 5, 840);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `precio` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `cantidad`, `precio`) VALUES
(3, 'Cubetas', 10, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `pass`, `tipo`) VALUES
(1, 'Jorge Daniel', 'Lopez', '7121584875', 'daniel@correo.com', '12345678', 1),
(2, 'Alyson', 'Vargas Barrios', '7121597825', 'alyson@correo.com', '12345678', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autolavado`
--
ALTER TABLE `autolavado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idempleado` (`idempleado`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagoempleado`
--
ALTER TABLE `pagoempleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempleado` (`idempleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autolavado`
--
ALTER TABLE `autolavado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagoempleado`
--
ALTER TABLE `pagoempleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autolavado`
--
ALTER TABLE `autolavado`
  ADD CONSTRAINT `autolavado_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `autolavado_ibfk_2` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `pagoempleado`
--
ALTER TABLE `pagoempleado`
  ADD CONSTRAINT `pagoempleado_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
