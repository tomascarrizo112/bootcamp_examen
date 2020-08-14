-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2020 a las 22:52:44
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bootcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_actor` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `nombre`, `fecha_nacimiento`, `id_actor`) VALUES
(3, 'Leonardo DiCaprio', '11 de noviembre de 1974', 1563247856),
(4, 'Brad Pitt', '18 de diciembre de 1963', 1365894755),
(5, 'Cole Sprouse', '4 de agosto de 1992', 1425789635),
(6, 'KJ Apa', '17 de junio de 1997', 450),
(7, 'Camila Mendes', '29 de junio de 1994', 3907),
(12, 'Robert De Niro', '17 de agosto de 1943', 1786495365);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritas`
--

CREATE TABLE `favoritas` (
  `id` int(11) NOT NULL,
  `id_pelicula` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `favoritas`
--

INSERT INTO `favoritas` (`id`, `id_pelicula`, `fecha_creacion`) VALUES
(1, '1', '2020-08-14 20:35:48'),
(2, '3', '2020-08-14 20:42:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `fecha_estreno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `sinopsis` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `actorprincipalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `fecha_estreno`, `titulo`, `duracion`, `sinopsis`, `imagen`, `actorprincipalid`) VALUES
(1, '5 de febrero de 1998', 'Titanic', '3h 30m', 'Una joven de la alta sociedad abandona a su arrogante pretendiente por un artista humilde en el trasatlÃ¡ntico que se hundiÃ³ durante su viaje inaugural.', '1422325035419870073.jpg', 1563247856),
(2, '21 de noviembre de 2019', 'El Irlandes', '3h 30m', 'Frank Sheeran, veterano de la Segunda Guerra Mundial, estafador y asesino a sueldo recuerda su participaciÃ³n en el asesinato de Jimmy Hoffa. Uno de los grandes misterios sin resolver del paÃ­s: la desapariciÃ³n del legendario sindicalista Jimmy Hoffa. Un gran viaje por los turbios entresijos del crimen organizado: sus mecanismos internos, rivalidades', '14223469644images.jpg', 1786495365),
(3, '15 de octubre de 2014', 'Corazones de hierro', '2h 15m', 'Durante la Segunda Guerra Mundial, un aguerrido sargento del ejÃ©rcito encabeza el equipo de un tanque Sherman en una misiÃ³n mortal detrÃ¡s de lÃ­neas enemigas para golpear el corazÃ³n de la Alemania nazi.', '14223749279images.jpg', 1365894755),
(4, '30 de abril de 2020', 'Mentiras peligrosas', '1h 36m', 'Justo antes de morir, un anciano designa a su nueva cuidadora como la heredera de su fortuna. Sin embargo, este regalo la involucrarÃ¡ en una red de engaÃ±os y asesinatos. Si quiere sobrevivir, no puede fiarse de nadie, ni siquiera de sus seres queridos.', '14223842178images.jpg', 3907),
(5, '15 de marzo de 2019', 'A dos metros de ti', '1h 57m', 'Stella, de 17 aÃ±os, estÃ¡ ingresada en un hospital porque padece fibrosis quÃ­stica. Su monÃ³tona existencia cambia cuando llega Will, un adolescente con la misma dolencia. Sin embargo, las normas del hospital prohÃ­ben el contacto entre ellos.', '14224064508c4feb346fc8265a7f1858fe9950f8ec2.jpg', 1425789635),
(6, '3 de mayo de 2019', 'Nuestro ultimo verano', '1h 50m', 'Graduados de una escuela secundaria inglesa experimentan el amor y la amistad durante su Ãºltimo verano juntos antes de ir a la universidad.', '14224191995the_last_summer-939716228-large.jpg', 450);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritas`
--
ALTER TABLE `favoritas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `favoritas`
--
ALTER TABLE `favoritas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
