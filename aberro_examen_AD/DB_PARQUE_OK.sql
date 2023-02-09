-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-02-2023 a las 17:53:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `DB_PARQUE_OK`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ATRACCIONES`
--

CREATE TABLE `ATRACCIONES` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(21) NOT NULL,
  `TEMATICA` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ATRACCIONES`
--

INSERT INTO `ATRACCIONES` (`ID`, `NOMBRE`, `TEMATICA`) VALUES
(2, 'Montana', 'China'),
(4, 'Tio Vivo Medieval', 'Medieval'),
(5, 'Lanzadera', 'Espacial'),
(6, 'Noria de la muerte', 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VIAJERO`
--

CREATE TABLE `VIAJERO` (
  `ID` int(11) NOT NULL,
  `EDAD` int(3) NOT NULL,
  `NOMBRE` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VIAJES`
--

CREATE TABLE `VIAJES` (
  `ID` int(11) NOT NULL,
  `ATRACCION` varchar(21) NOT NULL,
  `EDAD` int(3) NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VIAJES`
--

INSERT INTO `VIAJES` (`ID`, `ATRACCION`, `EDAD`, `FECHA`) VALUES
(1, 'Lanzadera', 25, '2023-02-09'),
(2, 'Montana', 3, '2023-02-09'),
(3, 'Noria de la muerte', 22, '2013-02-06'),
(4, 'Tio Vivo Medieval', 40, '2023-02-08'),
(5, 'Lanzadera', 20, '2023-02-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ATRACCIONES`
--
ALTER TABLE `ATRACCIONES`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ATRACCION` (`NOMBRE`);

--
-- Indices de la tabla `VIAJERO`
--
ALTER TABLE `VIAJERO`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `VIAJES`
--
ALTER TABLE `VIAJES`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ATRACCION` (`ATRACCION`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ATRACCIONES`
--
ALTER TABLE `ATRACCIONES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `VIAJERO`
--
ALTER TABLE `VIAJERO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `VIAJES`
--
ALTER TABLE `VIAJES`
  ADD CONSTRAINT `VIAJES_ibfk_1` FOREIGN KEY (`ATRACCION`) REFERENCES `ATRACCIONES` (`NOMBRE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
