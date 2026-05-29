<?php 

include("header.php"); 
require_once 'conexion.php';

$id_curso = $_GET['id'];

// Datos curso
$consultaCurso = $conexion->prepare("SELECT * FROM cursos WHERE id_curso = :id_curso");
$consultaCurso->execute([':id_curso' => $id_curso]);
$curso = $consultaCurso->fetch(PDO::FETCH_ASSOC);

$contenidos = explode('##', $curso['contenidos']);
$objetivos = explode('##', $curso['objetivos']);

// Lecciones curso
$consultaLecciones = $conexion->prepare("SELECT * FROM lecciones WHERE id_curso = :id_curso ORDER BY numero_leccion ASC");
$consultaLecciones->execute([':id_curso' => $id_curso]);
$lecciones = $consultaLecciones->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- HERO CURSO -->
<section class="curso-ind-hero">
  <img src="img/<?= $curso['img'] ?>" alt="<?= $curso['titulo'] ?>">
  <div class="curso-ind-hero-overlay" aria-hidden="true"></div>
  <div class="curso-ind-hero-content">
    <h1><?= $curso['titulo'] ?></h1>
    <p><?= $curso['subtitulo'] ?></p>
  </div>
</section>

<!-- FEATURES -->
<section class="elegirnos py-5 text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="img/home/por-que-elegirnos(1).jpg" class="rounded-circle mb-3 w-50" alt="Aprende a tu ritmo">
        <p>APRENDE A TU RITMO, SIN HORARIOS</p>
      </div>
      <div class="col-md-3">
        <img src="img/home/por-que-elegirnos(3).jpg" class="rounded-circle mb-3 w-50" alt="Lecciones escritas">
        <p>LECCIONES ESCRITAS CLARAS Y ESTRUCTURADAS</p>
      </div>
      <div class="col-md-3">
        <img src="img/home/por-que-elegirnos(4).jpg" class="rounded-circle mb-3 w-50" alt="Ejercicios interactivos">
        <p>EJERCICIOS INTERACTIVOS Y AUTOCORREGIBLES</p>
      </div>
      <div class="col-md-3">
        <img src="img/home/por-que-elegirnos(2).jpg" class="rounded-circle mb-3 w-50" alt="Acompañamiento cercano">
        <p>ACOMPAÑAMIENTO CERCANO DE TU PROFESORA</p>
      </div>
    </div>
  </div>
</section>

<!-- DESCRIPCIÓN -->
<section class="curso-ind-desc">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-8 order-2 order-lg-1">
        <h2 class="mb-4">DESCRIPCIÓN DEL CURSO</h2>
        <p><?= $curso['descripcion'] ?></p>
      </div>
      <div class="col-12 col-lg-4 text-center order-1 order-lg-2">
        <img src="./img/kaze.png" alt="Kanji Kaze — viento" class="kanji-img">
      </div>
    </div>
  </div>
</section>

<section class="curso-ind-contenidos">
  <div class="container">
    <div class="row g-5">

      <div class="col-lg-6">
        <h2 class="contenidos-titulo">C O N T E N I D O S</h2>
        <?php foreach ($contenidos as $bloque) {
          $partes = explode('|', $bloque);
          $titulo = array_shift($partes);
        ?>
          <h4 class="mt-4"><?= $titulo ?></h4>
          <ul>
            <?php foreach ($partes as $item) { ?>
              <li><?= $item ?></li>
            <?php } ?>
          </ul>
        <?php } ?>
      </div>

      <div class="col-lg-6">
        <h2 class="contenidos-titulo">O B J E T I V O S</h2>
        <?php foreach ($objetivos as $bloque) {
          $partes = explode('|', $bloque);
          $titulo = array_shift($partes);
        ?>
          <h4 class="mt-4"><?= $titulo ?></h4>
          <ul>
            <?php foreach ($partes as $item) { ?>
              <li><?= $item ?></li>
            <?php } ?>
          </ul>
        <?php } ?>
      </div>

    </div>
  </div>
</section>

<!-- FORMULARIO DE CONTACTO -->
<section class="curso-ind-contacto">
  <div class="container">

    <p class="curso-contacto-intro text-center">
      ¿Tienes alguna duda o no sabes por dónde empezar? Escríbeme y estaré encantada de ayudarte.
      Te responderé lo antes posible para orientarte y acompañarte en tu camino con el japonés.
    </p>

    <form class="curso-form" novalidate>

      <div class="curso-form-grupo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="curso-input" placeholder="Introduce tu nombre">
      </div>

      <div class="curso-form-grupo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="curso-input" placeholder="Introduce tu apellido">
      </div>

      <div class="curso-form-grupo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" class="curso-input" placeholder="Introduce tu número de teléfono">
      </div>

      <div class="curso-form-grupo">
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" class="curso-input" placeholder="ejemplo@correo.com">
      </div>

      <div class="curso-form-grupo">
        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="mensaje" class="curso-input" placeholder="Escribe tu mensaje aquí"></textarea>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn-curso-enviar">ENVIAR</button>
      </div>

    </form>
  </div>
</section>

<?php include("footer.php"); ?>