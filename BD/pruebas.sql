-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 02:21:37
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aerolineas`
--

CREATE TABLE `aerolineas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aerolineas`
--

INSERT INTO `aerolineas` (`id`, `nombre`, `codigo`, `id_piloto`) VALUES
(1, 'Vuelos de primera', 11223213, 20),
(3, 'viajes por el mundo', 21432423, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE `aviones` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad_puestos` int(11) NOT NULL,
  `id_fabricante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aviones`
--

INSERT INTO `aviones` (`id`, `codigo`, `nombre`, `cantidad_puestos`, `id_fabricante`) VALUES
(1, 243515, 'El primero', 50, 1),
(6, 1566565, 'FT-35', 38, 1),
(20, 123214, 'El segundo', 48, 3),
(21, 6526, 'FT-40', 40, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`id`, `nombre`, `codigo`) VALUES
(1, 'Constructor de Vuelos de primera', 12313232),
(3, 'Constructor de Viajes por el mundo', 21312312);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`) VALUES
(1, 'Cali'),
(2, 'Bogota'),
(3, 'Medellin'),
(4, 'Pereira'),
(5, 'Barranquilla'),
(6, 'Cartagena'),
(7, 'Cucuta'),
(8, 'Armenia'),
(9, 'Yopal'),
(10, 'Bucaramanga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Piloto'),
(3, 'Pasajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(120) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `usuario`, `password`, `id_rol`, `fecha_creacion`) VALUES
(1, 'jorge andres ceron', 'prueba', '$2a$07$asxx54ahjppf45sd87a5auBxWKi32TyN7LTmhz0ONBYdcwSQJ0lWO', 1, '2021-05-24 03:21:30'),
(2, 'jorge', 'pruebaClient', '$2a$07$asxx54ahjppf45sd87a5auBxWKi32TyN7LTmhz0ONBYdcwSQJ0lWO', 3, '2021-05-24 03:36:27'),
(19, 'piloto', 'piloto', '$2a$07$asxx54ahjppf45sd87a5au2zJXOEkG/mGOcU/iUP/mRVrcCkYSrCO', 2, '2021-05-24 18:16:05'),
(20, 'juan pedro', 'juan', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 2, '2021-05-24 18:47:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `costo_pasaje` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_avion` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `id_origen` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `puestos_disponibles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `codigo`, `costo_pasaje`, `fecha`, `hora`, `id_avion`, `id_piloto`, `id_origen`, `id_destino`, `puestos_disponibles`) VALUES
(1, 114234, '$50.000', '2021-05-27', '07:36:00', 1, 20, 2, 1, 49),
(2, 123333, '$50.000', '2021-05-27', '01:56:00', 1, 19, 1, 2, 50),
(3, 213443, '$50.000', '2021-05-26', '04:51:00', 1, 19, 1, 2, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos_clientes`
--

CREATE TABLE `vuelos_clientes` (
  `id_vuelo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelos_clientes`
--

INSERT INTO `vuelos_clientes` (`id_vuelo`, `id_cliente`) VALUES
(1, 2),
(3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AEROLINEAS_USUARIOS` (`id_piloto`);

--
-- Indices de la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AVIONES_FABRICANTE` (`id_fabricante`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USUARIOS_ROL` (`id_rol`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_VUELOS_AVIONES` (`id_avion`),
  ADD KEY `FK_VUELOS_MUNICIPIOS_ORIGEN` (`id_origen`),
  ADD KEY `FK_VUELOS_MUNICIPIOS_DESTINO` (`id_destino`),
  ADD KEY `FK_VUELOS_PILOTOS` (`id_piloto`);

--
-- Indices de la tabla `vuelos_clientes`
--
ALTER TABLE `vuelos_clientes`
  ADD KEY `FK_VUELOSCLIENTES_VUELOS` (`id_vuelo`),
  ADD KEY `FK_VUELOSCLIENTES_USUARIOS` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aviones`
--
ALTER TABLE `aviones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  ADD CONSTRAINT `FK_AEROLINEAS_USUARIOS` FOREIGN KEY (`id_piloto`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD CONSTRAINT `FK_AVIONES_FABRICANTE` FOREIGN KEY (`id_fabricante`) REFERENCES `fabricante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIOS_ROL` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `FK_VUELOS_AVIONES` FOREIGN KEY (`id_avion`) REFERENCES `aviones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VUELOS_MUNICIPIOS_DESTINO` FOREIGN KEY (`id_destino`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VUELOS_MUNICIPIOS_ORIGEN` FOREIGN KEY (`id_origen`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VUELOS_PILOTOS` FOREIGN KEY (`id_piloto`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelos_clientes`
--
ALTER TABLE `vuelos_clientes`
  ADD CONSTRAINT `FK_VUELOSCLIENTES_USUARIOS` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VUELOSCLIENTES_VUELOS` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
