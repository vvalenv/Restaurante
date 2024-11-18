-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 14:10:27
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `id_bebida` int(11) NOT NULL,
  `nombre_bebida` varchar(50) NOT NULL,
  `img_bebida` varchar(75) DEFAULT NULL,
  `desc_bebida` varchar(700) NOT NULL,
  `precio_bebida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`id_bebida`, `nombre_bebida`, `img_bebida`, `desc_bebida`, `precio_bebida`) VALUES
(7, 'jugo de naranja', 'img/img_default/bebida.jpg', 'jugo exprimido natural de naranja muy deliciosoooo', 300),
(11, 'coca', 'img/coca.jpg', 'Bebida muy deliciosas que te aseguro que disfrutaras', 475),
(12, 'sprite', 'img/sprite.jpg', 'muy deliciosa al igual que la cocacola', 460),
(13, 'pepsi', 'img/pepsi.jpg', 'para mi es mejor que la coca', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `id_combo` int(11) NOT NULL,
  `nombre_combo` varchar(50) NOT NULL,
  `img_combo` varchar(75) NOT NULL,
  `desc_combo` varchar(700) NOT NULL,
  `precio_combo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combos`
--

INSERT INTO `combos` (`id_combo`, `nombre_combo`, `img_combo`, `desc_combo`, `precio_combo`) VALUES
(6, 'pizza + hambur', 'img/img_default/combo.jpg', 'un combo espectacular que no te podes perder un gran precio', 960),
(7, 'pizza de cebolla + coca', 'img/combaso.jpg', 'increible combo muy solicitado', 1140),
(8, 'double chesse + hambur y sprite', 'img/img_default/combo.jpg', 'combo espectacular a un precio muy bajo pero hay poco stock de lo solicitado que es', 1300),
(10, 'pizza + empas', 'img/pizza + empas.jpg', 'Un combo espectacular a nivel gourmet', 1230),
(11, '2 pizzas de cebolla + pepsi', 'img/noesuncomboperoestabueno.jpg', 'Un combo genial y magnifico que sera la mejor comida que hayas probado', 1350);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas`
--

CREATE TABLE `pizzas` (
  `id_pizza` int(11) NOT NULL,
  `nombre_pizza` varchar(50) NOT NULL,
  `img_pizza` varchar(75) DEFAULT NULL,
  `desc_pizza` varchar(700) NOT NULL,
  `precio_pizza` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pizzas`
--

INSERT INTO `pizzas` (`id_pizza`, `nombre_pizza`, `img_pizza`, `desc_pizza`, `precio_pizza`) VALUES
(8, 'double chesse', 'img/images.jpg', 'Pizza grande con mucho queso, no te la podes perder', 760),
(9, 'double beaconn', 'img/img_default/pizza.jpg', 'Pizza grande con mucha panceta y sabor muy delicioso', 820),
(10, 'cebolla', 'img/210361.jpg', 'Pizza grande con cebolla que no te podes perder de lo espectacular que está', 799),
(15, 'una muy buena pizza', 'img/eataly_las_vegas_-_feb_2019_-_sarah_stierch_12.jpg', 'Una pizza increíble cuyo sabor puede deleitar hasta el mas exquisito de los paladares a un precio ridículamente bajo siendo accesible para cualquiera', 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `contrasena_usuario` varchar(250) NOT NULL,
  `email_usuario` varchar(150) DEFAULT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasena_usuario`, `email_usuario`, `cargo`) VALUES
(5, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'admin'),
(7, 'fram', '81dc9bdb52d04dc20036dbd8313ed055', NULL, ''),
(8, 'cata', 'ac86ab786eece142d86f9568f54d0fd3', NULL, ''),
(9, 'val', '8b334cc5ca63a2511b3f1bc3a9a56f98', 'valentin.villar@eest3necochea.edu.ar', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id_combo`);

--
-- Indices de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id_pizza`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `id_combo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
