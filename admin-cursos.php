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
    $consultaInsertar = $conexion->prepare("INSERT INTO cursos (id_nivel, titulo, subtitulo, descripcion, img, precio) 
        VALUES (:id_nivel, :titulo, :subtitulo, :descripcion, :img, :precio)");
    $consultaInsertar->execute([
        ':id_nivel'    => $_POST['id_nivel'],
        ':titulo'      => $_POST['titulo'],
        ':subtitulo'   => $_POST['subtitulo'],
        ':descripcion' => $_POST['descripcion'],
        ':img'         => $_POST['img'],
        ':precio'      => $_POST['precio']
    ]);
    header('Location: admin-cursos.php');
    exit;
}

// EDITAR curso
if (isset($_POST['accion']) && $_POST['accion'] == 'editar') {
    $consultaEditar = $conexion->prepare("UPDATE cursos SET 
        id_nivel = :id_nivel,
        titulo = :titulo,
        subtitulo = :subtitulo,
        descripcion = :descripcion,
        img = :img,
        precio = :precio
        WHERE id_curso = :id_curso");
    $consultaEditar->execute([
        ':id_nivel'    => $_POST['id_nivel'],
        ':titulo'      => $_POST['titulo'],
        ':subtitulo'   => $_POST['subtitulo'],
        ':descripcion' => $_POST['descripcion'],
        ':img'         => $_POST['img'],
        ':precio'      => $_POST['precio'],
        ':id_curso'    => $_POST['id_curso']
    ]);
    header('Location: admin-cursos.php');
    exit;
}

// LISTAR cursos
$consultaCursos = $conexion->prepare("SELECT * FROM cursos ORDER BY id_nivel ASC");
$consultaCursos->execute();
$cursos = $consultaCursos->fetchAll(PDO::FETCH_ASSOC);

// LISTAR niveles para los formularios
$consultaNiveles = $conexion->prepare("SELECT * FROM niveles");
$consultaNiveles->execute();
$niveles = $consultaNiveles->fetchAll(PDO::FETCH_ASSOC);

// Si hay id en GET, cargar datos del curso a editar
$cursoEditar = null;
if (isset($_GET['editar'])) {
    $consultaEditar = $conexion->prepare("SELECT * FROM cursos WHERE id_curso = :id");
    $consultaEditar->execute([':id' => $_GET['editar']]);
    $cursoEditar = $consultaEditar->fetch(PDO::FETCH_ASSOC);
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
      <form method="POST" action="admin-cursos.php">
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
          <div class="admin-form-grupo">
            <label>Subtítulo</label>
            <input type="text" name="subtitulo" class="admin-input" placeholder="Subtítulo del curso">
          </div>
          <div class="admin-form-grupo">
            <label>Imagen (nombre del archivo)</label>
            <input type="text" name="img" class="admin-input" placeholder="curso-kaze.jpg">
          </div>
          <div class="admin-form-grupo">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="admin-input" placeholder="49.99">
          </div>
          <div class="admin-form-grupo admin-form-grupo-full">
            <label>Descripción</label>
            <textarea name="descripcion" class="admin-input" rows="4" placeholder="Descripción del curso"></textarea>
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
      <h3>Editar curso: <?= $cursoEditar['titulo'] ?></h3>
      <form method="POST" action="admin-cursos.php">
        <input type="hidden" name="accion" value="editar">
        <input type="hidden" name="id_curso" value="<?= $cursoEditar['id_curso'] ?>">
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
            <input type="text" name="titulo" class="admin-input" value="<?= $cursoEditar['titulo'] ?>">
          </div>
          <div class="admin-form-grupo">
            <label>Subtítulo</label>
            <input type="text" name="subtitulo" class="admin-input" value="<?= $cursoEditar['subtitulo'] ?>">
          </div>
          <div class="admin-form-grupo">
            <label>Imagen</label>
            <input type="text" name="img" class="admin-input" value="<?= $cursoEditar['img'] ?>">
          </div>
          <div class="admin-form-grupo">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="admin-input" value="<?= $cursoEditar['precio'] ?>">
          </div>
          <div class="admin-form-grupo admin-form-grupo-full">
            <label>Descripción</label>
            <textarea name="descripcion" class="admin-input" rows="4"><?= $cursoEditar['descripcion'] ?></textarea>
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
            <h3 class="admin-item-titulo"><?= $curso['titulo'] ?></h3>
            <p class="admin-item-subtitulo"><?= $curso['subtitulo'] ?></p>
            <p class="admin-item-precio"><?= $curso['precio'] ?>€</p>
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