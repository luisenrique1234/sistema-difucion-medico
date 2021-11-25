-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 20:53:42
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `red_medica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(20) NOT NULL,
  `adminis` varchar(250) DEFAULT NULL,
  `pass` varchar(240) DEFAULT NULL,
  `idRolA` int(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `adminis`, `pass`, `idRolA`, `estado`) VALUES
(1, 'adminp', '12345', 1, 'A'),
(2, 'admin', '1234', 1, 'A'),
(3, 'Luis Enrique', '12345', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comen` int(20) NOT NULL,
  `id_public_com` int(20) DEFAULT NULL,
  `id_medico_com` int(20) DEFAULT NULL,
  `text_comen` varchar(1800) DEFAULT NULL,
  `fecha_comen` date DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comen`, `id_public_com`, `id_medico_com`, `text_comen`, `fecha_comen`, `estado`) VALUES
(1, 1, 1, 'me gusta', '2021-10-28', 'A'),
(2, 2, 3, 'me gusta esta publicacion', '2021-11-01', 'A'),
(3, 2, 7, 'me gusta', '2021-11-03', 'A'),
(4, 1, 7, 'me gusta mucho ', '2021-11-12', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencia`
--

CREATE TABLE `conferencia` (
  `id_confe` int(20) NOT NULL,
  `id_userme` int(20) DEFAULT NULL,
  `titulo_confe` varchar(250) DEFAULT NULL,
  `autores_confe` varchar(300) DEFAULT NULL,
  `link_confe` varchar(400) DEFAULT NULL,
  `material_confe` varchar(400) DEFAULT NULL,
  `recordatorio` int(20) DEFAULT NULL,
  `categoria_confe` int(20) DEFAULT NULL,
  `fachainicio` datetime DEFAULT NULL,
  `fechafinal` datetime DEFAULT NULL,
  `etapa_confe` varchar(250) DEFAULT NULL,
  `visttas_confe` int(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conferencia`
--

INSERT INTO `conferencia` (`id_confe`, `id_userme`, `titulo_confe`, `autores_confe`, `link_confe`, `material_confe`, `recordatorio`, `categoria_confe`, `fachainicio`, `fechafinal`, `etapa_confe`, `visttas_confe`, `estado`) VALUES
(1, 7, 'Propiedades del tomate cultivado en las marismas de Lebrija', 'Antonio Vasquez Perez', 'https://www.youtube.com/watch?v=5qap5aO4i9A', 'documento-pdf/14editorialcovid-19pdf.pdf', 3, 1, '2021-11-24 16:19:38', '2021-11-18 19:30:38', 'Programada', 3, 'A'),
(2, 7, 'Enfoque Médico de un Paciente con Diabetes y COVID-19', 'Abraham Perez,Armando Vasquez,Germán Gomez,Héctor Acosta', 'https://www.youtube.com/watch?v=5qap5aO4i9A', 'documentos/documeto.pdf', 3, 2, '2021-11-19 08:32:30', '2021-11-19 14:32:30', 'En vivo', 5, 'A'),
(3, 7, 'titulo ', 'participantes', 'http://localhost/medico-red/formu_conferencia.php', 'documento-confe-pdf/hoja-de-pasantia-isc-nuevapdf.pdf', NULL, 2, '2021-11-23 00:09:00', '2021-11-24 22:23:00', 'Programada', NULL, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_espec` int(20) NOT NULL,
  `espec_descripsion` varchar(150) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_espec`, `espec_descripsion`, `estado`) VALUES
(1, 'Pediatria', 'A'),
(2, 'Cardiologia', 'A'),
(3, 'Cirugia general', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_cientifica`
--

CREATE TABLE `inv_cientifica` (
  `id_inv` int(20) NOT NULL,
  `id_medico_inv` int(20) DEFAULT NULL,
  `titulo_inv` varchar(150) DEFAULT NULL,
  `autor_inv` varchar(150) DEFAULT NULL,
  `resume_inv` varchar(6000) DEFAULT NULL,
  `introducion_inv` varchar(2000) DEFAULT NULL,
  `pclave_inv` varchar(250) DEFAULT NULL,
  `Antecedente_inv` varchar(2000) DEFAULT NULL,
  `objetivoge_inv` varchar(2000) DEFAULT NULL,
  `objetivoes_inv` varchar(2000) DEFAULT NULL,
  `justificasion_inv` varchar(2000) DEFAULT NULL,
  `hipotesis_inv` varchar(2000) DEFAULT NULL,
  `metodologia_inv` varchar(1000) DEFAULT NULL,
  `bibliografia` varchar(480) DEFAULT NULL,
  `referencias_inv` varchar(1600) DEFAULT NULL,
  `cotegoria_inv` int(20) DEFAULT NULL,
  `fecha_inv` date DEFAULT NULL,
  `me_gusta_inv` int(30) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inv_cientifica`
--

INSERT INTO `inv_cientifica` (`id_inv`, `id_medico_inv`, `titulo_inv`, `autor_inv`, `resume_inv`, `introducion_inv`, `pclave_inv`, `Antecedente_inv`, `objetivoge_inv`, `objetivoes_inv`, `justificasion_inv`, `hipotesis_inv`, `metodologia_inv`, `bibliografia`, `referencias_inv`, `cotegoria_inv`, `fecha_inv`, `me_gusta_inv`, `estado`) VALUES
(1, 7, 'Investigación Clínica en tiempos de COVID-19', 'María Alicia Mordojovich, M.D., M.Sc.1 Gabriel Cavada, Ph.D.1 ', 'La pandemia de COVID-19 representa un enorme desafío a la sociedad, y en particular a la comunidad médica y científica en diferentes ámbitos, desde el cuidado personal, el teletrabajo combinado con la asistencia a pacientes COVID-19 y no COVID-19 y el enorme caudal de información a procesar, clasificar e integrar o no al quehacer clínico. Pero este desafío aún va más allá y nos obliga a generar evidencia que contribuya al conocimiento científico y médico en el diagnóstico, tratamiento y prevención de la enfermedad y sus complicaciones. Esta información de buena calidad y no sesgada es necesaria hoy, no cuando la pandemia haya cedido1.\r\n\r\nDesde el inicio de la pandemia en Wuhan en diciembre de 2019, así como los casos, la información ha aumentado exponencial y desorganizadamente: modo de contagio, cuadro clínico, imágenes, respuestas a tratamientos, métodos diagnósticos, factores de riesgo y mucho más. Mucha de la información inicial ha surgido desde la experiencia en China, que con 82.784 casos generó gran parte del conocimiento en especial observacional de los primeros meses. Más recientemente ha aumentado la información y publicaciones de los países europeos y EE. UU., muchos de ellos aún más afectados que China2.', 'Existe muchas áreas de incertidumbre que están en el día a día de la discusión clínica y que debemos ir iluminando con conocimiento científico sólido. Por ejemplo: ¿cuál es el rol del uso de mascarillas en la prevención de la expansión de la epidemia?; ¿cuál es el riesgo/beneficio de medicamentos hipotensores inhibidores de la Enzima Convertidora de Angiotensina 2 (IECAs y ARA2)? ¿cuál es la eficacia de usar hidroxicloroquina o cloroquina?; ¿qué inmunoterapia usar en qué fase de la enfermedad? Todas estas interrogantes en medio de mucha información parcial, pseudocientífica o errónea que es rápidamente difundida por medios de comunicación y redes sociales.\r\n\r\nLos investigadores de ciencias básicas y clínicas, salubristas, epidemiólogos, bioestadísticos, tienen el deber ético de reunir información, procesarla y comunicarla durante la pandemia a fin proponer métodos de prevención y cuidados de salud. Para esto debemos, urgentemente crear las condiciones adecuadas en varios ámbitos.', 'covid19,sanidad', 'Los equipos de investigación clínica, las instituciones de salud y académicas debieran organizarse, colaborar y contar con las facilidades, en la medida de los posible, para generar en forma expedita datos clínicos y epidemiológicos a partir de estudios observacionales y participar activamente de ensayos clínicos a gran escala para probar nuevos tratamientos y vacunas para enfrentar el COVID-19.\r\n\r\nPara los estudios que venían desarrollándose antes del inicio de la pandemia, la principal preocupación debiera orientarse a proteger a los pacientes que participan en ensayos clínicos tanto del contagio de COVID-19 como la de asegurar la continuidad de sus tratamientos y cuidados médicos.\r\n\r\nLas autoridades sanitarias y de investigación debieran incorporar el fortalecimiento y expansión de la investigación biomédica en los planes de inversión y desarrollo en el corto, mediano y largo plazo, ya que lo que estamos viviendo hoy seguramente lo volveremos a vivir en el futuro.', 'Los editores de revistas médicas chilenas y divulgación científica en general debieran promover la publicación de experiencias nacionales creando las condiciones para rápida evaluación y divulgación de estas publicaciones evaluadas por pares en áreas COVID-19 específicos dentro de sus portales.\r\n\r\nFinalmente debemos impulsar la racionalidad y cautela en las múltiples intervenciones que se proponen en protocolos clínicos, manteniendo un escepticismo saludable e incertidumbre clínica ante la falta o los bajos niveles de evidencia. En especial debemos estar alertas frente a los sesgos de disponibilidad, el anclaje y el sesgo de confirmación3.', 'Este es uno de esos momentos donde la capacidad y la velocidad de generación y difusión de conocimiento biomédico de calidad pueden significar para las personas la diferencia entre contagiarse o no, entre tener una enfermedad grave o una leve, entre salir del ventilador mecánico o no. También para los hospitales la diferencia entre tener o no capacidad de atender a estos y otros pacientes y para las naciones, la diferencia entre atenuar o no el profundo impacto sanitario, social y económico que conlleva la peor pandemia de los últimos 100 años.', 'Los comités ético científico acreditados en el país y sus organismos reguladores debieran considerar las circunstancias de emergencia sanitaria mundial, realizando revisiones éticas aceleradas, y cuando las circunstancias descritas por las pautas ética internacionales, como son:\r\n\r\nla imposibilidad de obtener el consentimiento informado;\r\n\r\nel importante valor social de la investigación y\r\n\r\nque solo supone riesgos mínimos para los participantes, otorgar la exención de los consentimientos informados en los estudios observacionales.', 'Desde el inicio de la pandemia en Wuhan en diciembre de 2019, así como los casos, la información ha aumentado exponencial y desorganizadamente: modo de contagio, cuadro clínico, imágenes, respuestas a tratamientos, métodos diagnósticos, factores de riesgo y mucho más. Mucha de la información inicial ha surgido desde la experiencia en China, que con 82.784 casos generó gran parte del conocimiento en especial observacional de los primeros meses. Más recientemente ha aumentado la información y publicaciones de los países europeos y EE. UU., muchos de ellos aún más afectados que China2.', 'Existe muchas áreas de incertidumbre que están en el día a día de la discusión clínica y que debemos ir iluminando con conocimiento científico sólido. Por ejemplo: ¿cuál es el rol del uso de mascarillas en la prevención de la expansión de la epidemia?; ¿cuál es el riesgo/beneficio de medicamentos hipotensores inhibidores de la Enzima Convertidora de Angiotensina 2 (IECAs y ARA2)? ¿cuál es la eficacia de usar hidroxicloroquina o cloroquina?; ¿qué inmunoterapia usar en qué fase de la enfermedad? Todas estas interrogantes en medio de mucha información parcial, pseudocientífica o errónea que es rápidamente difundida por medios de comunicación y redes sociales.', '1. Roser M, Ritchie H, Ortiz-Ospina E. Coronavirus Disease (COVID-19) - Statistics and Research. Our World Data [Internet]. 2020; Available from: https://ourworldindata.org/coronavirus [citado el 10 de abril de 2020]. [ Links ]\r\n\r\n2. Global research on coronavirus disease (COVID-19) [Internet]. Available from: https://www.who.int/emergencies/diseases/novel-coronavirus-2019/global-research-on-novel-coronavirus-2019-ncov [citado el 10 de abril de 2020]. [ Links ]\r\n\r\n3. Zagury-O', '', 2, '2021-10-27', 25, 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_comentario`
--

CREATE TABLE `inv_comentario` (
  `id_comen_inv` int(20) NOT NULL,
  `id_inve_com` int(20) DEFAULT NULL,
  `id_medico_com` int(20) DEFAULT NULL,
  `tex_cominv` varchar(600) DEFAULT NULL,
  `fecha_inv` date DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inv_comentario`
--

INSERT INTO `inv_comentario` (`id_comen_inv`, `id_inve_com`, `id_medico_com`, `tex_cominv`, `fecha_inv`, `estado`) VALUES
(1, 1, 1, 'me gusta', '2021-10-27', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(20) NOT NULL,
  `nombre_medico` varchar(80) DEFAULT NULL,
  `apellido_medico` varchar(150) DEFAULT NULL,
  `user_medico` varchar(250) DEFAULT NULL,
  `codigo_medico` varchar(160) DEFAULT NULL,
  `especialidadm` int(20) DEFAULT NULL,
  `provincia_me` varchar(150) DEFAULT NULL,
  `idRol` int(20) DEFAULT NULL,
  `contrasena_me` varchar(280) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_medico`, `nombre_medico`, `apellido_medico`, `user_medico`, `codigo_medico`, `especialidadm`, `provincia_me`, `idRol`, `contrasena_me`, `estado`) VALUES
(1, 'Luis Enrique', 'Gomez', 'luis55', 'ADFdD455', 2, 'La Vega', 3, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(2, 'admin', 'perez', 'admin2', '1234', 1, 'Santiago', 2, 'ec6a6536ca304edf844d1d248a4f08dc', 'A'),
(3, 'Maria', 'Capellan', 'mariacapellan', 'ALDKA32', 2, 'La Vega', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(4, 'Juan Miguel', 'Vasquez', 'juean1234', 'ALDKKD52234', 3, 'Santiago', 2, '58b1216b06850385d9a4eadbedc806c4', 'I'),
(5, 'Mario', 'Baldez', 'mario123', 'addsdk234', 1, 'Valverde', 3, '827ccb0eea8a706c4c34a16891f84e7b', 'I'),
(6, 'Luis Miguel', 'Tejada', 'miguel88', '9573453', 1, 'La Vega', 3, '827ccb0eea8a706c4c34a16891f84e7b', 'I'),
(7, 'Roberto', 'Vasquez', 'rober21', 'lajd234', 2, 'Santiago Rodríguez', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(8, 'Manuel', 'Lopez', 'Manuel123', 'asdfad34', 1, 'Santiago Rodríguez', 3, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(9, 'Rosalita', 'Gomez', 'rosalita676', 'ada345', 3, 'San Francisco de Macorís', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(10, 'Jose Luis', 'Lopez', 'jose1234', 'adw234', 3, 'San Francisco de Macorís', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(11, 'Marta', 'Vasquez', 'marta21', 'asdfa123', 2, 'San Francisco de Macorís', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(12, 'Miguelina', 'Lopez', 'miguelina87', 'adada234', 1, 'Santiago', 3, '827ccb0eea8a706c4c34a16891f84e7b', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_public` int(20) NOT NULL,
  `id_medico_pu` int(20) DEFAULT NULL,
  `titulo_public` varchar(100) DEFAULT NULL,
  `autor_pu` varchar(180) DEFAULT NULL,
  `text_public` varchar(2000) DEFAULT NULL,
  `referencia_pu` varchar(680) DEFAULT NULL,
  `link_imagen` varchar(150) DEFAULT NULL,
  `link_video` varchar(150) DEFAULT NULL,
  `link_audio` varchar(150) DEFAULT NULL,
  `link_archivo` varchar(150) DEFAULT NULL,
  `fecha_public` date DEFAULT NULL,
  `categoria_public` int(20) DEFAULT NULL,
  `tipo_archivo` varchar(30) DEFAULT NULL,
  `me_gusta_pu` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_public`, `id_medico_pu`, `titulo_public`, `autor_pu`, `text_public`, `referencia_pu`, `link_imagen`, `link_video`, `link_audio`, `link_archivo`, `fecha_public`, `categoria_public`, `tipo_archivo`, `me_gusta_pu`, `estado`) VALUES
(1, 1, 'Guía de Limpieza y Desinfección de  Superficies Hospitalarias', 'Dr. Rafael Sánchez Cárdenas\r\nMinistro de Salud Pública \r\nDr. Francisco Neftalí Vásquez \r\nViceministro de Garantía de la Calidad\r\nDr. Héctor Quezada\r\nViceministro de Salud Colectiva', 'Uno de los principales desafíos que enfrenta el Sistema Nacional de Salud es lograr que \r\nlos establecimientos de salud sean lugares seguros para los pacientes y sus familiares, así \r\ncomo para el personal que en ellos labora. En relación con los riesgos biológicos, reducirlos \r\nrequiere fortalecer las medidas de bioseguridad como estrategia efectiva de contención de \r\nla transmisión de patógenos y de prevención de las Infecciones Asociadas a la Atención en \r\nSalud (IAAS).\r\nSi bien los pacientes constituyen el principal reservorio de microorganismos causantes de \r\nIAAS, algunos pueden ser transmitidos a través del ambiente, sobre todo de las superficies \r\ny de los equipos de las áreas dedicadas a la atención, las cuales actúan como fuente de \r\ninfección al entrar en contacto con secreciones y fluidos provenientes de los pacientes. \r\nExiste asociación entre la adecuada higienización de las superficies contaminadas, mediante \r\nlimpieza y desinfección, y la reducción del riesgo de trasmisión cruzada y de brotes de IAAS \r\nocasionados por ciertos agentes infecciosos. Además, la limpieza y la desinfección mejoran \r\nel aspecto estético de los establecimientos de salud y contribuyen a aumentar la confianza \r\ny el confort de los pacientes.', 'Ministerio de Salud Pública Santo Domingo, República Dominicana, 2020', '', '', '', 'documento-pdf/guia-limpiezapdf.pdf', '2021-10-26', 1, 'pdf', 10, 'I'),
(2, 3, 'Ámbito de actuación de la cardiología en los nuevos escenarios clínicos', 'Javier Escaned Barbosa, Eulalia Roig Minguell, Francisco J. Chorro Gascó, Eduardo De Teresa Galván,Manuel Jiménez Mena, Esteban López de Sá y Areses, Fernando Alfonso Manterola, ', 'A cardiología es la disciplina o especialidad médica encargada de la prevención, el diagnóstico y el tratamiento de las enfermedades cardiovasculares. Al\r\nconstituir la principal causa de morbimortalidad en España y en la Unión Europea1\r\n, los profesionales de la\r\ncardiología tienen, respecto a otras especialidades médicas, una responsabilidad y autoridad morales añadidas, derivadas de la relevancia que tiene para la sociedad un ejercicio excelente de la lucha contra la\r\nenfermedad cardiovascular. De ahí la importancia de\r\nefectuar un seguimiento de las rápidas transiciones\r\nque en el momento actual se están dando en los órdenes sociales, administrativos, educativos, asistenciales\r\ny profesionales, transiciones que necesariamente condicionarán nuevos contextos para el ejercicio de la cardiología y para sus profesionales.', '1.	Murray JL, Lopez AD. Alternative projections of mortality anddisability by cause 1990-2020: Global Burden of Disease Study. Lancet. 1997;349:1498-504. 2.	Escaned J, Rydén L, Zamorano JL, Poole-Wilson P, Fuster V,Gitt A, et al. Tendencias y contextos en la práctica de la cardiología en los próximos 15 años. La Declaración de Madrid: un documento de la Conferencia Europea sobre el Futuro de la Cardiología, Madrid, 2-3 de junio de 2006. Rev Esp Cardiol. 2007;60: 294-8. 3.	De Teresa-Galván E, Alonso-Pulpón L, Barber P, Bover Freire R,Castro Beiras A, Cruz Fernández JM, et al. Desequilibrio entre la oferta y las necesidades de cardiólogos en España. Análisis de la situación', '', '', '', 'documento-word/13116204docx.docx', '2021-10-26', 2, 'docx', 30, 'A'),
(3, 4, 'CIRUGÍA GENERAL,Explicacion.', 'Juan Miguel', 'La cirugía general es la especialidad médica de clase quirúrgica que abarca las operaciones del aparato digestivo; incluyendo el tracto gastrointestinal y el sistema hepato-bilio-pancreático, el sistema endocrino; incluyendo las glándulas suprarrenales, tiroides, paratiroides, mama y otras glándulas incluidas en el aparato digestivo. Asimismo incluye la reparación de hernias y eventraciones de la pared abdominal. En estas áreas de la cirugía no se precisa un especialista aunque el cirujano general puede especializarse en alguna de ellas. Esto no es igual en todos los países ya que en algunos es considerada una especialidad más y se entiende por super especialización la profundización en una de sus ramas quirúrgicas.', 'https://www.youtube.com/watch?v=NK5BV45rsXQ', '', 'videos/ciruga-general480pmp4.mp4', '', '', '2021-10-26', 3, 'mp4', 30, 'A'),
(4, 1, 'COVID-19 en Pediatría: investigación, publicaciones  y evidencia', 'Ochoa Sangrador C\r\n, Pérez-Moneo Agapito B\r\n, Fernández Rodríguez MM', 'La pandemia por el virus SARS-CoV-2 ha provocado cambios \r\ndrásticos en nuestra vida diaria, además de importantes consecuencias sanitarias y socioeconómicas. Aunque el mayor \r\nimpacto en morbimortalidad se ha producido en personas \r\nmayores, los niños y adolescentes se han visto también afectados, bien como objeto de enfermedad, habitualmente leve \r\ncon un reducido número de formas graves, o bien como destino de medidas de confinamiento y distanciamiento social. La \r\nlucha contra la pandemia ha supuesto un reto colectivo para \r\nnuestros sistemas sanitarios, que han tenido que realizar cambios improvisados en su organización asistencial, pero también un reto individual para cada uno de los profesionales \r\nsanitarios, que hemos debido enfrentarnos a la toma de decisiones diagnóstico-terapéuticas, en ausencia de experiencia o \r\nevidencia publicada en las que sustentarnos1-4.', '1.Documento de manejo clínico del paciente pediátrico y pacientes de riesgo con infección por SARS-CoV-2. En: Asociación Española de Pediatría [en línea] [consultado el 07/06/2021]. Disponible en: www.aeped.es/sites/default/files/b26-11-_aep-seip-secip-seup._documento_de_manejo_clinico_del_paciente_pediatrico.pdf\r\n2.Documento técnico manejo en Atención Primaria del COVID-19. En: Ministerio de Sanidad [en línea] [consultado el 07/06/2021]. Disponible en: www.mscbs.gob.es/profesionales/saludPublica/ccayes/alertasActual/nCov-China/documentos/Manejo_primaria.pdf\r\n3.Alcalá Minagorre PJ, Villalobos Pinto E, Ramos Fernández JM, Rodríguez-Fernández R, Vázquez Ronco M, Escosa-Garc', '', '', '', 'documento-pdf/14editorialcovid-19pdf.pdf', '2021-10-27', 1, 'pdf', 40, 'A'),
(5, 7, 'titulo', 'autor', 'Rusumen', 'fuente', '', '', '', 'documento-pdf/6401pdf.pdf', '2021-11-03', 2, 'pdf', 10, 'A'),
(6, 7, 'titulo', 'autor', 'resumen', 'referncias', '', '', '', 'documento-pdf/6401pdf.pdf', '2021-11-06', 2, 'pdf', 10, 'A'),
(7, 7, 'titulo', 'autor', 'resmun', 'referencias', '', '', '', 'documento-pdf/estilo-apapdf.pdf', '2021-11-07', 2, 'pdf', 10, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_roles` int(20) NOT NULL,
  `descripcion` varchar(70) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_roles`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'A'),
(2, 'Medico', 'A'),
(3, 'NO autorizado', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `fecha` varchar(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`fecha`, `ip`, `pagina`, `url`) VALUES
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/'),
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/'),
('2021-11-08', '127.0.0.1', 'Precios', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/precios.html'),
('2021-11-08', '127.0.0.1', 'Precios', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/precios.html'),
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/index.html'),
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/index.html'),
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/index.html'),
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/index.html'),
('2021-11-08', '127.0.0.1', 'Página de contacto', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/contacto.html'),
('2021-11-08', '127.0.0.1', 'Página de contacto', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/contacto.html'),
('2021-11-08', '127.0.0.1', 'Inicio', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/index.html'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/contador_visitas_php_avanzado-main/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-08', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php#'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php#'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-09', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-09', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-09', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/cardiologia.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-09', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-09', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-09', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/cardiologia.php'),
('2021-11-11', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/cardiologia.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-11', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-11', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-11', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-12', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-12', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-12', '127.0.0.1', 'Cirugia general', 'http://localhost/medico-red/cirugia_general.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-12', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php?#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php#'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Sistama de divulgacion médico', 'http://localhost/medico-red/index.php'),
('2021-11-15', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-15', '127.0.0.1', 'Pediatria', 'http://localhost/medico-red/pediatria.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php#'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php#'),
('2021-11-15', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php#'),
('2021-11-22', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-23', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php'),
('2021-11-23', '127.0.0.1', 'Cardiología', 'http://localhost/medico-red/Cardiologia.php');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `idRolA` (`idRolA`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comen`),
  ADD KEY `id_public_com` (`id_public_com`);

--
-- Indices de la tabla `conferencia`
--
ALTER TABLE `conferencia`
  ADD PRIMARY KEY (`id_confe`),
  ADD KEY `user_medico` (`id_userme`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_espec`);

--
-- Indices de la tabla `inv_cientifica`
--
ALTER TABLE `inv_cientifica`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_medico_inv` (`id_medico_inv`);

--
-- Indices de la tabla `inv_comentario`
--
ALTER TABLE `inv_comentario`
  ADD PRIMARY KEY (`id_comen_inv`),
  ADD KEY `id_inve_com` (`id_inve_com`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `especialidadm` (`especialidadm`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_public`),
  ADD KEY `id_medico_pu` (`id_medico_pu`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD KEY `indice_fecha` (`fecha`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `conferencia`
--
ALTER TABLE `conferencia`
  MODIFY `id_confe` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_espec` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inv_cientifica`
--
ALTER TABLE `inv_cientifica`
  MODIFY `id_inv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inv_comentario`
--
ALTER TABLE `inv_comentario`
  MODIFY `id_comen_inv` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_public` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_roles` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idRolA`) REFERENCES `rol` (`id_roles`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_public_com`) REFERENCES `publicacion` (`id_public`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `inv_cientifica`
--
ALTER TABLE `inv_cientifica`
  ADD CONSTRAINT `inv_cientifica_ibfk_1` FOREIGN KEY (`id_medico_inv`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `inv_comentario`
--
ALTER TABLE `inv_comentario`
  ADD CONSTRAINT `inv_comentario_ibfk_1` FOREIGN KEY (`id_inve_com`) REFERENCES `inv_cientifica` (`id_inv`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id_roles`),
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`especialidadm`) REFERENCES `especialidad` (`id_espec`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_medico_pu`) REFERENCES `medico` (`id_medico`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
