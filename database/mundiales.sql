-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 04:35:21
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundiales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mundiales`
--

CREATE TABLE `mundiales` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `ganador` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `image_01` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mundiales`
--

INSERT INTO `mundiales` (`id`, `name`, `ganador`, `fecha`, `image_01`) VALUES
(2, 'Uruguay', 'Uruguay', '1930', 'uy.png'),
(3, 'Italia', 'Italia', '1934', 'it.png'),
(4, 'Francia', 'Italia', '1938', 'fr.png'),
(5, 'Brasil', 'Uruguay', '1950', 'br.png'),
(6, 'Suiza', 'Alemania', '1954', 'ch.png'),
(7, 'Suecia', 'Brasil', '1958', 'se.png'),
(8, 'Chile', 'Brasil', '1962', 'cl.png'),
(9, 'Inglaterra', 'Inglaterra', '1966', 'gb-eng.png'),
(10, 'Mexico', 'Brasil', '1970', 'mx.png'),
(11, 'Alemania', 'Alemania', '1974', 'de.png'),
(12, 'Argentina', 'Argentina', '1978', 'ar.png'),
(13, 'España', 'Italia', '1982', 'es.png'),
(14, 'Mexico', 'Argentina', '1986', 'mx.png'),
(15, 'Italia', 'Alemania', '1990', 'it.png'),
(16, 'Estados Unidos', 'Brasil', '1994', 'us.png'),
(17, 'Francia', 'Francia', '1998', 'fr.png'),
(18, 'Corea del Sur', 'Brasil', '2002', 'kr.png'),
(19, 'Alemania', 'Italia', '2006', 'de.png'),
(20, 'Sudáfrica', 'España', '2010', 'za.png'),
(21, 'Brasil', 'Alemania', '2014', 'br.png'),
(22, 'Rusia', 'Francia', '2018', 'ru.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mundiales`
--
ALTER TABLE `mundiales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mundiales`
--
ALTER TABLE `mundiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
