-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2016 a las 17:13:29
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
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `prioridad` int(1) NOT NULL,
  `id_producto` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `nombre`, `prioridad`, `id_producto`) VALUES
(16, '1465580105_01.jpg', 1, 18),
(17, '1465580105_02.jpg', 2, 18),
(18, '1465580105_03.jpg', 3, 18),
(19, '1465580732_01.jpg', 1, 19),
(20, '1465580732_02.jpg', 2, 19),
(21, '1465580732_03.jpg', 3, 19),
(22, '1465581222_01.jpg', 1, 20),
(23, '1465581222_02.jpg', 2, 20),
(24, '1465581459_01.jpg', 1, 21),
(25, '1465581459_02.jpg', 2, 21),
(26, '1465582056_01.jpg', 1, 22),
(27, '1465582056_02.png', 2, 22),
(28, '1465582237_01.jpg', 1, 23),
(29, '1465582564_01.jpg', 1, 24),
(30, '1465582564_02.jpg', 2, 24),
(31, '1465582564_03.jpg', 3, 24),
(32, '1465582820_01.png', 1, 25),
(35, '1465637005_01.jpg', 1, 27),
(36, '1465637005_02.jpg', 2, 27),
(37, '1465637902_01.jpg', 1, 28),
(38, '1465637902_02.jpg', 2, 28),
(39, '1465638278_01.jpg', 1, 29),
(40, '1465638278_02.jpg', 2, 29),
(41, '1465638852_01.jpg', 1, 30),
(42, '1465638852_02.jpg', 2, 30),
(43, '1465639339_01.jpg', 1, 31),
(44, '1465639339_02.jpg', 2, 31),
(45, '1465639339_03.jpg', 3, 31),
(46, '1465639741_01.jpg', 1, 32),
(47, '1465639741_02.jpg', 2, 32),
(48, '1465640739_01.jpg', 1, 33),
(49, '1465640739_02.jpg', 2, 33),
(50, '1465640739_03.jpg', 3, 33),
(51, '1465641583_01.jpg', 1, 34),
(52, '1465641583_02.jpg', 2, 34),
(53, '1465641583_03.jpg', 3, 34),
(54, '1465641979_01.jpg', 1, 35),
(55, '1465641979_02.jpg', 2, 35),
(56, '1465642740_01.jpg', 1, 36),
(57, '1465642740_02.jpg', 2, 36),
(58, '1465643939_01.jpg', 1, 37),
(59, '1465643939_02.jpg', 2, 37),
(60, '1465656482_01.jpg', 1, 38),
(61, '1465657419_01.jpg', 1, 39),
(62, '1465657419_02.jpg', 2, 39),
(63, '1465812952_01.jpg', 1, 40),
(64, '1465812952_02.jpg', 2, 40),
(65, '1465813587_01.jpg', 1, 41),
(66, '1465813587_02.jpg', 2, 41),
(67, '1465814209_01.jpg', 1, 42),
(68, '1465814209_02.jpg', 2, 42),
(69, '1465814209_03.jpg', 3, 42),
(70, '1465815403_01.jpg', 1, 43),
(71, '1465815765_01.jpg', 1, 44),
(72, '1465815765_02.jpg', 2, 44),
(76, '1465816386_01.jpg', 1, 46),
(77, '1465816386_02.jpg', 2, 46),
(78, '1465816386_03.jpg', 3, 46),
(79, '1465817043_01.jpg', 1, 47),
(80, '1465817043_02.jpg', 2, 47),
(81, '1465817472_01.jpg', 1, 48),
(82, '1465817472_02.jpg', 2, 48),
(83, '1465817472_03.jpg', 3, 48),
(84, '1465824933_01.jpg', 1, 49),
(85, '1465825298_01.jpg', 1, 50),
(86, '1465825298_02.jpg', 2, 50),
(87, '1465825298_03.jpg', 3, 50),
(88, '1465826211_01.jpg', 1, 51),
(89, '1465826211_02.jpg', 2, 51),
(90, '1465826211_03.jpg', 3, 51),
(91, '1465826894_01.jpg', 1, 52),
(92, '1465826894_02.jpg', 2, 52),
(93, '1465826894_03.jpg', 3, 52),
(94, '1465827828_01.jpg', 1, 53),
(95, '1465827828_02.jpg', 2, 53),
(96, '1465827828_03.jpg', 3, 53),
(97, '1465828927_01.jpg', 1, 54),
(98, '1465828927_02.jpg', 2, 54),
(99, '1482338541_01.jpg', 1, 61),
(100, '1482338541_02.jpg', 2, 61),
(101, '1482338541_03.jpg', 3, 61);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
