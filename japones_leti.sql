-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2026 a las 13:27:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `japones_leti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audios`
--

CREATE TABLE `audios` (
  `id_audio` int(11) NOT NULL,
  `id_leccion` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `audios`
--

INSERT INTO `audios` (`id_audio`, `id_leccion`, `titulo`, `archivo`) VALUES
(1, 1, 'Diálogo 1 — Conversación cotidiana', 'leccion1-dialogo1.mp3'),
(2, 1, 'Diálogo 2 — Expresar opiniones', 'leccion1-dialogo2.mp3'),
(3, 1, 'Vocabulario — Pronunciación', 'leccion1-vocab.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `resumen` text DEFAULT NULL,
  `articulo` longtext DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id_post`, `id_usuario`, `titulo`, `img`, `fecha`, `resumen`, `articulo`, `categoria`, `publicado`) VALUES
(1, 1, 'Diccionarios de japonés recomendados para estudiantes', 'blog-1.jpg', '2026-05-29 12:28:49', 'Te recomendamos los mejores diccionarios para aprender japonés desde cero o mejorar tu nivel.', 'Contenido completo del artículo sobre diccionarios...', 'Lengua', 1),
(3, 1, 'Cómo organizar tu estudio de japonés si tienes poco tiempo', 'blog-3.jpg', '2026-05-29 12:28:49', 'Consejos prácticos para aprender japonés aunque tengas una agenda muy apretada.', 'Contenido completo del artículo sobre organización del estudio...', 'Lengua', 1),
(4, 1, 'Qué es el wa: el concepto japonés de armonía', 'blog-4.jpg', '2026-05-29 12:28:49', 'El wa es un concepto fundamental en la cultura japonesa que representa la armonía y la paz.', 'Contenido completo del artículo sobre el wa...', 'Cultura', 1),
(5, 1, 'La ceremonia del té Matcha en Japón', 'blog-matcha.jpg', '2025-05-01 00:00:00', 'La ceremonia del té es una de las tradiciones más representativas de la cultura japonesa.', 'Contenido del artículo...', 'CULTURA', 1),
(10, 1, 'Capybara Cafe Tokyo: mucho más que una cafetería', 'blog-capybara.jpg', '2025-02-15 00:00:00', 'Descubre este curioso café de Tokyo donde conviven personas y capibaras.', 'Contenido del artículo...', 'TURISMO', 1),
(11, 1, 'Dulces japoneses tradicionales y cuándo se comen', 'blog-dulces.jpg', '2025-02-01 00:00:00', 'Los wagashi son dulces tradicionales japoneses con un significado especial.', 'Contenido del artículo...', 'GASTRONOMÍA', 1),
(12, 1, 'Qué es el ikebana?', 'blog-ikebana.jpg', '2025-01-15 00:00:00', 'El ikebana es el arte japonés de la disposición floral.', 'Contenido del artículo...', 'CULTURA', 1),
(15, 1, 'Cómo crear una rutina de estudio de japonés', 'blog-rutina.jpg', '2025-03-01 00:00:00', 'Aprende a crear una rutina efectiva y sostenible para estudiar japonés aunque tengas poco tiempo libre.', 'Contenido completo del artículo...', 'MÉTODO/ESTUDIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultura`
--

CREATE TABLE `cultura` (
  `id_cultura` int(11) NOT NULL,
  `id_leccion` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cultura`
--

INSERT INTO `cultura` (`id_cultura`, `id_leccion`, `titulo`, `contenido`, `img`) VALUES
(1, 1, 'La cultura del trabajo en Japón', 'En Japón, el trabajo ocupa un lugar central en la vida social. El concepto de karoshi (muerte por exceso de trabajo) refleja la intensidad con la que muchos japoneses se dedican a su empleo. Sin embargo, en los últimos años el país ha impulsado reformas para reducir las horas de trabajo y promover un mejor equilibrio entre vida personal y laboral.', 'cultura-trabajo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `contenidos` text DEFAULT NULL,
  `objetivos` text DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `img_grande` varchar(255) DEFAULT NULL,
  `img_kanji` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `id_nivel`, `titulo`, `descripcion`, `img`, `activo`, `contenidos`, `objetivos`, `subtitulo`, `img_grande`, `img_kanji`) VALUES
(1, 1, 'Curso \"Sakura\" (桜)', 'Sakura (桜) significa \"cerezo en flor\" y representa ese primer momento de belleza y comienzo. Este curso es tu punto de partida en el japonés: aprenderás a leer y escribir hiragana y katakana, los dos silabarios esenciales, y darás tus primeros pasos en la gramática y el vocabulario básico. A lo largo del curso construirás una base sólida desde cero, con lecciones claras y ordenadas pensadas para que el idioma no se sienta abrumador. Aprenderás a presentarte, a saludar, a expresar acciones cotidianas y a entender cómo funciona la estructura del japonés. Las lecciones están diseñadas para avanzar paso a paso, sin prisa y sin presión. Sakura es el curso donde todo empieza: con calma, con curiosidad y con la satisfacción de ver cómo el japonés empieza a cobrar sentido por primera vez.', 'curso-sakura.jpg', 1, '1. HIRAGANA Y KATAKANA|Aprendizaje del silabario hiragana completo|Aprendizaje del silabario katakana completo|Práctica de lectura y escritura básica##2. PRIMERAS PALABRAS Y SALUDOS|Saludos y expresiones cotidianas|Vocabulario básico del día a día|Números del 1 al 100##3. ESTRUCTURA BÁSICA DE LA FRASE|Orden sujeto-objeto-verbo en japonés|Partículas は、が、を、に、で|Frases simples afirmativas y negativas##4. VERBOS EN FORMA MASU|Introducción a los verbos en forma ます|Presente y pasado afirmativo y negativo|Verbos de movimiento y acción básicos', '1. DOMINAR LOS SILABARIOS|Leer y escribir hiragana con fluidez|Reconocer katakana en textos cotidianos##2. COMUNICARSE EN SITUACIONES BÁSICAS|Saludar y despedirse correctamente|Presentarse a uno mismo en japonés##3. COMPRENDER LA GRAMÁTICA ESENCIAL|Entender el orden de la frase japonesa|Usar las partículas básicas correctamente##4. CONSTRUIR FRASES SIMPLES|Formar oraciones afirmativas y negativas|Expresar acciones cotidianas en presente y pasado', 'Da tus primeros pasos en el japonés con calma y sin presión', 'curso-sakura-hero.jpg', 'sakura.png'),
(2, 1, 'Curso \"Kaze\" (風)', 'Kaze (風) significa \"viento\" y simboliza el momento en el que el japonés empieza a avanzar con más fluidez. En este curso continuarás asentando las bases del idioma y darás un paso más hacia una comprensión más clara y ordenada del japonés, siempre a tu ritmo y sin presión. A lo largo del curso aprenderás a construir frases más completas, a usar nuevas partículas con sentido, y a comprender mejor cómo se organiza el japonés a nivel gramatical. Trabajarás con vocabulario de uso cotidiano, empezarás a manejar distintas formas verbales básicas y ganarás soltura para expresar ideas sencillas en contextos habituales. También pondremos el foco en conectar contenidos: entender por qué se usan ciertas estructuras, cómo se encajan entre sí y cómo aplicarlas de forma natural. Las lecciones están diseñadas para leerse con calma, tomar apuntes y practicar mediante ejercicios interactivos, de forma que el aprendizaje sea progresivo y sostenible. Kaze es el curso en el que el japonés deja de sentirse estático y comienza a moverse contigo, ayudándote a avanzar con mayor confianza y continuidad.', 'curso-kaze.jpg', 1, '1. VERBOS Y FORMAS INICIALES|Repaso de la forma diccionario|Introducción a nuevas formas verbales básicas|Uso de verbos en formas afirmativas y negativas##2. NUEVAS PARTÍCULAS Y USOS|Introducción y uso de nuevas partículas básicas|Diferencias de uso según el contexto|Ejemplos prácticos y frases modelo##3. CONSTRUCCIÓN DE FRASES|Ampliación de frases simples|Combinación de partículas, verbos y vocabulario|Práctica guiada de estructuras habituales##4. VOCABULARIO COTIDIANO|Vocabulario relacionado con acciones y rutinas|Palabras frecuentes en conversaciones sencillas|Uso del vocabulario en contexto', '1. AFIANZAR LOS CONOCIMIENTOS BÁSICOS|Reforzar las bases del japonés adquiridas previamente|Ganar seguridad en la lectura y comprensión de frases sencillas##2. MEJORAR LA COMPRENSIÓN GRAMATICAL|Entender el uso de nuevas partículas|Reconocer estructuras básicas de forma natural##3. GANAR SOLTURA EN LA EXPRESIÓN|Formar frases más completas|Expresar ideas simples de forma clara##4. AMPLIAR VOCABULARIO FUNCIONAL|Incorporar vocabulario de uso cotidiano|Aplicarlo correctamente en ejercicios prácticos##5. DESARROLLAR UN APRENDIZAJE CONTINUO|Conectar contenidos antiguos y nuevos|Avanzar de forma progresiva y sin bloqueos', 'Gana fluidez y deja que el japonés empiece a fluir poco a poco', 'curso-kaze-hero.jpg', 'kaze.png'),
(3, 1, 'Curso \"Hikari\" (光)', 'Hikari (光) significa \"luz\" y representa ese momento en el que el japonés empieza a iluminarse y a cobrar forma completa. En este curso consolidarás todo lo aprendido en los niveles anteriores y darás un paso decisivo hacia el final del N5, enfrentándote a estructuras más complejas con mayor seguridad. A lo largo del curso profundizarás en la forma て y sus múltiples usos, aprenderás a describir estados y acciones en progreso, y trabajarás con los adjetivos い y な de forma más completa. También comenzarás a introducirte en el mundo del kanji, con los caracteres más frecuentes del nivel N5. Las lecciones están pensadas para que sientas que cada pieza encaja con las anteriores, consolidando un conocimiento que ya no se olvida. Hikari es el curso en el que el japonés deja de parecer un puzzle sin resolver y empieza a verse como un idioma que puedes usar de verdad.', 'curso-hikari.jpg', 1, '1. FORMA TE Y SUS USOS|Conjugación de verbos en forma て|Peticiones y permisos con てください y てもいいですか|Acciones consecutivas con て##2. EXPRESIONES DE ESTADO|Forma ている para acciones en progreso|Descripción de estados y situaciones|Verbos de cambio de estado##3. ADJETIVOS I Y NA|Conjugación de adjetivos en presente y pasado|Adjetivos como predicado y modificador|Combinación de adjetivos en frases complejas##4. KANJI BÁSICOS N5|Introducción a los kanji más frecuentes del N5|Lectura on y kun de los kanji básicos|Vocabulario con kanji en contexto', '1. DOMINAR LA FORMA TE|Usar correctamente la forma て en diferentes contextos|Hacer peticiones y pedir permiso de forma natural##2. DESCRIBIR ACCIONES Y ESTADOS|Expresar acciones en progreso con ている|Describir el estado actual de personas y objetos##3. USAR ADJETIVOS CON SOLTURA|Conjugar adjetivos i y na correctamente|Construir frases descriptivas más ricas##4. INICIARSE EN EL KANJI|Reconocer y leer los kanji básicos del N5|Escribir vocabulario esencial con kanji', 'Consolida tu base y avanza hacia una comprensión más completa del N5', 'curso-hikari-hero.jpg', 'hikari.png'),
(4, 2, 'Curso \"Michi\" (道)', 'Michi (道) significa \"camino\" y representa el inicio de una nueva etapa en tu aprendizaje del japonés. Con este curso das el salto al nivel intermedio N4, donde el idioma empieza a ganar profundidad y matices que antes no existían. A lo largo del curso aprenderás a alternar entre el registro formal e informal, a expresar opiniones y suposiciones con naturalidad, y a usar los verbos potenciales para hablar de capacidades. También trabajarás los conectores que te permitirán construir frases más complejas y cohesionadas, uniendo ideas con causa, contraste y consecuencia. Las lecciones están diseñadas para que sientas que avanzas con solidez, sin dejar atrás lo aprendido. Michi es el curso donde el japonés deja de ser solo frases sueltas y empieza a convertirse en un idioma con el que puedes expresar ideas propias.', 'curso-michi.jpg', 1, '1. FORMA PLAIN Y CASUAL|Diferencias entre estilo formal y casual|Conjugación en forma plain presente y pasado|Uso del estilo casual en conversaciones cotidianas##2. EXPRESIONES DE OPINIÓN|と思います para expresar opiniones|らしい y そうです para rumores y apariencia|Forma de citar y reportar lo que otros dicen##3. VERBOS POTENCIALES|Formación del potencial de verbos grupo 1 y 2|Expresar capacidad y posibilidad|Uso del potencial en situaciones reales##4. CONECTORES Y FRASES COMPLEJAS|Conjunciones de causa y efecto から y ので|Conjunciones de contraste けど y が|Construcción de frases subordinadas', '1. ALTERNAR ENTRE REGISTRO FORMAL E INFORMAL|Identificar cuándo usar el estilo casual|Comunicarse con naturalidad en contextos informales##2. EXPRESAR OPINIONES Y VALORACIONES|Dar tu opinión sobre temas cotidianos|Reportar lo que otros dicen o piensan##3. HABLAR DE CAPACIDADES|Expresar lo que puedes o no puedes hacer|Preguntar sobre las capacidades de otros##4. CONSTRUIR FRASES COMPLEJAS|Unir ideas con conectores de causa y contraste|Redactar textos más elaborados y cohesionados', 'Da el salto al nivel intermedio con nuevas estructuras y vocabulario', 'curso-michi-hero.jpg', 'michi.png'),
(5, 2, 'Curso \"Musubu\" (結)', 'Musubu (結) significa \"unir\" o \"atar\" y simboliza ese momento en el que los contenidos del japonés empiezan a conectarse entre sí con mayor coherencia. En este curso seguirás avanzando dentro del nivel N4, profundizando en estructuras que te permitirán comunicarte con más precisión y naturalidad. A lo largo del curso aprenderás a usar los condicionales たら y ば, a manejar los verbos de dar y recibir en distintos contextos, y a entender la voz pasiva y causativa del japonés. También ampliarás tu conocimiento del kanji N4, incorporando vocabulario compuesto de uso frecuente. Las lecciones están pensadas para que sientas que cada nueva estructura se apoya en lo que ya sabes, haciendo el aprendizaje más sólido y sostenible. Musubu es el curso donde el japonés empieza a fluir con mayor precisión y confianza.', 'curso-musubu.jpg', 1, '1. FORMA CONDICIONAL|Condicional con たら y ば|Diferencias de uso entre condicionales|Oraciones hipotéticas y situaciones futuras##2. VERBOS DE DAR Y RECIBIR|あげる、もらう、くれる en distintos contextos|Expresar favores y acciones hacia otros|Uso con la forma て para favores compuestos##3. PASIVA Y CAUSATIVA|Formación de la voz pasiva en japonés|Uso de la causativa para hacer o dejar hacer|Diferencias con el español##4. KANJI NIVEL N4|Kanji de uso frecuente en textos cotidianos|Vocabulario compuesto con kanji N4|Lectura de textos simples con kanji', '1. MANEJAR ESTRUCTURAS CONDICIONALES|Expresar condiciones e hipótesis con fluidez|Elegir el condicional adecuado según el contexto##2. COMUNICAR ACCIONES DE DAR Y RECIBIR|Usar correctamente あげる、もらう y くれる|Expresar gratitud y favores de forma natural##3. COMPRENDER LA PASIVA Y CAUSATIVA|Reconocer y formar la voz pasiva|Expresar que alguien hace o deja hacer algo##4. AMPLIAR EL CONOCIMIENTO DE KANJI|Leer textos cotidianos con kanji N4|Incorporar nuevo vocabulario compuesto', 'Profundiza en el japonés y expresa ideas cada vez más complejas', 'curso-musubu-hero.jpg', 'musubu.png'),
(6, 2, 'Curso \"Fukai\" (深い)', 'Fukai (深い) significa \"profundo\" y representa la etapa en la que el japonés alcanza su mayor complejidad dentro del nivel N4. En este curso trabajarás estructuras avanzadas que te acercarán al uso real del idioma en contextos más formales y elaborados. A lo largo del curso te introducirás en el keigo o lenguaje honorífico, aprenderás a expresar obligación y prohibición con distintos matices, y dominarás la nominalización y las cláusulas relativas para construir frases complejas y bien cohesionadas. También repasarás toda la gramática N5 y N4 con vistas a prepararte para el examen JLPT N4. Las lecciones están diseñadas para que llegues al final del nivel con seguridad, con un japonés que ya no se limita a situaciones cotidianas sino que puede adaptarse a contextos más variados y exigentes. Fukai es el curso donde el japonés se vuelve verdaderamente tuyo.', 'curso-fukai.jpg', 1, '1. KEIGO — LENGUAJE HONORÍFICO|Introducción al lenguaje formal japonés|Formas sonkeigo y kenjougo básicas|Uso del keigo en situaciones profesionales##2. OBLIGACIÓN Y PROHIBICIÓN|なければなりません y なくてもいいです|てはいけません para prohibiciones|Matices entre obligación fuerte y débil##3. NOMINALIZACIÓN Y CLÁUSULAS|Nominalización con こと y の|Cláusulas relativas en japonés|Construcción de frases subordinadas complejas##4. PREPARACIÓN JLPT N4|Repaso de gramática N5 y N4 completa|Estrategias para el examen de comprensión lectora|Vocabulario y kanji frecuentes en el examen', '1. INICIARSE EN EL LENGUAJE FORMAL|Reconocer y usar formas básicas del keigo|Comunicarse con respeto en entornos profesionales##2. EXPRESAR OBLIGACIÓN Y PERMISO|Indicar lo que es obligatorio o está prohibido|Matizar el grado de obligación de forma natural##3. DOMINAR ESTRUCTURAS AVANZADAS|Usar cláusulas relativas correctamente|Construir frases complejas y bien cohesionadas##4. PREPARARSE PARA EL JLPT N4|Consolidar todos los contenidos N4|Afrontar el examen con confianza y seguridad', 'Alcanza el nivel N4 y prepárate para el JLPT con confianza', 'curso-fukai-hero.jpg', 'fukai.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id_ejercicio` int(11) NOT NULL,
  `id_leccion` int(11) NOT NULL,
  `tipo` enum('opcion_multiple','traduccion') NOT NULL,
  `pregunta` text NOT NULL,
  `opcion_a` varchar(255) DEFAULT NULL,
  `opcion_b` varchar(255) DEFAULT NULL,
  `opcion_c` varchar(255) DEFAULT NULL,
  `respuesta_correcta` varchar(10) NOT NULL,
  `explicacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id_ejercicio`, `id_leccion`, `tipo`, `pregunta`, `opcion_a`, `opcion_b`, `opcion_c`, `respuesta_correcta`, `explicacion`) VALUES
(1, 1, 'opcion_multiple', '日本語は______と思います。', 'むずかしい', 'むずかしいです', 'むずかしいだ', 'a', 'ANTES DE 〜と思います USAMOS FORMA SIMPLE'),
(2, 1, 'opcion_multiple', '明日、雨が______と思います。', 'ふります', 'ふる', 'ふった', 'b', ''),
(3, 1, 'opcion_multiple', 'この映画は面白い（___）と思います。', 'です', 'だ', 'Ø', 'c', ''),
(4, 1, 'opcion_multiple', '明日は忙しい（___）と思います。', 'です', 'Ø', '', 'b', ''),
(5, 1, 'traduccion', 'CREO QUE EL JAPONÉS ES INTERESANTE.', '日本語はおもしろいと思います。', '日本語はおもしろいですと思います。', '日本語がおもしろいと思いますです。', 'a', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gramatica`
--

CREATE TABLE `gramatica` (
  `id_gramatica` int(11) NOT NULL,
  `id_leccion` int(11) NOT NULL,
  `forma` varchar(255) DEFAULT NULL,
  `explicacion` text DEFAULT NULL,
  `ejemplos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gramatica`
--

INSERT INTO `gramatica` (`id_gramatica`, `id_leccion`, `forma`, `explicacion`, `ejemplos`) VALUES
(1, 1, 'と思います（とおもいます）', 'Se utiliza para indicar lo que uno piensa o cree. Se construye con la forma informal del verbo o adjetivo seguida de と思います.\r\n\r\nEsta forma tiene varios usos:\r\n1) Para expresar suposiciones\r\n2) Para manifestar una opinión', '明日雨がふると思います — Creo que mañana lloverá\r\nテレーザちゃんはもうねたと思います — Creo que Teresa ya se ha ido a dormir\r\n母も日本へ来ると思います — Creo que mi madre también vendrá a Japón\r\n日本はぶっかが高いと思います — Pienso que el costo de vida en Japón es alto\r\nちかてつはべんりだと思います — Pienso que el metro es útil\r\nねこはとてもかわいいと思います — Pienso que los gatos son muy lindos\r\n東京はしずかじゃないと思います — Pienso que Tokio no es tranquilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

CREATE TABLE `lecciones` (
  `id_leccion` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `numero_leccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lecciones`
--

INSERT INTO `lecciones` (`id_leccion`, `id_curso`, `titulo`, `numero_leccion`) VALUES
(1, 2, 'と思います — Expresar opiniones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `opinion` text DEFAULT NULL,
  `puntuacion` tinyint(4) DEFAULT NULL CHECK (`puntuacion` between 1 and 5),
  `img_portada` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `descripcion`, `img`, `opinion`, `puntuacion`, `img_portada`) VALUES
(15, 'La policia de la memoria', 'Yoko Ogawa', 'Una distopía poética donde los objetos desaparecen de la memoria colectiva.', 'libro-policia.jpg', 'Una obra maestra del género distópico.', 5, 'portada-policia.jpg'),
(16, 'Tercer amor', 'Hiromi Kawakami', 'Una historia de amor pausada y llena de matices en el Japón contemporáneo.', 'libro(5).jpg', 'Delicada y hermosa.', 4, 'portada-terceramor.jpg'),
(17, 'Soy un gato', 'Natsume Soseki', 'Un clásico narrado desde la perspectiva de un gato observador de la sociedad japonesa.', 'libro-gato.jpg', 'Un clásico imprescindible.', 5, 'portada-gato.jpg'),
(18, 'Kitchen', 'Banana Yoshimoto', 'Una novela sobre la pérdida, el duelo y el hogar narrada con delicadeza.', 'libro(2).jpg', 'Muy emotiva y reconfortante.', 5, 'portada-kitchen.jpg'),
(19, 'Si los gatos desaparecieran del mundo', 'Genki Kawamura', 'Una reflexión filosófica sobre la vida, la muerte y lo que nos hace humanos.', 'libro(3).jpg', 'Muy recomendable.', 5, 'portada-gatos.jpg'),
(20, 'Antes de que se enfrie el cafe', 'Toshikazu Kawaguchi', 'Viajes en el tiempo en una cafetería japonesa llena de magia y emoción.', 'libro(1).jpg', 'Muy emotivo.', 5, 'portada-cafe.jpg'),
(21, 'La Dependienta', 'Sayaka Murata', 'Una mirada diferente y perturbadora a la sociedad japonesa y sus normas.', 'libro(4).jpg', 'Original y diferente.', 4, 'portada-dependienta.jpg'),
(22, 'Botchan', 'Natsume Soseki', 'Un joven maestro idealista choca con la hipocresía del mundo rural japonés.', 'libro-botchan.jpg', 'Un clásico con mucho humor.', 4, 'portada-botchan.jpg'),
(24, 'La bailarina', 'Ogai Mori', 'Una historia de amor y sacrificio ambientada en el Japón de la era Meiji.', 'libro-bailarina.jpg', 'Clásico imprescindible de la literatura japonesa.', 5, 'portada-bailarina.jpg'),
(25, 'Strange Pictures', 'Uketsu', 'Una inquietante colección de historias visuales sobre la naturaleza humana.', 'libro-strange.jpg', 'Perturbador y original.', 4, 'portada-strange.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `titulo_nivel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `titulo_nivel`) VALUES
(1, 'Japonés Inicial N5'),
(2, 'Japonés Intermedio N4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `rol` enum('admin','cliente') NOT NULL DEFAULT 'cliente',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `nombre_usuario`, `email`, `password`, `telefono`, `foto`, `rol`, `activo`, `fecha_registro`) VALUES
(1, 'Leticia', 'Delgado', 'leti_admin', 'admin@japonesconleti.com', '$2y$10$VIKO93AOx5bkr4OLdKml7.j6CFeSi9xJW0r9dx.biJ2Pq0gXtc9X2', '681297866', 'img-leticia.jpg', 'admin', 1, '2026-05-29 11:47:13'),
(2, 'Ana', 'García', 'ana_garcia', 'ana@ejemplo.com', 'a2575cf13c894d4ec33cad0c4795050d1f58effa9a4860b7585acbd14dc9ef9e', NULL, NULL, 'cliente', 1, '2026-05-29 11:47:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_cursos`
--

CREATE TABLE `usuarios_cursos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha_compra` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_cursos`
--

INSERT INTO `usuarios_cursos` (`id`, `id_usuario`, `id_curso`, `fecha_compra`, `estado`) VALUES
(1, 1, 1, '2026-06-01 18:09:10', 'activo'),
(2, 1, 2, '2026-06-01 18:18:08', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vocabulario`
--

CREATE TABLE `vocabulario` (
  `id_vocab` int(11) NOT NULL,
  `id_leccion` int(11) NOT NULL,
  `palabra_japonesa` varchar(255) DEFAULT NULL,
  `romaji` varchar(255) DEFAULT NULL,
  `traduccion` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vocabulario`
--

INSERT INTO `vocabulario` (`id_vocab`, `id_leccion`, `palabra_japonesa`, `romaji`, `traduccion`, `img`) VALUES
(1, 1, 'まけます', 'MAKEMASU', 'Perder', 'vocab-makemasu.png'),
(2, 1, 'かちます', 'KACHIMASU', 'Ganar', 'vocab-kachimasu.png'),
(3, 1, '[かいしゃを] やめます', '[KAISHA O] YAMEMASU', 'Dimitir, dejar una empresa', 'vocab-yamemasu.png'),
(4, 1, 'りゅうがくします', 'RYŪGAKUSHIMASU', 'Viajar al extranjero', 'vocab-ryugaku.png'),
(5, 1, 'ふべん[な]', 'FUBEN[NA]', 'Inconveniente', 'vocab-fuben.png'),
(6, 1, 'ほうそう', 'HŌSŌ', 'Transmisión, anuncio', 'vocab-hoso.png'),
(7, 1, 'うそ', 'USO', 'Mentira', 'vocab-uso.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id_audio`),
  ADD KEY `id_leccion` (`id_leccion`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cultura`
--
ALTER TABLE `cultura`
  ADD PRIMARY KEY (`id_cultura`),
  ADD KEY `id_leccion` (`id_leccion`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id_ejercicio`),
  ADD KEY `id_leccion` (`id_leccion`);

--
-- Indices de la tabla `gramatica`
--
ALTER TABLE `gramatica`
  ADD PRIMARY KEY (`id_gramatica`),
  ADD KEY `id_leccion` (`id_leccion`);

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id_leccion`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unico_usuario_curso` (`id_usuario`,`id_curso`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `vocabulario`
--
ALTER TABLE `vocabulario`
  ADD PRIMARY KEY (`id_vocab`),
  ADD KEY `id_leccion` (`id_leccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audios`
--
ALTER TABLE `audios`
  MODIFY `id_audio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cultura`
--
ALTER TABLE `cultura`
  MODIFY `id_cultura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `gramatica`
--
ALTER TABLE `gramatica`
  MODIFY `id_gramatica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id_leccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vocabulario`
--
ALTER TABLE `vocabulario`
  MODIFY `id_vocab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audios`
--
ALTER TABLE `audios`
  ADD CONSTRAINT `audios_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`);

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `cultura`
--
ALTER TABLE `cultura`
  ADD CONSTRAINT `cultura_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`);

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`);

--
-- Filtros para la tabla `gramatica`
--
ALTER TABLE `gramatica`
  ADD CONSTRAINT `gramatica_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`);

--
-- Filtros para la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD CONSTRAINT `lecciones_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Filtros para la tabla `usuarios_cursos`
--
ALTER TABLE `usuarios_cursos`
  ADD CONSTRAINT `usuarios_cursos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuarios_cursos_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Filtros para la tabla `vocabulario`
--
ALTER TABLE `vocabulario`
  ADD CONSTRAINT `vocabulario_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
