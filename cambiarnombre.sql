-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-08-2013 a las 23:32:55
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cambiarnombre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2A6A65D8D93D649` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `user`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcioncorta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `descripcionlarga` longtext COLLATE utf8_unicode_ci NOT NULL,
  `acercade` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`id`, `nombre`, `version`, `descripcioncorta`, `descripcionlarga`, `acercade`) VALUES
(1, 'OilTest', 'V.1.0', 'Sistema que permite evaluar los datos generados en pozos petroleros.', 'Sistema que permite evaluar los datos generados en pozos petroleros, a traves de graficos.', 'Desarrollado por la Ingeniera Fabiola Motola, para la Universidad de Oriente, N&uacute;cleo Monagas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellido`, `username`, `salt`, `password`, `email`, `sexo`, `is_active`, `path`, `descripcion`) VALUES
(1, 'jonathan', 'araul', 'Jonathan.araul', 'e1508464552a0178374563db109a450f', '8c09316865a0145de4f3a4a0cacd52e189582c07', 'Jonthan.araul@gmail.com', 0, 1, 'avatars/jonathan-araul.jpg', '&lt;p&gt;&lt;span class=\\&quot;text-success\\&quot;&gt;Web And Mobile Developer&lt;/span&gt;&lt;/p&gt; Con 5 \n\na&Atilde;&plusmn;os de experiencia. Creando mi propio camino, fundador de Zona de \n\nSistemas, ODU Monagas, Veninsoftware e Hispano Soluciones. &lt;a \n\nhref=\\&quot;https://twitter.com/jonathan_araul\\&quot; target=\\&quot;_blank\\&quot;&gt;Sigueme en 140 \n\ncaracteres&lt;/a&gt;.'),
(2, 'eee', 'eeee', 'pepe', '5fa8a34124390cfaed3f52ae4f6260df', '73d2b977c62448be0978d2e55d999ef61bf140bc', 'pepe@gmail.com', 0, 1, 'images/avatar-man.png', '&lt;h1&gt;Hola a todos&lt;/h1&gt;\n&lt;p&gt;Mi nombre es pepe&lt;/p&gt;\n&lt;a href=\\&quot;https://www.facebook.com/jonathan.araul/\\&quot;&gt;Visiten mi Facebook&lt;/a&gt;');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `FK_2A6A65D8D93D649` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
