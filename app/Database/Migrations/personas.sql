-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2023 a las 02:27:54
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` int(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `type`, `usuario`, `password`) VALUES
(1, 'jeronimo', 'velez', 123456, 'jvr@gmail.com', 'usuario', 'jvr', '123'),
(2, 'jeronimo', 'velez rojas', 123456, 'jvr@gmail.com', 'usuario', 'jvr-21', '$2y$10$HtklnUlpEe9Hnf7eKr/zCeogmBJhyPF4WlvSZ1fTAT41HCTpWiKhG'),
(3, 'chat', 'gpt', 0, 'gpt@outlook.es', 'usuario', 'gpt', '$2y$10$5P57NQH0PcJv0U57ILhu5OS9y.PSIun4cKxgIYzIBQZdSkFtdVl0K'),
(4, 'marvin', 'god', 34567, 'maragod@hotmail.com', 'usuario', 'maragod', '$2y$10$pQPMHbdh1ORappn3yrmRtO7ySugiVvNdd.WPvwWvPBm0eQyTbg9cS'),
(5, 'erlin', 'halland', 12345, 'city@hotmail.es', 'usuario', 'cyborg', '$2y$10$2cQnAWQ5V4MnOf3p.VkT7.9CO7gk0kYda8EjqpDa8OxHEgQ73o5d2'),
(6, 'e', 'v', 321, 'e@gmail.com', 'usuario', 'e1', '$2y$10$Ues8TDqWQPcikZsg7se.OOYNlrD5qVpqon2wuu/nXm5gzBveMvR1C'),
(7, 'ronal', 'tamayo', 2147483647, 'andres0311@hotmail.com', 'usuario', 'ratamayo', '$2y$10$ZtohkA3eqJDQbv/DwaR4OOesqIZKRoioRW3JZYqztOmK1omT.htuC'),
(8, 'Marvin estebhan', 'lucumi popo ocoro trululu pripra', 123456, 'todosmienten@gmail.com', 'usuario', 'MEss', '$2y$10$GlJ77pKciwiSiPle3vNlG.NrnxxHO6EFcOoj1.EHARdvB74WcN2pW'),
(9, 'Juan', 'cUCALON', 2147483647, 'albertobinladen68@gmail.com', 'usuario', 'osamabinladen', '$2y$10$r7UpV/8H0H/fz426BncQf.JZz.9jhiclEYGs2RNBVg0gXy7dFlWnO'),
(10, 'Santiago', 'Caceres Fernandez', 2147483647, 'scaceresfernandez@gmail.com', 'usuario', 'scaceres10', '$2y$10$XNhkYI8/BACx195DpI5XNefzvbbGk9yB/pOovIXJ88QTdROgtKJQW'),
(11, 'ronal', 'tamayo', 2147483647, 'city@hotmail.es', 'usuario', 'ratamayo1', '$2y$10$4MyNLrryf4LJMUNgcUWQ2OUGOnt42NQAiOzgzG/CseFCxEp6rrOze'),
(12, 'Santiago', 'Caceres Fernandez', 2147483647, 'maragod@hotmail.com', 'usuario', 'hola', '$2y$10$xgVQYZYG.5elgmwgSm5KKu15PXjGGYOMUzqMHw84jNZMnEKJmsYAm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
