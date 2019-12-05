-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2019 a las 06:53:56
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nocontrol` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido_paterno` varchar(200) NOT NULL,
  `apellido_materno` varchar(200) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `carrera` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nocontrol`, `password`, `nombres`, `apellido_paterno`, `apellido_materno`, `tipo`, `carrera`) VALUES
(6, 'david25', '$2y$10$4C6EAn5tqDfVkRn.M5j3debX9xNEpfguwi9hHir9ARLfz1Lky/oj.', 'david', 'curiel', 'garcia', 1, 'sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `curp` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellido_paterno` varchar(200) NOT NULL,
  `apellido_materno` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `carrera` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `curp`, `password`, `nombres`, `apellido_paterno`, `apellido_materno`, `tipo`, `carrera`) VALUES
(1, 'BEFR960912HSRLLM01', '$2y$10$aKrHRddYtwU7lPm2yfZ8D.L/t0sx33sf8UoAC1.vAQDaTozCFz.x6', 'Romualdo', 'Beltran', 'Felix', 'aspirante', 'Ing. en sistemas'),
(2, '2', '$2y$10$6dicHW32PNm31S/tFtAPxOiLj9NneTcppMdiVQk4BFJ2WCk4P.QMK', '2', '2', '2', 'aspirante', '2'),
(3, '3', '$2y$10$5KqhOMgjh.NNGxYKs25R5OlIfxYo5eXCBb2I5TM7W8qXnR4r8xJoC', '3', '3', '3', 'administrador', '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
