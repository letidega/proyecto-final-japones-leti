<?php

require_once 'conexion.php';

include("header-dark.php");

$porPagina = 8;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $porPagina;

$consultaTotal = $conexion->prepare("SELECT COUNT(*) FROM libros");
$consultaTotal->execute();
$total = $consultaTotal->fetchColumn();
$totalPaginas = ceil($total / $porPagina);

$consultaLibros = $conexion->prepare("SELECT * FROM libros ORDER BY id_libro DESC LIMIT :limite OFFSET :offset");
$consultaLibros->bindValue(':limite', $porPagina, PDO::PARAM_INT);
$consultaLibros->bindValue(':offset', $offset, PDO::PARAM_INT);
$consultaLibros->execute();
$libros = $consultaLibros->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- HERO — dividido en 2 -->
<section class="lit-hero d-flex">
  <div class="lit-hero-left">
    <div class="lit-hero-content">
      <h1>LITERATURA<br>JAPONESA</h1>
      <p>La literatura japonesa es una forma distinta de acercarse al idioma y a la cultura. En esta sección encontrarás lecturas recomendadas para descubrir Japón a través de sus historias.</p>
    </div>
  </div>
  <div class="lit-hero-right">
    <img src="img/literatura-japonesa-hero.jpg" alt="Libros japoneses">
    <div class="lit-hero-overlay" aria-hidden="true"></div>
  </div>
</section>

<!-- LISTADO LIBROS -->
<section class="lit-listado">

  <div class="lit-deco lit-deco-izq" aria-hidden="true">
    <img src="img/ilustracion-ginkgo-izq.png" alt="">
  </div>
  <div class="lit-deco lit-deco-der" aria-hidden="true">
    <img src="img/ilustracion-ginkgo-der.png" alt="">
  </div>

  <div class="container lit-container">
    <div class="row g-4">
      <?php foreach ($libros as $libro) { ?>
        <div class="col-lg-3 col-md-6 col-6">
          <article class="lit-libro-card">
            <img src="img/<?= $libro['img_portada'] ?>"
                 alt="<?= $libro['titulo'] ?>"
                 class="lit-libro-img">
            <p class="lit-libro-titulo"><?= $libro['titulo'] ?></p>
            <p class="lit-libro-autor"><?= $libro['autor'] ?></p>
          </article>
        </div>
      <?php } ?>
    </div>

    <!-- PAGINACIÓN -->
    <?php if ($totalPaginas > 1) { ?>
      <div class="lit-paginacion">
        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
          <a href="literatura-japonesa.php?pagina=<?= $i ?>"
             class="lit-pag-num <?= $i == $paginaActual ? 'activa' : '' ?>">
            <?= $i ?>
          </a>
        <?php } ?>
      </div>
    <?php } ?>

  </div>
</section>

<?php include("footer.php"); ?>