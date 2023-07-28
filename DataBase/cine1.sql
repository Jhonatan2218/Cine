-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 07:10:26
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
-- Base de datos: `cine1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `portada` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `sinopsis` varchar(500) NOT NULL,
  `duracion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `titulo`, `portada`, `genero`, `sinopsis`, `duracion`) VALUES
(1, 'Avatar', 'img/peliculas/avatar.jpg', 'Ciencia Ficcion', 'Entramos en el mundo Avatar de la mano de Jake Sully, un ex-Marine en silla de ruedas, que ha sido reclutado para viajar a Pandora, donde existe un mineral raro y muy preciado que puede solucionar la crisis energética existente en la Tierra.', '2h 41min'),
(2, 'Eternals', 'img/peliculas/eternals.png', 'Ciencia Ficcion', 'Los Eternos son una raza de seres inmortales con poderes sobrehumanos que han vivido en secreto en la Tierra durante miles de años. Aunque nunca han intervenido, ahora una amenaza se cierne sobre la humanidad.', '2h 37min'),
(4, 'Gato Con Botas', 'img/peliculas/gatoconbotas.jpg', 'Comedia', 'Mucho antes de conocer a Shrek, el Gato con botas, recién nombrado héroe por salvar a una mujer de la embestida de un toro, tiene que huir de la ciudad cuando comienzan a sospechar que ha robado un banco.', '1h 37min'),
(5, 'Godzilla', 'img/peliculas/godzilla.jpg', 'Acción', 'Ford Brody es un experto de los marines que tiene que ir a Japón para rescatar a su padre. Pronto, los dos hombres se encuentran atrapados en el caos cuando Godzilla, el Rey de los Monstruos, aparece después de pasar décadas debajo del agua.', '2h 3min'),
(6, 'Pantera Negra', 'img/peliculas/panteraNegra.jpg', 'Ciencia Ficcion', 'Hace millones de años, un meteorito de poderoso vibranium impactó en África. Cuando llegó la era del hombre, la mayoría de los habitantes de aquel territorio se unieron bajo el mando de un guerrero chamán.', '2h 15min'),
(7, 'Morbius', 'img/peliculas/morbius.jpg', 'Ciencia Ficcion', 'Ambientada en el universo de Spider Man, se centra en uno de sus villanos más icónicos, Morbius, un doctor que tras sufrir una enfermedad en la sangre y fallar al intentar curarse, se convirtió en un vampiro.', '1h 44min');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` varchar(100) NOT NULL,
  `pelicula` int(100) NOT NULL,
  `cantidadBoletos` int(100) NOT NULL,
  `persona` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `pelicula`, `cantidadBoletos`, `persona`, `fecha`) VALUES
('CIN1980', 2, 4, '1716506660', '2022-12-16'),
('CIN6371', 1, 1, '1716506660', '0000-00-00'),
('CIN7523', 2, 3, '1716506660', '2022-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `int` int(10) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`int`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Trabajador'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `user`, `pwd`, `rol`) VALUES
('1716506660', 'vivi@gmail.com', 'vivi', 'e5899f447900a1a2cafb7ee1135e312620301e72c1e49f2ed03474140b769ba4', 3),
('1725536732', 'bpbryalex98@gmail.com', 'bpbryalex98', 'af0d0b83aa7d52a385a66a4509d7c8b8a36fdbf24618baac3c3feb66793a57d4', 1),
('1725569852', 'trabajador1@gmail.com', 'trabajador1', '6d8f012fee91870ee5d52a9ffd65f467497b866895ac673c5c8dccbce7aebecb', 2),
('1725698547', 'mateo11@gmail.com', 'mateo', '9d5e7c82992e782e6dca58148c5fad255bb73142280e3fb423f493dc554a0b75', 3),
('1725698752', 'jhon@espe.edu.ec', 'jhon', '7c1ab1e1f1d3e35fbd7a1936200d916b2471f9fc11b3a7e04e59e2a8bf58db04', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPelicula`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `pelicula_reserva` (`pelicula`),
  ADD KEY `persona_reserva` (`persona`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`int`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `indices` (`user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_usuarios` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `pelicula_reserva` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`idPelicula`),
  ADD CONSTRAINT `persona_reserva` FOREIGN KEY (`persona`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol_usuarios` FOREIGN KEY (`rol`) REFERENCES `rol` (`int`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
