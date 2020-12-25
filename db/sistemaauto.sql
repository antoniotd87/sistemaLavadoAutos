-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-12-2020 a las 09:43:31
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
  `precio` int(5) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autolavado`
--

INSERT INTO `autolavado` (`id`, `idcliente`, `idempleado`, `tamano`, `precio`, `fecha`) VALUES
(1, 7, 5, 'M', 200, '2020-12-25'),
(2, 8, 1, 'S', 120, '2020-12-25'),
(7, 5, 3, 'L', 400, '2020-12-25'),
(8, 4, 4, 'L', 400, '2020-12-25'),
(9, 7, 5, 'S', 120, '2020-12-25'),
(10, 2, 1, 'S', 120, '2020-12-25'),
(11, 7, 3, 'L', 400, '2020-12-25'),
(13, 7, 2, 'L', 400, '2020-12-25'),
(14, 1, 6, 'L', 400, '2020-12-25'),
(15, 3, 9, 'M', 200, '2020-12-25'),
(16, 9, 8, 'L', 400, '2020-12-25'),
(17, 4, 10, 'S', 120, '2020-12-25'),
(18, 8, 9, 'L', 400, '2020-12-25'),
(19, 5, 7, 'L', 400, '2020-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `clave`, `nombre`, `apellido`, `telefono`, `fecha`) VALUES
(1, '501', 'Lourdes', 'Pizano', '7474848475', '2020-12-25'),
(2, '502', 'Acevedo', 'Pedro', '7151141452', '2020-12-25'),
(3, '503', 'Hugo', 'Herrera', '5454858547', '2020-12-25'),
(4, '504', 'Gomez', 'Ana', '7485896321', '2020-12-25'),
(5, '505', 'Jaime', 'Campos', '7897894562', '2020-12-25'),
(6, '506', 'Teresa', 'Vazquez', '4585475487', '2020-12-25'),
(7, '507', 'Marcelino', 'Mattioli', '858221156', '2020-12-25'),
(8, '508', 'Manuel', 'Olvera', '4196932514', '2020-12-25'),
(9, '509', 'Jose', 'Rivera', '1973648251', '2020-12-25'),
(10, '510', 'Eduardo', 'Osorio', '7458745879', '2020-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `idusuario`, `clave`, `nombre`, `apellido`, `telefono`, `fecha`) VALUES
(1, 2, '101', 'Juan', 'Francis', '7897897474', '2020-12-25'),
(2, 2, '102', 'Luis', 'Hernandez', '7121457474', '2020-12-25'),
(3, 2, '103', 'Laura', 'Torres', '8585474857', '2020-12-25'),
(4, 2, '104', 'Carlos', 'Salinas', '7252548475', '2020-12-25'),
(5, 2, '105', 'Alvaro', 'Gonzalez', '7854896852', '2020-12-25'),
(6, 3, '106', 'Irma', 'Arias', '7897895284', '2020-12-25'),
(7, 3, '107', 'Maria', 'Niebla', '7896984568', '2020-12-25'),
(8, 3, '108', 'Ruben', 'Martinez', '7855412354', '2020-12-25'),
(9, 3, '109', 'Jorge', 'Zajgla', '3315474785', '2020-12-25'),
(10, 3, '110', 'Nahum', 'Sanchez', '2515362548', '2020-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id`, `idusuario`, `descripcion`, `cantidad`, `fecha`) VALUES
(1, 2, 'Renta del local', 450, '2020-12-25'),
(2, 3, 'Pago de agua', 150, '2020-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoempleado`
--

CREATE TABLE `pagoempleado` (
  `id` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagoempleado`
--

INSERT INTO `pagoempleado` (`id`, `idempleado`, `cantidad`, `fecha`) VALUES
(1, 3, 660, '2020-12-25'),
(2, 9, 660, '2020-12-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `precio` int(15) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `idusuario`, `nombre`, `cantidad`, `precio`, `fecha`) VALUES
(1, 2, 'Cubetas', 3, 20, '2020-12-25'),
(2, 2, 'Franelas', 10, 15, '2020-12-25'),
(3, 3, 'Mangueras', 2, 50, '2020-12-25'),
(4, 3, 'Cloro', 2, 25, '2020-12-25');

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
  `tipo` int(1) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `pass`, `tipo`, `fecha`) VALUES
(1, 'Jorge Daniel', 'Lopez', '7121584875', 'daniel@correo.com', '12345678', 1, '2020-05-05'),
(2, 'Alyson', 'Vargas Barrios', '7121597825', 'alyson@correo.com', '12345678', 2, '2020-05-05'),
(3, 'Emanuel', 'Lopez', '7121584785', 'emanuel@correo.com', '12345678', 2, '2020-12-25');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagoempleado`
--
ALTER TABLE `pagoempleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD CONSTRAINT `gasto_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pagoempleado`
--
ALTER TABLE `pagoempleado`
  ADD CONSTRAINT `pagoempleado_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
