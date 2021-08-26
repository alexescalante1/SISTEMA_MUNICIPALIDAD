-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2021 a las 09:36:17
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
(5, '73104785', '', 'Alex Escalante ONE', 'admin@gmail.com', 'vistas/img/perfiles/138.jpg', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrador', 1, 1, '2021-07-22 22:36:38'),
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
(22, 'vistas/img/carrusel/cosplay.jpg', 'COSPLAY', 'cosplay', 15, '2021-07-21 00:48:31'),
(24, 'vistas/img/carrusel/actividad-cultural.jpg', 'ACTIVIDAD CULTURAL', 'actividad-cultural', 99, '2021-07-24 00:26:38'),
(25, 'vistas/img/carrusel/eventos.jpg', 'EVENTOS', 'eventos', 55, '2021-07-24 01:10:48'),
(28, 'vistas/img/carrusel/albedo.jpg', 'ALBEDO', 'albedo', 12, '2021-07-24 01:17:53'),
(29, 'vistas/img/carrusel/sasuke.jpg', 'SASUKE', 'sasuke', 66, '2021-07-24 01:22:17'),
(30, 'vistas/img/carrusel/bebidas.jpg', 'BEBIDAS', 'bebidas', 44, '2021-07-24 07:31:37');

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
(49, 'festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador', 'FESTIVAL VIRTUAL DEL EMPLEO: POSTULA A MÁS DE 300 OFERTAS LABORALES COMO TELEOPERADOR', 'Lima, 19 de julio del 2021.- Con el objetivo de ofrecer más oportunidades laborales a los ciudadanos, la Municipalidad de Lima organiza el tercer Festival Virtual del Empleo, donde acercará más de 300 ofertas de trabajo del rubro de telecomunicaciones.\n\n\nLos interesados deben inscribirse el martes 20 y miércoles 21 de julio en bit.ly/FestivalVirtualDelEmpleoTelco. La iniciativa incluye talleres sobre inteligencia emocional y herramientas para concretar una venta vía telefónica.\n\n\nEs importante mencionar que, para ser parte del proceso de selección, los ciudadanos deben asistir a dos talleres virtuales que se realizarán el 22 de julio. Para conocer la programación completa de las clases pueden ingresar a la página de Facebook Bolsa Laboral de Lima.\n\n\nLuego de ello, la comuna limeña se contactará con los candidatos, mediante correo electrónico y/o WhatsApp, para informarles que fueron preseleccionados y derivarlos a las empresas ofertantes, quienes realizarán el proceso de selección virtual.\n\n\nLa Municipalidad de Lima seguirá llevando a cabo iniciativas que acerquen oportunidades de desarrollo profesional a los vecinos de Lima.', 'vistas/img/publicacion/festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador.jpg', '[{\"foto\":\"vistas/img/multimedia/festival-virtual-del-empleo-postula-a-mas-de-300-ofertas-laborales-como-teleoperador/a9435e002c7af37be2e88823082aa487_L.jpg\"}]', 0, 1, 'limpieza', '2021-07-24 06:50:41', 'PUNO', 'PUNO', 'PUNO'),
(50, 'verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca', 'VERIFICAN AVANCE DE LA OBRA ARTICULACIÓN ENTRE LA SALIDA PUNO Y SALIDA AREQUIPA QUE EJECUTA MUNICIPIO DE SAN ROMÁN-JULIACA', 'Por encargo del señor alcalde Mg. David Sucacahua Yucra, el gerente de Infraestructura de la Municipalidad Provincial de San Román-Juliaca (MPSR-J), Ing. Hernán Almonte Pilco, verificó &#8220insitu&#8221 el avance de esta importante obra que comprende desde la salida a Puno hasta la salida Arequipa de la ciudad de Juliaca.\nEste proyecto será una de las principales vías que ayudará en la descongestión de las calles del centro de la ciudad y al mismo tiempo dará fluidez a los vehículos que ingresen de la salida Arequipa y se trasladen a la ciudad de Puno y viceversa\nEsta obra se ejecuta con un presupuesto que supera los 13 millones de soles; la obra contempla la construcción de calzada, construcción de veredas, cunetas, mejoramiento de áreas verdes, mejoramiento del drenaje pluvial además de la implementación de señalización vial. \nEn la actualidad los trabajos se vienen realizando en la avenida América, con trabajos de mejoramiento de sub rasante y sub base, así mismo, la conformación de material para la construcción de veredas.\n\nporque?', 'vistas/img/publicacion/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca.jpg', '[{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/123320823_690382001620675_1338766020286645018_o.jpg\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/123464839_690381968287345_1503858629616099367_o.jpg\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/123506349_690382134953995_7481826288287107874_o.jpg\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/1002151.png\"},{\"foto\":\"vistas/img/multimedia/verifican-avance-de-la-obra-articulacion-entre-la-salida-puno-y-salida-arequipa-que-ejecuta-municipio-de-san-roman-juliaca/a9435e002c7af37be2e88823082aa487_L.jpg\"}]', 0, 3, 'saneamiento', '2021-07-23 23:48:24', 'PUNO', 'PUNO', 'PUNO'),
(80, 'mml-organiza-actividades-en-bicicleta-por-los-200-anos-de-la-independencia-nacional', 'MML ORGANIZA ACTIVIDADES EN BICICLETA POR LOS 200 AÑOS DE LA INDEPENDENCIA NACIONAL', 'A fin de ofrecer a los ciudadanos diferentes actividades recreativas donde se promueva el uso de la bicicleta y continuar con la recuperación de espacios públicos, la Municipalidad de Lima ha planificado actividades para todas las edades, en el marco de los 200 años de la independencia nacional.\n\nAsí, este domingo 25 de julio se realizará el megaevento Pedaleando por el Bicentenario del Perú, dirigido a ciudadanos mayores de edad, con el propósito de unir a través de la bicicleta a la costa, sierra y selva del país. Podrán participar quienes se inscriban a través de la cuenta de Facebook de Ciclolima; cabe señalar que los cupos son limitados.\n\nA la fecha, ya son varios los ciudadanos inscritos, representantes de 43 distritos de Lima Metropolitana y de comunidades ciclistas de diferentes ciudades del país. Todos ellos partirán de la plaza San Martín a las 10 a.m. y recorrerán los distritos de Jesús María, Pueblo Libre, San Miguel y Miraflores hasta llegar a la playa Agua Dulce, en Chorrillos.\n\nEl evento se llevará a cabo con todos los protocolos de bioseguridad; además, se contará con el apoyo de cada municipio para el resguardo de los participantes,  ambulancias distritales, el equipo de Sisol Salud y efectivos de la Policía Nacional.\n\nAl Damero de Pizarro sin carro\n\nEste domingo también habrá actividades gratuitas en las 68 manzanas del Centro Histórico, a través del programa Al Damero de Pizarro sin carro. De 9:30 a.m. a 12:30 p.m., en el cruce de los jirones De la Unión y Camaná, se brindarán clases de ajedrez y pintura. En tanto, en los cruces de los jirones Ica y Camaná se darán clases de baile y taekwondo.\n\nTambién se podrá adquirir artesanía peruana en las ferias ubicadas en la Plazuela de las Artes del Teatro Municipal, en las plazuelas Santo Domingo y San Agustín, así como en la cuadra 6 del jirón Camaná. Durante la jornada, los asistentes podrán degustar de platillos y dulces limeños en la plazuela Las Limeñitas y en la alameda Chabuca Granda.', 'vistas/img/publicacion/mml-organiza-actividades-en-bicicleta-por-los-200-anos-de-la-independencia-nacional.jpg', '[{\"foto\":\"vistas/img/multimedia/mml-organiza-actividades-en-bicicleta-por-los-200-anos-de-la-independencia-nacional/aa_9.jpg\"},{\"foto\":\"vistas/img/multimedia/mml-organiza-actividades-en-bicicleta-por-los-200-anos-de-la-independencia-nacional/aa_1.jpg\"}]', 0, 2, 'bici', '2021-07-24 06:50:55', 'PUNO', 'PUNO', 'PUNO'),
(81, 'ven-a-disfrutar-del-avistamiento-de-aves-en-el-parque-de-las-leyendas', 'VEN A DISFRUTAR DEL AVISTAMIENTO DE AVES EN EL PARQUE DE LAS LEYENDAS', 'El colibrí, el turtupilín, el violinista y las garzas son algunas de las aves que el público podrá ver este sábado 24 de julio en la actividad de avistamiento de aves urbanas que se desarrollará en el Parque de las Leyendas de Lima.\n\nEl evento se llevará a cabo de 9 a 10:30 a.m. y estará a cargo del personal de Educación, Cultura y Turismo del recinto, junto con el Proyecto de Aves Urbanas de Lima de Corbidi, que tiene la finalidad de promover la observación de aves y el contacto con la naturaleza en entornos urbanos.\n\nEl punto de partida será la entrada a la zona Selva y se recorrerá todo el sendero de este lugar en busca de las diez especies que visitan este importante centro de esparcimiento. Además, los asistentes podrán traer sus propios binoculares para disfrutar de esta experiencia inolvidable.', 'vistas/img/publicacion/ven-a-disfrutar-del-avistamiento-de-aves-en-el-parque-de-las-leyendas.jpg', '[{\"foto\":\"vistas/img/multimedia/ven-a-disfrutar-del-avistamiento-de-aves-en-el-parque-de-las-leyendas/fc3b5804fdd6a600776d8bf97d8fee76_L.jpg\"},{\"foto\":\"vistas/img/multimedia/ven-a-disfrutar-del-avistamiento-de-aves-en-el-parque-de-las-leyendas/Foto_2.jpg\"}]', 0, 2, 'verde', '2021-07-24 05:45:24', 'PUNO', 'PUNO', 'PUNO'),
(82, 'mml-y-atu-intervienen-a-mas-de-400-conductores-de-transporte-informal-en-la-av-colonial', 'MML Y ATU INTERVIENEN A MÁS DE 400 CONDUCTORES DE TRANSPORTE INFORMAL EN LA AV. COLONIAL', 'En un operativo inopinado en el Cercado de Lima, 434 conductores fueron intervenidos por la Autoridad de Transporte Urbano para Lima y Callao (ATU) y la Municipalidad de Lima. \n\nLa labor de fiscalización se realizó en la Av. Colonial, donde 80 conductores fueron sancionados por no contar con la documentación en regla y la licencia para circular; cabe señalar que se contó con el apoyo de la Policía Nacional. Asimismo, en vías alternas se impusieron seis actas de fiscalización a vehículos particulares que prestaban servicio de transporte informal.\n\nA todos ellos se les aplicaron multas de hasta cuatro UIT (unidad impositiva tributaria).   \n\nPor su parte, los inspectores de movilidad urbana de la comuna capitalina también apoyaron en la verificación del cumplimiento de los protocolos sanitarios contra el COVID-19.', 'vistas/img/publicacion/mml-y-atu-intervienen-a-mas-de-400-conductores-de-transporte-informal-en-la-av-colonial.jpg', '[{\"foto\":\"vistas/img/multimedia/mml-y-atu-intervienen-a-mas-de-400-conductores-de-transporte-informal-en-la-av-colonial/73050b15c6d0075b033f86f21df368a5_L.jpg\"},{\"foto\":\"vistas/img/multimedia/mml-y-atu-intervienen-a-mas-de-400-conductores-de-transporte-informal-en-la-av-colonial/MML_Y_ATU_INTERVIENEN_A_TRANSPORTE_INFORMAL_1.jpg\"}]', 0, 1, 'poli', '2021-07-24 05:46:44', 'PUNO', 'PUNO', 'PUNO'),
(83, 'municipalidad-de-lima-ilumina-de-rojo-y-blanco-la-pileta-peru-por-fiestas-patrias', 'MUNICIPALIDAD DE LIMA ILUMINA DE ROJO Y BLANCO LA PILETA PERÚ POR FIESTAS PATRIAS', 'En el marco de las celebraciones por el bicentenario, la Municipalidad de Lima rinde homenaje a los 200 años de independencia nacional iluminando de rojo y blanco la pileta de la plaza Perú, ubicada al costado de Palacio de Gobierno.\n\nLos vecinos podrán disfrutar de este espectáculo de 6:30 a 9 p.m., desde hoy hasta el sábado 31 de julio. Para iluminar esta fuente se utilizan 24 luminarias LED de 45W (circulares y sumergibles) y 8 reflectores LED que no perturban la visión de los peatones que transitan por la zona. \n\nCabe destacar que, a fin de apostar por mejoras en eficiencia energética y modernizar la iluminación en lugares representativos de la ciudad, la comuna limeña viene implementando el Plan Integral de Luminarias LED. A la fecha se han colocado más de 750 luminarias en diversas plazas, parques y fachadas del Cercado, generando un ahorro del 23% de energía.\n\nLa Municipalidad de Lima seguirá mejorando la iluminación de los espacios públicos, utilizando nuevas tecnologías energéticamente eficientes y con mayor duración que las luces tradicionales.', 'vistas/img/publicacion/municipalidad-de-lima-ilumina-de-rojo-y-blanco-la-pileta-peru-por-fiestas-patrias.jpg', '[{\"foto\":\"vistas/img/multimedia/municipalidad-de-lima-ilumina-de-rojo-y-blanco-la-pileta-peru-por-fiestas-patrias/5dc1280aba8cb25769c6b5c7ed14967e_L.jpg\"}]', 0, 3, 'aguas', '2021-07-24 05:47:37', 'PUNO', 'PUNO', 'PUNO'),
(84, 'mml-invita-a-los-ninos-y-ninas-a-ser-consejeros-del-alcalde', 'MML INVITA A LOS NIÑOS Y NIÑAS A SER CONSEJEROS DEL ALCALDE', 'A fin de promover su participación activa en la mejora de la ciudad, la Municipalidad de Lima invita a los niños y niñas a formar parte del Consejo del Alcalde, un espacio legítimo de participación en el que compartirán sus opiniones e ideas, con el objetivo de orientar el trabajo de la autoridad edil.\n\nLos postulantes deben tener entre 8 y 11 años (con 3 meses como máximo), residir en cualquier distrito de Lima Metropolitana y querer dar a conocer la realidad y necesidades de la niñez, a fin de tomar acciones a su favor. \n\nLas inscripciones se realizan en la página web de la Municipalidad de Lima (www.munlima.gob.pe) o del Parque de las Leyendas (www.leyendas.gob.pe) completando el formulario y el permiso (firmado por papá o mamá). El plazo vence el domingo 1 de agosto.\n\nAquellos interesados en participar podrán pertenecer a uno de estos grupos: Consejo Ambiental, Consejo de Educación, Consejo de Deporte y Recreación, Consejo de Salud, Consejo del Buen Trato, Consejo de Turismo, Consejo de Cultura, Consejo del Cercado de Lima, Guardianes del Centro Histórico y Guardianes del Parque de las Leyendas. En total se espera contar con más de 150 niños consejeros en este nuevo periodo.\n\nLa elección se llevará a cabo a través de un sorteo público que será transmitido en las redes sociales de la comuna para garantizar un proceso inclusivo y democrático en el que todas las niñas y niños puedan participar en igualdad de condiciones.  \n\nDe esta manera la Municipalidad de Lima sigue impulsando el ejercicio de los ciudadanos de todas las edades, permitiendo que sus voces sean escuchadas y tomadas en cuenta para contribuir al desarrollo de la ciudad.', 'vistas/img/publicacion/mml-invita-a-los-ninos-y-ninas-a-ser-consejeros-del-alcalde.jpg', '[{\"foto\":\"vistas/img/multimedia/mml-invita-a-los-ninos-y-ninas-a-ser-consejeros-del-alcalde/fdd05245f71c7c18b9480bf44cbabd34_L.jpg\"}]', 0, 1, 'nns', '2021-07-24 05:48:32', 'PUNO', 'PUNO', 'PUNO'),
(85, 'fiestas-patrias-fantasticos-viales-de-lima-ofreceran-divertido-show-tradicional-por-el-bicentenario', 'FIESTAS PATRIAS: FANTÁSTICOS VIALES DE LIMA OFRECERÁN DIVERTIDO SHOW TRADICIONAL POR EL BICENTENARIO', 'Con música de la costa, sierra y selva, los Fantásticos Viales de la Municipalidad de Lima realizarán divertidas activaciones en calles del Cercado y otros distritos, a fin de concientizar a los ciudadanos sobre el respeto a las normas de tránsito, como parte de las actividades programadas por el mes del bicentenario.\n\nDel 22 al 31 de julio, los educadores viales de la Gerencia de Movilidad Urbana, luciendo sombreros y pañoletas, sorprenderán a conductores y peatones con un show vial de bailes tradicionales en vías del Centro Histórico de Lima, Los Olivos, San Juan de Lurigancho, Surco, Barranco y Surquillo.\n\nAsimismo, el jueves 22 de julio, a las 6 p.m., se llevará a cabo una charla virtual gratuita. Bajo el nombre &#8220¿Qué hacer frente a un accidente de tránsito?&#8221, la coordinadora del Programa Municipal de Víctimas de Accidentes de Tránsito, Nancy Ñavincopa, brindará recomendaciones a los actores viales sobre los riesgos a los que se exponen en el tráfico.\n\nCabe precisar que la capacitación se llevará a cabo mediante la plataforma Google Meet. Los interesados deberán acceder a través del siguiente enlace: https://meet.google.com/ozk-cpzw-tpp.\n\nCon estas acciones la Municipalidad de Lima busca reforzar actitudes, valores y normas en las redes viales, y así reducir los índices de lesiones y muertes por accidentes de tránsito.', 'vistas/img/publicacion/fiestas-patrias-fantasticos-viales-de-lima-ofreceran-divertido-show-tradicional-por-el-bicentenario.jpg', '[{\"foto\":\"vistas/img/multimedia/fiestas-patrias-fantasticos-viales-de-lima-ofreceran-divertido-show-tradicional-por-el-bicentenario/fb3fa8039f9ad71295932270ce472c7a_L.jpg\"},{\"foto\":\"vistas/img/multimedia/fiestas-patrias-fantasticos-viales-de-lima-ofreceran-divertido-show-tradicional-por-el-bicentenario/Fantásticos_2.jpg\"}]', 0, 1, 'baile', '2021-07-24 05:50:13', 'PUNO', 'PUNO', 'PUNO'),
(86, 'municipalidad-de-lima-presenta-segunda-feria-agroecologica-allinta-mikuy-en-pachacamac', 'MUNICIPALIDAD DE LIMA PRESENTA SEGUNDA FERIA AGROECOLÓGICA ALLINTA MIKUY EN PACHACÁMAC', 'A través de su Programa de Gobierno Regional, la Municipalidad de Lima presenta una nueva edición de la feria agroecológica Allinta Mikuy, en Pachacámac, con el objetivo de promover nuevos espacios de comercialización de productos naturales, saludables y de calidad.\n\nEl evento contará con el apoyo del municipio de Pachacámac y se llevará a cabo el miércoles 21 de julio, en el nuevo Mercado Jumbo, en la Av. Paul Poblet 3111 (antes Av. Manuel Valle), de 10 a.m. a 4 p.m. Durante la actividad se implementarán protocolos de bioseguridad, como la entrega de alcohol y la toma de temperatura. Además, los comerciantes contarán con todos los elementos que aseguren la correcta manipulación de alimentos.\n\nEn total, 15 productores del valle de Lurín fomentarán el consumo de alimentos saludables, a través de la venta de productos, como miel de abeja, carne de cerdo, pato, chirimoya, lúcuma, yogur natural, huevos, paltas, hortalizas frescas, entre otras.\n\nEsta iniciativa, promovida por la comuna limeña, se replicará en otros distritos, a fin de contribuir a la concientización de una alimentación saludable y mejorar la economía de los emprendedores y microempresarios de la capital, a través de la visibilización de sus negocios.\n\nCabe mencionar que el Programa de Gobierno Regional viene brindando constantemente asistencia técnica a los productores agrarios y pecuarios de los valles de Chillón, Rímac y Lurín, a través de sus agencias agrarias. También reciben capacitación en temas orientados a gestión empresarial y marketing digital para fortalecer sus capacidades y competencias.\n\nPara más información sobre cómo participar en las próximas ferias pueden escribir al WhatsApp 952 807 286 o a odelgado@pgrlm.gob.pe, de 9 a.m. a 5 p.m.', 'vistas/img/publicacion/municipalidad-de-lima-presenta-segunda-feria-agroecologica-allinta-mikuy-en-pachacamac.jpg', '[{\"foto\":\"vistas/img/multimedia/municipalidad-de-lima-presenta-segunda-feria-agroecologica-allinta-mikuy-en-pachacamac/c3b3e62c43315f1f6313eb16c189b97d_L.jpg\"},{\"foto\":\"vistas/img/multimedia/municipalidad-de-lima-presenta-segunda-feria-agroecologica-allinta-mikuy-en-pachacamac/EE_3.jpg\"}]', 0, 1, 'pollo', '2021-07-24 05:52:00', 'PUNO', 'PUNO', 'PUNO'),
(87, 'mas-de-240-mil-contribuyentes-actualizaron-sus-datos-en-la-web-del-sat-de-lima', 'MÁS DE 240 MIL CONTRIBUYENTES ACTUALIZARON SUS DATOS EN LA WEB DEL SAT DE LIMA', 'El Servicio de Administración Tributaria (SAT) de Lima informa que 243,718 contribuyentes (más del 87% de los que tributan ante la entidad recaudadora) lograron registrar sus datos en la página web www.sat.gob.pe. Ahora ellos reciben información oportuna sobre beneficios y estados de cuenta. \n\nDel total de personas que actualizaron sus datos, 122,199 registraron su teléfono y/o correo electrónico; 9,611, solo su mail; y 111,908, su número telefónico. Asimismo, este año 52,614 contribuyentes registraron su teléfono fijo, móvil, correo electrónico y domicilio fiscal.\n\nCabe resaltar que si actualizan sus datos, el SAT puede informar, de manera precisa, sobre los beneficios tributarios vigentes y deudas pendientes. Además, podrán conocer las facilidades de pago y canales virtuales disponibles, así como los premios que pueden ganar si cumplen oportunamente con sus obligaciones tributarias. \n\nTambién se les enviará, a través de los canales que hayan consignado, la programación completa de los cursos virtuales gratuitos a los que pueden acceder por ser vecinos puntuales. \n\nActualiza tus datos y gana\n\nPara actualizar tus datos debes ingresar con tu código de contribuyente y contraseña a www.sat.gob.pe/contacto. Si realizas este proceso hasta el 31 de agosto, podrás participar en el sorteo de una gift card de S/500 para hacer compras en supermercados. \n\nAdemás, deberás ser contribuyente afecto 2021, persona natural o sociedad conyugal, haber pagado hasta la tercera cuota del año al 31 de agosto de este año y no tener deuda pendiente anterior.\n\nPara más información puedes comunicarte a las líneas de WhatsApp (956 212 291, 983 744 044, 999 431 111, 940 199 995, 956 212 260 y 956 212 205), al correo contactosat@sat.gob.pe, a la página de Facebook SAT de Lima o al chat en línea ingresando a www.sat.gob.pe, sección &#8220Contáctenos&#8221.', 'vistas/img/publicacion/mas-de-240-mil-contribuyentes-actualizaron-sus-datos-en-la-web-del-sat-de-lima.jpg', '[{\"foto\":\"vistas/img/multimedia/mas-de-240-mil-contribuyentes-actualizaron-sus-datos-en-la-web-del-sat-de-lima/ace6a4821e84d845bb934a7624cf41c6_L.jpg\"}]', 0, 1, 'pc', '2021-07-24 05:54:00', 'PUNO', 'PUNO', 'PUNO'),
(88, 'mml-labores-de-mejoramiento-de-veredas-y-semaforizacion-en-av-mariategui-presentan-mas-del-82-de-avance', 'MML: LABORES DE MEJORAMIENTO DE VEREDAS Y SEMAFORIZACIÓN EN AV. MARIÁTEGUI PRESENTAN MÁS DEL 82% DE AVANCE', 'La Municipalidad de Lima, a través del Programa de Gobierno Regional, viene ejecutando los trabajos de mejoramiento de veredas y semaforización en la Av. José Carlos Mariátegui, en San Juan de Lurigancho, que presentan un avance del 82.58%.\n\nLas labores concluyeron entre el pasaje Bristol y la Av. Wiesse, en 1,3 km. En dicha zona, en los próximos días se instalarán 57 semáforos con luces LED; 15 de ellos contarán con repetidores acústicos, con el objetivo de que sean accesibles para las personas invidentes.\n\nA través de su Programa de Gobierno Regional, la comuna limeña realiza la ejecución de esta importante arteria, la cual culminaría la primera quincena de agosto, según el expediente técnico.\n\nUna vez concluidos los trabajos en su totalidad, más de 30 mil vecinos de esta parte de la capital se desplazarán de manera más segura por la Av. Mariátegui, gracias a una adecuada señalización y veredas en buen estado.\n\nLas labores incluyen la construcción de veredas (8,583.82 m2), rampas para personas con discapacidad (320.67 m2) y rampas vehiculares (153.16 m2), así como el mejoramiento de la berma central (239.86 m2), la instalación de siete paraderos, y la señalización horizontal y vertical en la zona intervenida.\n\nTal como ocurre en las demás obras que lleva a cabo la comuna capitalina, se implementó el protocolo de bioseguridad para la prevención del COVID-19, a fin de proteger la salud de los trabajadores y vecinos que viven en los alrededores.', 'vistas/img/publicacion/mml-labores-de-mejoramiento-de-veredas-y-semaforizacion-en-av-mariategui-presentan-mas-del-82-de-avance.jpg', '[{\"foto\":\"vistas/img/multimedia/mml-labores-de-mejoramiento-de-veredas-y-semaforizacion-en-av-mariategui-presentan-mas-del-82-de-avance/d9ba7ef412e735dfcc5b550b4c995fc7_L.jpg\"}]', 0, 3, 'xd', '2021-07-24 05:55:16', 'PUNO', 'PUNO', 'PUNO'),
(89, 'conoce-la-nueva-edicion-del-minirrecetario-lima-de-antano-por-el-bicentenario', 'CONOCE LA NUEVA EDICIÓN DEL MINIRRECETARIO &#8220LIMA DE ANTAÑO&#8221 POR EL BICENTENARIO', 'Conmemorando el bicentenario de la independencia nacional, y con el objetivo de fortalecer el sector gastronómico, la Municipalidad de Lima presenta la séptima edición del minirrecetario &#8220Lima de antaño&#8221, donde la ciudadanía encontrará recetas tradicionales de la costa, sierra y selva del país.\n\nEn esta oportunidad, el recetario de la comuna limeña incluye el aporte de los cocineros del restaurante Resto Bar Bolívar y la Asociación Sazón y Sabor Peruano, quienes comparten los secretos del cebiche, la pachamanca, el tacacho con cecina y el pisco sour.\n\nEsta publicación, que se encuentra en la página web Visita Lima (http://visitalima.pe/clase/recetario/), ofrece un viaje por las principales regiones del país e invita a conocer la historia de cada plato, así como su preparación.', 'vistas/img/publicacion/conoce-la-nueva-edicion-del-minirrecetario-lima-de-antano-por-el-bicentenario.jpg', '[{\"foto\":\"vistas/img/multimedia/conoce-la-nueva-edicion-del-minirrecetario-lima-de-antano-por-el-bicentenario/96a4275511ad1f14ea71122ae016cb9d_L.jpg\"},{\"foto\":\"vistas/img/multimedia/conoce-la-nueva-edicion-del-minirrecetario-lima-de-antano-por-el-bicentenario/turismo_001.jpg\"}]', 0, 1, 'gastronomia', '2021-07-24 05:56:18', 'PUNO', 'PUNO', 'PUNO'),
(90, 'municipalidad-de-lima-entrego-200-canastas-a-familias-vulnerables-de-pacientes-con-covid-19', 'MUNICIPALIDAD DE LIMA ENTREGÓ 200 CANASTAS A FAMILIAS VULNERABLES DE PACIENTES CON COVID-19', 'A fin de apoyar a las familias que tienen entre sus integrantes a pacientes con COVID-19, la Municipalidad de Lima entregó 200 canastas con productos de primera necesidad, cumpliendo con todos los protocolos de bioseguridad.\n\nLos beneficiarios provienen de diversos distritos de Lima Metropolitana, entre ellos Comas, Rímac, Carabayllo, Puente Piedra, San Martín de Porres, San Juan de Lurigancho, San Juan de Miraflores, Villa El Salvador, Villa María del Triunfo, El Agustino, Ate, Independencia y el Cercado.\n\nLos hogares favorecidos, empadronados por las organizaciones sociales de la comuna limeña, como casas comunales, Demuna Lima, la Unidad de Empadronamiento Local (ULE), el Programa de Conglomerados, servicios sociales y centros comunales, tienen entre sus integrantes a adultos o adultos mayores, así como personas con discapacidad y población migrante que vive en situación de vulnerabilidad.\n\nLa donación incluyó productos de primera necesidad como arroz, azúcar, aceite vegetal, conservas de atún, fideos, avena, menestras, leche, entre otros, los cuales aportarán a la alimentación de estas personas durante los días de confinamiento. Cabe señalar que estos insumos fueron repartidos por personal municipal durante dos jornadas.\n\nEsta iniciativa se suma a los esfuerzos que realiza la Municipalidad de Lima para brindar ayuda a los sectores más necesitados de la capital.', 'vistas/img/publicacion/municipalidad-de-lima-entrego-200-canastas-a-familias-vulnerables-de-pacientes-con-covid-19.jpg', '[{\"foto\":\"vistas/img/multimedia/municipalidad-de-lima-entrego-200-canastas-a-familias-vulnerables-de-pacientes-con-covid-19/f6a8603a1b2e7c2159589425342e4ec8_L.jpg\"}]', 0, 2, 'vacuna', '2021-07-24 05:57:15', 'PUNO', 'PUNO', 'PUNO'),
(91, 'concierto-activando-cultura-por-la-reactivacion-de-la-musica-se-llevo-a-cabo-con-exito-y-cumpliendo-con-todos-los-protocolos', 'CONCIERTO &#8220ACTIVANDO CULTURA: POR LA REACTIVACIÓN DE LA MÚSICA&#8221 SE LLEVÓ A CABO CON ÉXITO Y CUMPLIENDO CON TODOS LOS PROTOCOLOS', 'Lima y el Perú fueron testigos del éxito del primer concierto al aire libre, con 1,000 asistentes, que se llevó a cabo en el anfiteatro Nicomedes Santa Cruz del Parque de la Exposición, cumpliendo con todos los protocolos de bioseguridad frente a la emergencia sanitaria por la pandemia del COVID-19.\n\nAsí, como parte del programa Activando Cultura, el Ministerio de Cultura y la Municipalidad de Lima, con el auspicio de la empresa Backus, presentaron &#8220Activando Cultura: por la reactivación de la música&#8221, con la participación de reconocidas orquestas nacionales, que hicieron bailar a los asistentes y a todos en casa, pues se transmitió en redes sociales.\n\nEl espectáculo contó con la participación de cinco reconocidas agrupaciones musicales: Armonía 10, Son Tentación, Olaya Sound System, Amaranta y Chemical Neon. Los artistas se mostraron felices de tener la oportunidad de presentarse ante un buen número de espectadores, tras la suspensión de todas las actividades desde marzo del 2020, cuando se declaró la inmovilización social a raíz de la pandemia.', 'vistas/img/publicacion/concierto-activando-cultura-por-la-reactivacion-de-la-musica-se-llevo-a-cabo-con-exito-y-cumpliendo-con-todos-los-protocolos.jpg', '[{\"foto\":\"vistas/img/multimedia/concierto-activando-cultura-por-la-reactivacion-de-la-musica-se-llevo-a-cabo-con-exito-y-cumpliendo-con-todos-los-protocolos/0749e8290e8efae69bc6b105eb1e6435_L.jpg\"},{\"foto\":\"vistas/img/multimedia/concierto-activando-cultura-por-la-reactivacion-de-la-musica-se-llevo-a-cabo-con-exito-y-cumpliendo-con-todos-los-protocolos/REACTIVANDO_CULTURA_1.jpg\"},{\"foto\":\"vistas/img/multimedia/concierto-activando-cultura-por-la-reactivacion-de-la-musica-se-llevo-a-cabo-con-exito-y-cumpliendo-con-todos-los-protocolos/REACTIVANDO_CULTURA_7.jpg\"}]', 0, 1, 'fiesta', '2021-07-24 05:58:22', 'PUNO', 'PUNO', 'PUNO');

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
  MODIFY `idCarrusel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `idPublicar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
