<?php
require_once 'conexion.php';
include("header-dark.php");

$porPagina = 8;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $porPagina;

$consultaTotal = $conexion->prepare("SELECT COUNT(*) FROM blog WHERE publicado = 1");
$consultaTotal->execute();
$total = $consultaTotal->fetchColumn();
$totalPaginas = ceil($total / $porPagina);

$consultaPosts = $conexion->prepare("SELECT * FROM blog WHERE publicado = 1 ORDER BY fecha DESC LIMIT :limite OFFSET :offset");
$consultaPosts->bindValue(':limite', $porPagina, PDO::PARAM_INT);
$consultaPosts->bindValue(':offset', $offset, PDO::PARAM_INT);
$consultaPosts->execute();
$posts = $consultaPosts->fetchAll(PDO::FETCH_ASSOC);

include("header.php");
?>

<!-- HERO BLOG — mismo formato que lit japonesa -->
<section class="lit-hero d-flex">
  <div class="lit-hero-left blog-hero-left">
    <div class="lit-hero-content">
      <h1>BLOG</h1>
      <p>En el blog comparto reflexiones, recursos y contenidos sobre el japonés y la cultura japonesa. Un espacio para aprender, inspirarte y seguir acercándote a Japón.</p>
    </div>
  </div>
  <div class="lit-hero-right">
    <img src="img/blog.jpg" alt="Blog de japonés con Leti">
    <div class="lit-hero-overlay"></div>
  </div>
</section>

<!-- LISTADO POSTS -->
<section class="lit-listado">

  <div class="lit-deco lit-deco-izq" aria-hidden="true">
    <img src="img/ilustracion-torii-izq.png" alt="">
  </div>
  <div class="lit-deco lit-deco-der" aria-hidden="true">
    <img src="img/ilustracion-torii-der.png" alt="">
  </div>

  <div class="container lit-container">
    <div class="row g-4">
      <?php foreach ($posts as $post) { ?>
        <div class="col-lg-3 col-md-6 col-6">
          <article class="lit-libro-card">
            <img src="img/<?= $post['img'] ?>"
                 alt="<?= $post['titulo'] ?>"
                 class="lit-libro-img">
            <p class="lit-libro-categoria"><?= $post['categoria'] ?></p>
            <p class="lit-libro-titulo"><?= $post['titulo'] ?></p>
          </article>
        </div>
      <?php } ?>
    </div>

    <!-- PAGINACIÓN -->
    <?php if ($totalPaginas > 1) { ?>
      <div class="lit-paginacion">
        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
          <a href="blog.php?pagina=<?= $i ?>"
             class="lit-pag-num <?= $i == $paginaActual ? 'activa' : '' ?>">
            <?= $i ?>
          </a>
        <?php } ?>
      </div>
    <?php } ?>

  </div>
</section>

<?php include("footer.php"); ?>