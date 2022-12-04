-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2022 a las 06:24:58
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drogs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drogas`
--

CREATE TABLE `drogas` (
  `nodo` int(11) NOT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `pregunta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `drogas`
--

INSERT INTO `drogas` (`nodo`, `texto`, `pregunta`) VALUES
(1, 'Ansiedad', 1),
(2, 'Depresión', 1),
(3, 'Temblores', 1),
(4, 'Cansancio', 1),
(5, 'No se a encontrado un diagnostico, acuda a la brevedad con el medico de confiaza', 0),
(6, 'Convulsiones', 1),
(7, 'No se a encontrado un diagnostico, acuda a la brevedad con el medico de confiaza', 0),
(8, 'Cocaína', 0),
(9, 'Irritabilidad', 1),
(12, 'Alucinaciones', 1),
(13, 'No se a encontrado un diagnostico, acuda a la brevedad con el medico de confiaza', 0),
(18, 'Duerme demasiado', 1),
(19, 'No se a encontrado un diagnostico, acuda a la brevedad con el medico de confiaza', 0),
(24, 'Confusión', 1),
(36, 'Dolor abdominal', 1),
(37, 'No se a encontrado un diagnostico, acuda a la brevedad con el medico de confiaza', 0),
(48, 'Alcohol', 0),
(49, 'Barbituricos', 0),
(72, 'Anfetaminas', 0),
(73, 'Problemas para dormir', 1),
(146, 'Marihuana', 0),
(147, 'No se a encontrado un diagnostico, acuda a la brevedad con el medico de confiaza', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `drogas`
--
ALTER TABLE `drogas`
  ADD PRIMARY KEY (`nodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
