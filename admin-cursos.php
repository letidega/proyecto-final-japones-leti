<?php

session_start();

require_once 'conexion.php';

// Acceso restringido solo admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
    exit;
}

// ELIMINAR curso
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $consultaEliminar = $conexion->prepare("DELETE FROM cursos WHERE id_curso = :id");
    $consultaEliminar->execute([':id' => $id]);
    header('Location: admin-cursos.php');
    exit;
}

// INSERTAR curso
if (isset($_POST['accion']) && $_POST['accion'] == 'insertar') {

    $img = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . '/img/' . $img);

    $img_grande = $_FILES['img_grande']['name'];
    move_uploaded_file($_FILES['img_grande']['tmp_name'], __DIR__ . '/img/' . $img_grande);

    $img_kanji = $_FILES['img_kanji']['name'];
    move_uploaded_file($_FILES['img_kanji']['tmp_name'], __DIR__ . '/img/' . $img_kanji);

    $consultaInsertar = $conexion->prepare("INSERT INTO cursos (id_nivel, titulo, subtitulo, descripcion, img, img_grande, img_kanji) VALUES (:id_nivel, :titulo, :subtitulo, :descripcion, :img, :img_grande, :img_kanji)");
    $consultaInsertar->execute([
        ':id_nivel'    => $_POST['id_nivel'],
        ':titulo'      => $_POST['titulo'],
        ':subtitulo'   => $_POST['subtitulo'],
        ':descripcion' => $_POST['descripcion'],
        ':img'         => $img,
        ':img_grande'  => $img_grande,
        ':img_kanji'   => $img_kanji
    ]);
    header('Location: admin-cursos.php');
    exit;
}

// EDITAR curso
if (isset($_POST['accion']) && $_POST['accion'] == 'editar') {

    if (!empty($_FILES['img']['name'])) {
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . '/img/' . $img);
    } else {
        $img = $_POST['img_actual'];
    }

    if (!empty($_FILES['img_grande']['name'])) {
        $img_grande = $_FILES['img_grande']['name'];
        move_uploaded_file($_FILES['img_grande']['tmp_name'], __DIR__ . '/img/' . $img_grande);
    } else {
        $img_grande = $_POST['img_grande_actual'];
    }

    if (!empty($_FILES['img_kanji']['name'])) {
        $img_kanji = $_FILES['img_kanji']['name'];
        move_uploaded_file($_FILES['img_kanji']['tmp_name'], __DIR__ . '/img/' . $img_kanji);
    } else {
        $img_kanji = $_POST['img_kanji_actual'];
    }

    $consultaEditar = $conexion->prepare("UPDATE cursos SET id_nivel = :id_nivel, titulo = :titulo, subtitulo = :subtitulo, descripcion = :descripcion, img = :img, img_grande = :img_grande, img_kanji = :img_kanji WHERE id_curso = :id_curso");
    $consultaEditar->execute([
        ':id_nivel'    => $_POST['id_nivel'],
        ':titulo'      => $_POST['titulo'],
        ':subtitulo'   => $_POST['subtitulo'],
        ':descripcion' => $_POST['descripcion'],
        ':img'         => $img,
        ':img_grande'  => $img_grande,
        ':img_kanji'   => $img_kanji,
        ':id_curso'    => $_POST['id_curso']
    ]);
    header('Location: admin-cursos.php');
    exit;
}

// LISTAR cursos
$consultaCursos = $conexion->prepare("SELECT * FROM cursos ORDER BY id_nivel ASC");
$consultaCursos->execute();
$cursos = $consultaCursos->fetchAll(PDO::FETCH_ASSOC);

// LISTAR niveles
$consultaNiveles = $conexion->prepare("SELECT * FROM niveles");
$consultaNiveles->execute();
$niveles = $consultaNiveles->fetchAll(PDO::FETCH_ASSOC);

// Cargar curso a editar si viene GET
$cursoEditar = null;
if (isset($_GET['editar'])) {
    $consultaCursoEditar = $conexion->prepare("SELECT * FROM cursos WHERE id_curso = :id");
    $consultaCursoEditar->execute([':id' => $_GET['editar']]);
    $cursoEditar = $consultaCursoEditar->fetch(PDO::FETCH_ASSOC);
}

include("header.php");
?>

<section class="admin-section">
  <div class="container">

    <!-- CABECERA -->
    <div class="admin-header">
      <h1 class="admin-titulo">GESTIÓN DE CURSOS</h1>
      <button class="btn miBoton" onclick="toggleFormulario('form-insertar')">+ AÑADIR CURSO</button>
    </div>

    <!-- FORMULARIO INSERTAR -->
    <div id="form-insertar" class="admin-form" style="display:none;">
      <h3>Nuevo curso</h3>
      <form method="POST" action="admin-cursos.php" enctype="multipart/form-data">
        <input type="hidden" name="accion" value="insertar">
        <div class="admin-form-grid">

          <div class="admin-form-grupo">
            <label>Nivel</label>
            <select name="id_nivel" class="admin-input">
              <?php foreach ($niveles as $nivel) { ?>
                <option value="<?= $nivel['id_nivel'] ?>"><?= $nivel['titulo_nivel'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="admin-form-grupo">
            <label>Título</label>
            <input type="text" name="titulo" class="admin-input" placeholder="Título del curso">
          </div>

          <div class="admin-form-grupo admin-form-grupo-full">
            <label>Subtítulo</label>
            <input type="text" name="subtitulo" class="admin-input" placeholder="Subtítulo del curso">
          </div>

          <div class="admin-form-grupo admin-form-grupo-full">
            <label>Descripción</label>
            <textarea name="descripcion" class="admin-input" rows="4" placeholder="Descripción del curso"></textarea>
          </div>

        </div>

        <div class="admin-form-grid-imagenes">
          <div class="admin-form-grupo">
            <label>Imagen pequeña (listado de cursos)</label>
            <input type="file" name="img" class="admin-input" accept="image/*">
          </div>
          <div class="admin-form-grupo">
            <label>Imagen grande (hero del curso)</label>
            <input type="file" name="img_grande" class="admin-input" accept="image/*">
          </div>
          <div class="admin-form-grupo">
            <label>Imagen kanji</label>
            <input type="file" name="img_kanji" class="admin-input" accept="image/*">
          </div>
        </div>

        <div class="admin-form-botones">
          <button type="submit" class="btn miBoton">GUARDAR</button>
          <button type="button" class="btn admin-btn-cancelar" onclick="toggleFormulario('form-insertar')">CANCELAR</button>
        </div>

      </form>
    </div>

    <!-- FORMULARIO EDITAR -->
    <?php if ($cursoEditar) { ?>
    <div id="form-editar" class="admin-form">
      <h3>Editar curso: <?= htmlspecialchars($cursoEditar['titulo'], ENT_QUOTES) ?></h3>
      <form method="POST" action="admin-cursos.php" enctype="multipart/form-data">
        <input type="hidden" name="accion" value="editar">
        <input type="hidden" name="id_curso" value="<?= $cursoEditar['id_curso'] ?>">
        <input type="hidden" name="img_actual" value="<?= htmlspecialchars($cursoEditar['img'], ENT_QUOTES) ?>">
        <input type="hidden" name="img_grande_actual" value="<?= htmlspecialchars($cursoEditar['img_grande'], ENT_QUOTES) ?>">
        <input type="hidden" name="img_kanji_actual" value="<?= htmlspecialchars($cursoEditar['img_kanji'], ENT_QUOTES) ?>">

        <div class="admin-form-grid">

          <div class="admin-form-grupo">
            <label>Nivel</label>
            <select name="id_nivel" class="admin-input">
              <?php foreach ($niveles as $nivel) { ?>
                <option value="<?= $nivel['id_nivel'] ?>" <?= $nivel['id_nivel'] == $cursoEditar['id_nivel'] ? 'selected' : '' ?>>
                  <?= $nivel['titulo_nivel'] ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <div class="admin-form-grupo">
            <label>Título</label>
            <input type="text" name="titulo" class="admin-input" value="<?= htmlspecialchars($cursoEditar['titulo'], ENT_QUOTES) ?>">
          </div>

          <div class="admin-form-grupo admin-form-grupo-full">
            <label>Subtítulo</label>
            <input type="text" name="subtitulo" class="admin-input" value="<?= htmlspecialchars($cursoEditar['subtitulo'], ENT_QUOTES) ?>">
          </div>

          <div class="admin-form-grupo admin-form-grupo-full">
            <label>Descripción</label>
            <textarea name="descripcion" class="admin-input" rows="4"><?= htmlspecialchars($cursoEditar['descripcion'], ENT_QUOTES) ?></textarea>
          </div>

        </div>

        <div class="admin-form-grid-imagenes">
          <div class="admin-form-grupo">
            <label>Imagen pequeña (actual: <?= $cursoEditar['img'] ?>)</label>
            <input type="file" name="img" class="admin-input" accept="image/*">
            <small>Déjalo vacío para mantener la imagen actual</small>
          </div>
          <div class="admin-form-grupo">
            <label>Imagen grande — hero (actual: <?= $cursoEditar['img_grande'] ?>)</label>
            <input type="file" name="img_grande" class="admin-input" accept="image/*">
            <small>Déjalo vacío para mantener la imagen actual</small>
          </div>
          <div class="admin-form-grupo">
            <label>Imagen kanji (actual: <?= $cursoEditar['img_kanji'] ?>)</label>
            <input type="file" name="img_kanji" class="admin-input" accept="image/*">
            <small>Déjalo vacío para mantener la imagen actual</small>
          </div>
        </div>

        <div class="admin-form-botones">
          <button type="submit" class="btn miBoton">GUARDAR CAMBIOS</button>
          <a href="admin-cursos.php" class="btn admin-btn-cancelar">CANCELAR</a>
        </div>

      </form>
    </div>
    <?php } ?>

    <!-- LISTA DE CURSOS -->
    <div class="admin-lista">
      <?php foreach ($cursos as $curso) { ?>
        <div class="admin-item">
          <div class="admin-item-img">
            <img src="img/<?= $curso['img'] ?>" alt="<?= $curso['titulo'] ?>">
          </div>
          <div class="admin-item-info">
            <span class="admin-item-nivel">
              <?= $curso['id_nivel'] == 1 ? 'Japonés Inicial' : 'Japonés Intermedio' ?>
            </span>
            <h3 class="admin-item-titulo"><?= htmlspecialchars($curso['titulo'], ENT_QUOTES) ?></h3>
            <p class="admin-item-subtitulo"><?= $curso['subtitulo'] ?></p>
          </div>
          <div class="admin-item-botones">
            <a href="admin-cursos.php?editar=<?= $curso['id_curso'] ?>" class="btn admin-btn-editar">EDITAR</a>
            <a href="admin-cursos.php?eliminar=<?= $curso['id_curso'] ?>"
               class="btn admin-btn-eliminar"
               onclick="return confirm('¿Seguro que quieres eliminar este curso?')">
               ELIMINAR
            </a>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
</section>

<?php include("footer.php"); ?>