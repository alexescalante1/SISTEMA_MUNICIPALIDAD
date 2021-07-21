-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2021 a las 08:12:51
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `muni`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `dniAdmin` text COLLATE utf8_spanish_ci NOT NULL,
  `userAdmin` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `dark` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `dniAdmin`, `userAdmin`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `dark`, `fecha`) VALUES
(5, '73104785', '', 'Alex Escalante ONE', 'admin@gmail.com', 'vistas/img/perfiles/138.jpg', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, 1, '2021-07-21 05:46:51'),
(162, '73104795', '', 'Alex Escalante TWO', 'alexescalante921@gmail.com', 'vistas/img/perfiles/844.png', '$2a$07$asxx54ahjppf45sd87a5aubFblDrx5VgsL7udWc9pTLp1r8BxczhK', 'administrador', 1, 0, '2021-07-19 03:38:08'),
(165, '73545894', '', 'Fredy Marin Rojas', 'laboral@gmail.com', 'vistas/img/perfiles/972.jpg', '$2a$07$asxx54ahjppf45sd87a5auR6AmIR5N5CndGl8MnjTyLo5SYcp56Qe', 'laboratorista', 0, 1, '2021-07-21 05:44:10'),
(166, '15489562', '', 'Ana Maria', 'ana@gmail.com', 'vistas/img/perfiles/600.jpg', '$2a$07$asxx54ahjppf45sd87a5auzGfz9GaOjSPJ5jEDpHii9vSQEEqY1Zm', 'administrador', 0, 1, '2021-07-21 05:44:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `idCarrusel` int(11) NOT NULL,
  `portada` text NOT NULL,
  `titulo` text NOT NULL,
  `ruta` text NOT NULL,
  `prioridad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`idCarrusel`, `portada`, `titulo`, `ruta`, `prioridad`, `fecha`) VALUES
(19, 'vistas/img/carrusel/midoria.png', 'MIDORIA', 'midoria', 12, '2021-07-21 00:40:04'),
(20, 'vistas/img/carrusel/sasuke.jpg', 'SASUKE', 'sasuke', 11, '2021-07-21 00:40:36'),
(21, 'vistas/img/carrusel/albedo.jpg', 'ALBEDO', 'albedo', 16, '2021-07-21 00:41:12'),
(22, 'vistas/img/carrusel/cosplay.jpg', 'COSPLAY', 'cosplay', 15, '2021-07-21 00:48:31'),
(23, 'vistas/img/carrusel/a.jpg', 'A', 'a', 3, '2021-07-21 05:42:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerencias`
--

CREATE TABLE `gerencias` (
  `idGerencias` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `ruta` text NOT NULL,
  `encargado` text NOT NULL,
  `portada` text NOT NULL,
  `contacto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gerencias`
--

INSERT INTO `gerencias` (`idGerencias`, `titulo`, `ruta`, `encargado`, `portada`, `contacto`) VALUES
(4, 'GERENCIA DE PERSONAL', 'gerencia-de-personal', 'FREDY BLADIMIR SOTO SOLANO', 'vistas/img/gerencias/gerencia-de-personal.jpg', '951487848'),
(5, 'GERENCIA DE INGENIERIA MUNICIPAL', 'gerencia-de-ingenieria-municipal', 'DENIS VASQUEZ  CANAZA', 'vistas/img/gerencias/gerencia-de-ingenieria-municipal.jpg', '954151515'),
(10, 'GERENCIA DE MEDIO AMBIENTE', 'gerencia-de-medio-ambiente', 'FIDEL TICONA YANQUI', 'vistas/img/gerencias/gerencia-de-medio-ambiente.jpg', '954121213'),
(11, 'GERENCIA DE ADMINISTRACION TRIBUTARIA', 'gerencia-de-administracion-tributaria', 'NICOLAS MENDEZ APAZA', 'vistas/img/gerencias/gerencia-de-administracion-tributaria.jpg', '946676898'),
(12, 'GERENCIA DE ADMINISTRACION', 'gerencia-de-administracion', 'DR. EDDY GABRIEL OSTIAS MDAS', 'vistas/img/gerencias/gerencia-de-administracion.jpg', '956848451');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` int(11) NOT NULL,
  `tipoDocTitular` int(11) NOT NULL,
  `numDocTitular` text NOT NULL,
  `nombreTitular` text NOT NULL,
  `apellidoTitular` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `detalle` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visto` int(11) NOT NULL,
  `idDetalleArticulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idNotificacion`, `tipoDocTitular`, `numDocTitular`, `nombreTitular`, `apellidoTitular`, `cantidad`, `dias`, `detalle`, `fecha`, `visto`, `idDetalleArticulo`) VALUES
(167, 0, '454111', 'Alex', 'Esca', 12, 2, 'xde', '2021-07-20 08:24:29', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `Hini` time NOT NULL,
  `Hfin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `logo`, `icono`, `Hini`, `Hfin`) VALUES
(1, 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '22:33:24', '07:36:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicar`
--

CREATE TABLE `publicar` (
  `idPublicar` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `portada` text NOT NULL,
  `multimedia` text NOT NULL,
  `vistas` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `palabrasClave` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `departamento` text NOT NULL,
  `provincia` text NOT NULL,
  `distrito` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicar`
--

INSERT INTO `publicar` (`idPublicar`, `ruta`, `titulo`, `descripcion`, `portada`, `multimedia`, `vistas`, `categoria`, `palabrasClave`, `fecha`, `departamento`, `provincia`, `distrito`) VALUES
(49, 'festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador', 'FESTIVAL VIRTUAL DEL EMPLEO: POSTULA A MÁS DE 300 OFERTAS LABORALES COMO TELEOPERADOR', 'Lima, 19 de julio del 2021.- Con el objetivo de ofrecer más oportunidades laborales a los ciudadanos, la Municipalidad de Lima organiza el tercer Festival Virtual del Empleo, donde acercará más de 300 ofertas de trabajo del rubro de telecomunicaciones.\n\n\nLos interesados deben inscribirse el martes 20 y miércoles 21 de julio en bit.ly/FestivalVirtualDelEmpleoTelco. La iniciativa incluye talleres sobre inteligencia emocional y herramientas para concretar una venta vía telefónica.\n\n\nEs importante mencionar que, para ser parte del proceso de selección, los ciudadanos deben asistir a dos talleres virtuales que se realizarán el 22 de julio. Para conocer la programación completa de las clases pueden ingresar a la página de Facebook Bolsa Laboral de Lima.\n\n\nLuego de ello, la comuna limeña se contactará con los candidatos, mediante correo electrónico y/o WhatsApp, para informarles que fueron preseleccionados y derivarlos a las empresas ofertantes, quienes realizarán el proceso de selección virtual.\n\n\nLa Municipalidad de Lima seguirá llevando a cabo iniciativas que acerquen oportunidades de desarrollo profesional a los vecinos de Lima.', 'vistas/img/publicacion/festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador.jpg', '[{\"foto\":\"vistas/img/multimedia/festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador/a9435e002c7af37be2e88823082aa487_L.jpg\"},{\"foto\":\"vistas/img/multimedia/festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador/WhatsApp Image 2021-07-07 at 4.26.30 PM.jpg\"}]', 0, 1, 'festival', '2021-07-21 00:55:11', 'PUNO', 'PUNO', 'PUNO'),
(50, 'verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca', 'VERIFICAN AVANCE DE LA OBRA ARTICULACIÓN ENTRE LA SALIDA PUNO Y SALIDA AREQUIPA QUE EJECUTA MUNICIPIO DE SAN ROMÁN-JULIACA', 'Por encargo del señor alcalde Mg. David Sucacahua Yucra, el gerente de Infraestructura de la Municipalidad Provincial de San Román-Juliaca (MPSR-J), Ing. Hernán Almonte Pilco, verificó &#8220insitu&#8221 el avance de esta importante obra que comprende desde la salida a Puno hasta la salida Arequipa de la ciudad de Juliaca.\nEste proyecto será una de las principales vías que ayudará en la descongestión de las calles del centro de la ciudad y al mismo tiempo dará fluidez a los vehículos que ingresen de la salida Arequipa y se trasladen a la ciudad de Puno y viceversa\nEsta obra se ejecuta con un presupuesto que supera los 13 millones de soles; la obra contempla la construcción de calzada, construcción de veredas, cunetas, mejoramiento de áreas verdes, mejoramiento del drenaje pluvial además de la implementación de señalización vial. \nEn la actualidad los trabajos se vienen realizando en la avenida América, con trabajos de mejoramiento de sub rasante y sub base, así mismo, la conformación de material para la construcción de veredas.\n\nporque?', 'vistas/img/publicacion/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca.jpg', '[{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/123320823_690382001620675_1338766020286645018_o.jpg\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/123464839_690381968287345_1503858629616099367_o.jpg\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/123506349_690382134953995_7481826288287107874_o.jpg\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/1002151.png\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/a9435e002c7af37be2e88823082aa487_L.jpg\"}]', 0, 3, 'NOTICIA caliente', '2021-07-20 07:04:00', 'PUNO', 'PUNO', 'PUNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pvideos`
--

CREATE TABLE `pvideos` (
  `idPvideos` int(11) NOT NULL,
  `enlace` text NOT NULL,
  `titulo` text NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pvideos`
--

INSERT INTO `pvideos` (`idPvideos`, `enlace`, `titulo`, `categoria`, `fecha`) VALUES
(19, '<iframe width=\"2777\" height=\"1311\" src=\"https://www.youtube.com/embed/NQJgoA96fUY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'BVNDIT(밴디트) - &#34JUNGLE&#34 MUSIC VIDEO', '1', '2021-07-20 21:38:09'),
(20, '<iframe width=\"2777\" height=\"1311\" src=\"https://www.youtube.com/embed/Vp9I_m6znMM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '[BE ORIGINAL] ITZY(있지) &#39WANNABE&#39 (4K)', '1', '2021-07-20 21:39:02'),
(21, '<iframe width=\"2777\" height=\"1311\" src=\"https://www.youtube.com/embed/CGO3vivw9pY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '[BE ORIGINAL] 선미(SUNMI) ‘PPORAPPIPPAM(보라빛 밤)’ (4K)', '2', '2021-07-20 21:39:48'),
(22, '<iframe width=\"2777\" height=\"1311\" src=\"https://www.youtube.com/embed/rmqcWggCqeU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '[BE ORIGINAL] OH MY GIRL(오마이걸) &#39살짝 설렜어(NONSTOP)&#39 (4K)', '2', '2021-07-20 21:41:07'),
(23, '<iframe width=\"2777\" height=\"1311\" src=\"https://www.youtube.com/embed/vWAC8Wkt9ok\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '[BE ORIGINAL] TWICE(트와이스) &#39I CAN&#39T STOP ME&#39 (4K)', '3', '2021-07-20 21:41:58'),
(25, '<iframe width=\"2777\" height=\"1311\" src=\"https://www.youtube.com/embed/UsvoDgmfUwc?list=RDU_jMLB5JgYA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'CHUNG HA 청하 ‘PLAY (FEAT. 창모)’ OFFICIAL MV', '2', '2021-07-21 02:52:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `user` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `modo` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `dni`, `nombre`, `user`, `password`, `email`, `modo`, `foto`, `verificacion`, `emailEncriptado`, `fecha`) VALUES
(53, '162894', '', 'usuarioone', 'estudiante', '$2a$07$asxx54ahjppf45sd87a5aueuBkuSURBtX031YZ8zZTYNNVwIDNOwS', 'estudiante@gmail.com', 'directo', 'vistas/img/usuarios/53/585.png', 0, 'f652b531bff7a32fc1b3b4b59f200070', '2021-02-15 15:47:01'),
(54, '12345786', '', 'docenteone', 'docente', '$2a$07$asxx54ahjppf45sd87a5au5.80yzYkzzYfm4v0hxFjblcuW51TwIK', 'docente@gmail.com', 'directo', 'vistas/img/usuarios/54/956.jpg', 0, '33ff7d62b29b24e8bca8af8531159ea9', '2021-02-15 15:46:30'),
(86, '73104786', '', 'Axel flores mamani', 'axel', '$2a$07$asxx54ahjppf45sd87a5auK5NYo0IVC7CCoZgximaPAKw8SyTE9qe', 'axel@gmail.com', 'directo', 'vistas/img/usuarios/86/903.jpg', 0, '3218da89280d03db1d26f8622068665b', '2021-02-23 00:13:35'),
(87, '12312312', '', 'Martin lopez aliaga', 'martin', '$2a$07$asxx54ahjppf45sd87a5auNRvLS0n1cDa8U2FlopsFBInpxxpEiiG', 'martin@gmail.com', 'directo', 'vistas/img/usuarios/87/723.jpg', 0, 'eb20df43d0bdb3ba79f3143e3267e90a', '2021-02-23 03:09:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`idCarrusel`);

--
-- Indices de la tabla `gerencias`
--
ALTER TABLE `gerencias`
  ADD PRIMARY KEY (`idGerencias`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `notf-art` (`idDetalleArticulo`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicar`
--
ALTER TABLE `publicar`
  ADD PRIMARY KEY (`idPublicar`);

--
-- Indices de la tabla `pvideos`
--
ALTER TABLE `pvideos`
  ADD PRIMARY KEY (`idPvideos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `idCarrusel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `gerencias`
--
ALTER TABLE `gerencias`
  MODIFY `idGerencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `publicar`
--
ALTER TABLE `publicar`
  MODIFY `idPublicar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `pvideos`
--
ALTER TABLE `pvideos`
  MODIFY `idPvideos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
