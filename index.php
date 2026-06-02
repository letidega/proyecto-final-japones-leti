<?php

include("header.php");

require_once 'conexion.php';

// Consulta libros
$consultaLibros = $conexion->prepare("SELECT * FROM libros ORDER BY id_libro DESC LIMIT 5");
$consultaLibros->execute();
$libros = $consultaLibros->fetchAll(PDO::FETCH_ASSOC);

// Consulta blog
$consultaBlog = $conexion->prepare("SELECT * FROM blog WHERE publicado = 1 ORDER BY fecha DESC LIMIT 4");
$consultaBlog->execute();
$posts = $consultaBlog->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- HERO -->
<section class="hero d-flex align-items-center">
  <div class="container">
    <div class="col-lg-6">
      <span class="subtitulo">Academia de japonés online</span>
      <h1 class="display-4 fw-bold">JAPONÉS<br>CON LETI</h1>
      <div class="mt-4">
        <a href="contacto.php" class="boton-contacto">Contactar</a>
        <a href="sobre-mi.php" class="boton-conocenos">Conócenos</a>
      </div>
    </div>
  </div>
</section>

<!-- POR QUÉ ELEGIRNOS -->
<section class="elegirnos py-5 text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="img/por-que-elegirnos(1).jpg" class="rounded-circle mb-3 w-50" alt="Aprende a tu ritmo">
        <p>Aprende a tu ritmo, sin horarios</p>
      </div>
      <div class="col-md-3">
        <img src="img/por-que-elegirnos(3).jpg" class="rounded-circle mb-3 w-50" alt="Lecciones claras">
        <p>Lecciones claras y estructuradas</p>
      </div>
      <div class="col-md-3">
        <img src="img/por-que-elegirnos(4).jpg" class="rounded-circle mb-3 w-50" alt="Ejercicios interactivos">
        <p>Ejercicios interactivos</p>
      </div>
      <div class="col-md-3">
        <img src="img/por-que-elegirnos(2).jpg" class="rounded-circle mb-3 w-50" alt="Acompañamiento cercano">
        <p>Acompañamiento cercano de tu profesora</p>
      </div>
    </div>
  </div>
</section>

<!-- MÉTODO -->
<section class="metodo">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="mb-3">NUESTRO MÉTODO</h2>
        <p class="mb-4">
          En Japonés con Leti aprenderás japonés de forma flexible y a tu propio ritmo, sin horarios ni clases en vídeo. El método se basa en lecciones escritas claras y estructuradas, pensadas para estudiantes de habla hispana, que te permiten leer, tomar apuntes y avanzar con calma.
          Cada lección incluye ejercicios interactivos y autocorregibles para afianzar lo aprendido, además de acompañamiento cercano para resolver dudas y mantener la motivación. Tú decides cuándo y cómo estudiar; nosotras te guiamos durante todo el proceso.
        </p>
        <a href="cursos.php" class="boton-ver-cursos">Ver cursos</a>
      </div>
      <div class="col-md-6 order-1 order-md-2 text-center">
        <img src="img/metodo.jpg" class="img-fluid" alt="Método de aprendizaje Japonés con Leti">
      </div>
    </div>
  </div>
</section>

<!-- LITERATURA -->
<section class="literatura py-5">
  <div class="container">
    <div class="d-flex justify-content-between mb-4 align-items-center">
      <h2>LITERATURA JAPONESA</h2>
      <a href="#" class="btn miBoton">Mostrar más</a>
    </div>
    <div class="options">

      <?php $primero = true; ?>
      <?php foreach ($libros as $libro) { ?>
        <div class="option <?= $primero ? 'active' : '' ?>" 
             style="--bg:url('../img/<?= $libro['img'] ?>')">
          <div class="overlay-text">
            <h3><?= $libro['titulo'] ?></h3>
            <span><?= $libro['autor'] ?></span>
          </div>
        </div>
        <?php $primero = false; ?>
      <?php } ?>

    </div>
  </div>
</section>

<!-- BLOG -->
<!-- BLOG -->
<section class="blog">
  <div class="container">
    <div class="d-flex justify-content-between mb-4 align-items-center">
      <h2>BLOG</h2>
      <a href="#" class="btn miBoton">Mostrar más</a>
    </div>
    <div class="row g-4">

      <?php foreach ($posts as $post) { ?>
        <div class="col-md-3">
          <img src="img/<?= $post['img'] ?>" class="img-fluid mb-2" alt="<?= $post['titulo'] ?>">
          <p><?= $post['categoria'] ?></p>
          <h3><?= $post['titulo'] ?></h3>
        </div>
      <?php } ?>

    </div>
  </div>
</section>

<!-- RESEÑAS -->
<section class="resenas text-center">
  <div class="resenas-contenido">

    <i class="fa-solid fa-chevron-left flecha izquierda" id="flecha-izq" aria-label="Reseña anterior"></i>

    <div class="container">
      <h2>RESEÑAS</h2>

      <div class="resenas-slider">

        <div class="resena-item active">
          <p class="stars">★★★★★</p>
          <p class="nombre-cliente">Carlos P.</p>
          <p class="resena">"Siempre quise aprender japonés, pero nunca encajaba con horarios ni clases en vídeo. Aquí puedo estudiar cuando quiero y entender de verdad lo que estoy aprendiendo."</p>
        </div>

        <div class="resena-item">
          <p class="stars">★★★★★</p>
          <p class="nombre-cliente">María L.</p>
          <p class="resena">"Las lecciones están muy bien estructuradas y se nota que hay mucho cariño detrás. Leti explica todo con una claridad increíble. Lo recomiendo a cualquiera que quiera aprender japonés de verdad."</p>
        </div>

        <div class="resena-item">
          <p class="stars">★★★★★</p>
          <p class="nombre-cliente">Alejandro R.</p>
          <p class="resena">"Llevaba años queriendo aprender japonés y no encontraba la forma. Con Japonés con Leti por fin siento que avanzo. El ritmo es perfecto y nunca me siento perdido."</p>
        </div>

        <div class="resena-item">
          <p class="stars">★★★★☆</p>
          <p class="nombre-cliente">Sofia M.</p>
          <p class="resena">"Me encanta que puedo aprender a mi propio ritmo sin presión. El contenido es muy completo y los ejercicios me ayudan mucho a afianzar lo que voy aprendiendo."</p>
        </div>

        <div class="resena-item">
          <p class="stars">★★★★★</p>
          <p class="nombre-cliente">Javier T.</p>
          <p class="resena">"La mejor plataforma para aprender japonés en español que he encontrado. Leti tiene una forma de explicar las cosas que hace que todo tenga sentido desde el principio."</p>
        </div>

      </div>
    </div>

    <i class="fa-solid fa-chevron-right flecha derecha" id="flecha-der" aria-label="Siguiente reseña"></i>

  </div>
</section>

<?php include("footer.php"); ?>
