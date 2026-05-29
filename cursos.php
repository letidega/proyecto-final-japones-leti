<?php

include("header-dark.php");

require_once 'conexion.php';

// Consulta cursos nivel inicial
$consultaInicial = $conexion->prepare("SELECT * FROM cursos WHERE id_nivel = 1 AND activo = 1");
$consultaInicial->execute();
$cursosInicial = $consultaInicial->fetchAll(PDO::FETCH_ASSOC);

// Consulta cursos nivel intermedio
$consultaIntermedio = $conexion->prepare("SELECT * FROM cursos WHERE id_nivel = 2 AND activo = 1");
$consultaIntermedio->execute();
$cursosIntermedio = $consultaIntermedio->fetchAll(PDO::FETCH_ASSOC);


?>

<!-- HERO CURSOS -->
<section class="cursos-hero d-flex">
  <div class="cursos-hero-left d-flex align-items-end">
    <div class="cursos-hero-content">
      <h1>CURSOS</h1>
      <p>
        A continuación te presentamos nuestros cursos, organizados por niveles y pensados
        para que avances paso a paso, sin prisa y con una estructura clara. Aprenderás
        japonés a tu ritmo mediante lecciones escritas, ejercicios interactivos y
        acompañamiento cercano, eligiendo el punto de partida que mejor se adapte a ti.
      </p>
    </div>
  </div>
  <div class="cursos-hero-right">
      <div class="hero-overlay" aria-hidden="true"></div>
    <img src="./img/cursos-hero.jpg" alt="Estudiante de japonés">
  </div>
</section>

<!-- LISTADO DE CURSOS -->
<section class="cursos-listado">

  <div class="container">
    <div class="cursos-listado-inner">

      <!-- JAPONÉS INICIAL -->
      <div class="cursos-nivel">
        <h2 class="text-center">JAPONÉS INICIAL</h2>
        <div class="row g-4 justify-content-center">

          <?php foreach ($cursosInicial as $curso) { ?>
            <div class="col-lg-4 col-md-6">
              <article class="curso-card text-center">
                <img src="img/<?= $curso['img'] ?>" class="img-fluid curso-card-img" alt="<?= $curso['titulo'] ?>">
                <p class="curso-card-label"><?= $curso['titulo_nivel'] ?? 'JAPONÉS INICIAL' ?></p>
                <p class="curso-card-titulo"><?= $curso['titulo'] ?></p>
                <a href="curso-individual.php?id=<?= $curso['id_curso'] ?>" class="boton-ver-cursos">VER MÁS</a>
              </article>
            </div>
          <?php } ?>

        </div>
      </div>

      <!-- JAPONÉS INTERMEDIO -->
      <div class="cursos-nivel">
        <h2 class="text-center">JAPONÉS INTERMEDIO</h2>
        <div class="row g-4 justify-content-center">

          <?php foreach ($cursosIntermedio as $curso) { ?>
            <div class="col-lg-4 col-md-6">
              <article class="curso-card text-center">
                <img src="img/<?= $curso['img'] ?>" class="img-fluid curso-card-img" alt="<?= $curso['titulo'] ?>">
                <p class="curso-card-label"><?= $curso['titulo_nivel'] ?? 'JAPONÉS INTERMEDIO' ?></p>
                <p class="curso-card-titulo"><?= $curso['titulo'] ?></p>
                <a href="curso-individual.php?id=<?= $curso['id_curso'] ?>" class="boton-ver-cursos">VER MÁS</a>
              </article>
            </div>
          <?php } ?>

        </div>
      </div>

      <!-- CTA PREMIUM -->
      <div class="cursos-cta text-center">
        <h3>¿BUSCAS UNA EXPERIENCIA MÁS COMPLETA?</h3>
        <a href="#" class="btn miBoton mt-3">MOSTRAR MÁS</a>
      </div>

    </div>
  </div>
</section>

<!-- RECURSOS GRATUITOS -->
<section class="recursos-section">

  <div class="recursos-deco recursos-deco-izq" aria-hidden="true">
    <img src="img/ilustracion-1.png" alt="">
  </div>

  <div class="recursos-deco recursos-deco-der" aria-hidden="true">
    <img src="img/ilustracion-2.png" alt="">
  </div>

  <div class="container recursos-inner">
    <div class="recursos-btn-wrapper">
      <a href="#" class="btn miBoton">MOSTRAR MÁS</a>
    </div>
    <h2>RECURSOS GRATUITOS</h2>
    <p>
      Accede a nuestros recursos gratuitos para empezar a aprender japonés o reforzar lo que ya sabes.
      Material pensado para que practiques con calma y a tu ritmo.
    </p>
  </div>

</section>

<?php include("footer.php"); ?>
