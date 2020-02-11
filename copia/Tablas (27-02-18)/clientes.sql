-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2016 a las 17:12:29
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `validado` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `email`, `direccion`, `cp`, `provincia`, `telefono`, `password`, `validado`) VALUES
(1, 'Antonio', 'Rodriguez', 'clienteantoniorodriguez@gmail.com', 'La Manzana', '45700', 'Barcelona', '333334', '12345678', 1),
(9, 'Marta', 'Perez', 'marta@gmail.com', 'La Paz', '56789', 'Valencia', '6678989q', '123456789', 1),
(11, 'Carol', 'Martinez ', 'carol@gmail.com', 'La pera', '56789', 'Barcelona', '7899945', '12345678', 1),
(15, 'Noelia', 'Garcia ', 'noe@gmail.com', 'El pedestal', '56787', 'Sevilla', '3445654', '12345678', 1),
(17, 'David', 'Garcia ', 'david@gmail.com', 'El pedestal', '56787', 'Sevilla', '3445654', '12345678', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
