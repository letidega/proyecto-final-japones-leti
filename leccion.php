<?php
session_start();
require_once 'conexion.php';

// Acceso restringido — solo usuarios logueados
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: cursos.php');
    exit;
}

$id_leccion = $_GET['id'];

// Datos de la lección
$consultaLeccion = $conexion->prepare("SELECT * FROM lecciones WHERE id_leccion = :id_leccion");
$consultaLeccion->execute([':id_leccion' => $id_leccion]);
$leccion = $consultaLeccion->fetch(PDO::FETCH_ASSOC);

if (!$leccion) {
    header('Location: cursos.php');
    exit;
}

// Vocabulario
$consultaVocab = $conexion->prepare("SELECT * FROM vocabulario WHERE id_leccion = :id_leccion");
$consultaVocab->execute([':id_leccion' => $id_leccion]);
$vocabulario = $consultaVocab->fetchAll(PDO::FETCH_ASSOC);

// Gramática
$consultaGram = $conexion->prepare("SELECT * FROM gramatica WHERE id_leccion = :id_leccion");
$consultaGram->execute([':id_leccion' => $id_leccion]);
$gramatica = $consultaGram->fetchAll(PDO::FETCH_ASSOC);

// Ejercicios
$consultaEjer = $conexion->prepare("SELECT * FROM ejercicios WHERE id_leccion = :id_leccion");
$consultaEjer->execute([':id_leccion' => $id_leccion]);
$ejercicios = $consultaEjer->fetchAll(PDO::FETCH_ASSOC);

// Audios
$consultaAudio = $conexion->prepare("SELECT * FROM audios WHERE id_leccion = :id_leccion");
$consultaAudio->execute([':id_leccion' => $id_leccion]);
$audios = $consultaAudio->fetchAll(PDO::FETCH_ASSOC);

// Cultura
$consultaCultura = $conexion->prepare("SELECT * FROM cultura WHERE id_leccion = :id_leccion");
$consultaCultura->execute([':id_leccion' => $id_leccion]);
$culturas = $consultaCultura->fetchAll(PDO::FETCH_ASSOC);

include("header-leccion.php");
?>

<!-- TABS DE LECCIÓN -->
<section class="leccion-section">

  <!-- BARRA DE TABS -->
  <nav class="leccion-tabs" role="tablist">
    <button class="tab-btn active" data-tab="vocabulario" role="tab" aria-selected="true">
      <span class="tab-icono">🎴</span>
      <span class="tab-label">VOCABULARIO</span>
    </button>
    <button class="tab-btn" data-tab="gramatica" role="tab" aria-selected="false">
      <span class="tab-icono tab-kanji">ま</span>
      <span class="tab-label">GRAMÁTICA</span>
    </button>
    <button class="tab-btn" data-tab="ejercicios" role="tab" aria-selected="false">
      <span class="tab-icono">🐰</span>
      <span class="tab-label">EJERCICIOS</span>
    </button>
    <button class="tab-btn" data-tab="audio" role="tab" aria-selected="false">
      <span class="tab-icono">🎵</span>
      <span class="tab-label">AUDIO</span>
    </button>
    <button class="tab-btn" data-tab="cultura" role="tab" aria-selected="false">
      <span class="tab-icono">⛩️</span>
      <span class="tab-label">CULTURA</span>
    </button>
  </nav>

  <!-- CONTENIDO TABS -->
  <div class="leccion-contenido">

    <!-- VOCABULARIO -->
    <div id="vocabulario" class="tab-contenido active">
      <div class="container">
        <div class="vocab-grid">
          <?php foreach ($vocabulario as $vocab) { ?>
            <div class="vocab-item">
              <?php if ($vocab['img']) { ?>
                <img src="img/vocab/<?= $vocab['img'] ?>" alt="<?= $vocab['traduccion'] ?>">
              <?php } ?>
              <p class="vocab-romaji"><?= $vocab['romaji'] ?></p>
              <p class="vocab-japones"><?= $vocab['palabra_japonesa'] ?></p>
              <p class="vocab-traduccion"><?= $vocab['traduccion'] ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- GRAMÁTICA -->
    <div id="gramatica" class="tab-contenido">
      <div class="container">
        <?php foreach ($gramatica as $gram) { ?>
          <div class="gramatica-bloque">
            <div class="gramatica-forma">
              Forma: <strong><?= $gram['forma'] ?></strong>
            </div>
            <div class="gramatica-explicacion">
              <?= nl2br($gram['explicacion']) ?>
            </div>
            <div class="gramatica-ejemplos">
              <?= nl2br($gram['ejemplos']) ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- EJERCICIOS -->
    <div id="ejercicios" class="tab-contenido">
      <div class="container">
        <form id="form-ejercicios" novalidate>

          <?php
          $tipo_actual = '';
          $num = 1;
          foreach ($ejercicios as $ejercicio) {

            // Título de sección si cambia el tipo
            if ($ejercicio['tipo'] != $tipo_actual) {
              $tipo_actual = $ejercicio['tipo'];
              if ($tipo_actual == 'opcion_multiple') {
                echo '<h3 class="ejercicio-titulo">COMPLETA LA FRASE (ELIGE LA OPCIÓN CORRECTA)</h3>';
              } else {
                echo '<h3 class="ejercicio-titulo mt-5">TRADUCCIÓN GUIADA (ELIGE LA TRADUCCIÓN CORRECTA)</h3>';
                echo '<p class="ejercicio-instruccion">👉 "' . $ejercicio['pregunta'] . '"</p>';
              }
            }
          ?>

            <div class="ejercicio-item"
                 data-respuesta="<?= $ejercicio['respuesta_correcta'] ?>"
                 data-explicacion="<?= $ejercicio['explicacion'] ?>">

              <?php if ($ejercicio['tipo'] == 'opcion_multiple') { ?>
                <p class="ejercicio-pregunta"><?= $num ?>. <?= $ejercicio['pregunta'] ?></p>
              <?php } ?>

              <div class="ejercicio-opciones">
                <?php if ($ejercicio['opcion_a']) { ?>
                  <label class="ejercicio-opcion">
                    <input type="radio" name="pregunta_<?= $ejercicio['id_ejercicio'] ?>" value="a">
                    A) <?= $ejercicio['opcion_a'] ?>
                  </label>
                <?php } ?>
                <?php if ($ejercicio['opcion_b']) { ?>
                  <label class="ejercicio-opcion">
                    <input type="radio" name="pregunta_<?= $ejercicio['id_ejercicio'] ?>" value="b">
                    B) <?= $ejercicio['opcion_b'] ?>
                  </label>
                <?php } ?>
                <?php if ($ejercicio['opcion_c']) { ?>
                  <label class="ejercicio-opcion">
                    <input type="radio" name="pregunta_<?= $ejercicio['id_ejercicio'] ?>" value="c">
                    C) <?= $ejercicio['opcion_c'] ?>
                  </label>
                <?php } ?>
              </div>

              <div class="ejercicio-feedback"></div>

            </div>

          <?php $num++; } ?>

          <div class="ejercicio-botones">
            <button type="button" class="btn miBoton" id="btn-corregir">¡CORREGIR!</button>
            <button type="button" class="btn miBoton btn-volver" id="btn-volver">VOLVER ATRÁS</button>
          </div>

        </form>
      </div>
    </div>

    <!-- AUDIO -->
    <div id="audio" class="tab-contenido">
      <div class="container">
        <div class="audio-lista">
          <?php foreach ($audios as $audio) { ?>
            <div class="audio-item">
              <p class="audio-titulo"><?= $audio['titulo'] ?></p>
              <audio controls class="audio-player">
                <source src="audio/<?= $audio['archivo'] ?>" type="audio/mpeg">
                Tu navegador no soporta el elemento de audio.
              </audio>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- CULTURA -->
    <div id="cultura" class="tab-contenido">
      <div class="container">
        <?php foreach ($culturas as $cultura) { ?>
          <div class="cultura-bloque">
            <?php if ($cultura['img']) { ?>
              <img src="img/cultura/<?= $cultura['img'] ?>" alt="<?= $cultura['titulo'] ?>" class="cultura-img">
            <?php } ?>
            <h3 class="cultura-titulo"><?= $cultura['titulo'] ?></h3>
            <p class="cultura-contenido"><?= nl2br($cultura['contenido']) ?></p>
          </div>
        <?php } ?>
      </div>
    </div>

  </div>
</section>

<?php include("footer-leccion.php"); ?>