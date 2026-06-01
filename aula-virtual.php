<?php
session_start();
require_once 'conexion.php';

// Acceso restringido
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Datos del usuario
$consultaUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
$consultaUsuario->execute([':id_usuario' => $id_usuario]);
$usuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

// Cursos del usuario
$consultaCursos = $conexion->prepare("SELECT cursos.* FROM cursos JOIN usuarios_cursos ON cursos.id_curso = usuarios_cursos.id_curso WHERE usuarios_cursos.id_usuario = :id_usuario");
$consultaCursos->execute([':id_usuario' => $id_usuario]);
$misCursos = $consultaCursos->fetchAll(PDO::FETCH_ASSOC);

// Primera lección del primer curso (curso actual)
$cursoPrincipal = !empty($misCursos) ? $misCursos[0] : null;
$proximaLeccion = null;

if ($cursoPrincipal) {
    $consultaLeccion = $conexion->prepare("SELECT * FROM lecciones WHERE id_curso = :id_curso ORDER BY numero_leccion ASC LIMIT 1");
    $consultaLeccion->execute([':id_curso' => $cursoPrincipal['id_curso']]);
    $proximaLeccion = $consultaLeccion->fetch(PDO::FETCH_ASSOC);
}

include("header.php");
?>

<section class="aula-section">
  <div class="container">

    <h1 class="aula-titulo text-center">AULA VIRTUAL</h1>

    <div class="aula-inner">

      <!-- SIDEBAR -->
      <aside class="aula-sidebar">
        <p class="aula-sidebar-header">Panel de usuario</p>
        <ul class="aula-sidebar-menu">
          <li>
            <a href="#mis-cursos" class="aula-sidebar-link active">Mis cursos</a>
          </li>
          <li>
            <a href="#estadisticas" class="aula-sidebar-link">Estadísticas</a>
          </li>
          <li>
            <a href="#logros" class="aula-sidebar-link">Logros</a>
          </li>
          <li>
            <a href="#soporte" class="aula-sidebar-link">Soporte</a>
          </li>
        </ul>
      </aside>

      <!-- CONTENIDO PRINCIPAL -->
      <div class="aula-contenido">

        <p class="aula-bienvenida">
          Bienvenido/a, <strong><?= $usuario['nombre'] ?></strong>. Aquí tienes un resumen de tu actividad:
        </p>

        <!-- CURSO ACTUAL -->
        <?php if ($cursoPrincipal) { ?>
          <div class="aula-curso-actual">
            <p class="aula-curso-actual-label">Curso actual:</p>

            <div class="aula-curso-card">
              <img src="img/<?= $cursoPrincipal['img'] ?>" alt="<?= $cursoPrincipal['titulo'] ?>" class="aula-curso-img">
              <p class="aula-curso-nivel">
                <?= $cursoPrincipal['id_nivel'] == 1 ? 'JAPONÉS INICIAL' : 'JAPONÉS INTERMEDIO' ?>
              </p>
              <p class="aula-curso-titulo"><?= $cursoPrincipal['titulo'] ?></p>
            </div>

            <!-- BARRA DE PROGRESO -->
            <div class="aula-progreso">
              <div class="aula-progreso-header">
                <span>Progreso</span>
                <span>55%</span>
              </div>
              <div class="aula-progreso-barra">
                <div class="aula-progreso-fill" style="width: 55%"></div>
              </div>
            </div>

            <!-- PRÓXIMA LECCIÓN -->
            <?php if ($proximaLeccion) { ?>
              <p class="aula-proxima">
                *Próximo objetivo:
                <a href="leccion.php?id=<?= $proximaLeccion['id_leccion'] ?>">
                  <?= $proximaLeccion['titulo'] ?>
                </a>*
              </p>
            <?php } ?>

          </div>
        <?php } else { ?>
          <div class="aula-sin-cursos">
            <p>Todavía no tienes ningún curso. ¡Empieza explorando nuestros cursos!</p>
            <a href="cursos.php" class="btn miBoton mt-3">VER CURSOS</a>
          </div>
        <?php } ?>

        <!-- MIS CURSOS -->
        <div id="mis-cursos" class="aula-mis-cursos mt-5">
          <h2 class="aula-seccion-titulo">Mis cursos</h2>
          <div class="row g-4 mt-2">
            <?php foreach ($misCursos as $curso) { ?>

            <div class="col-md-6">
            <div class="aula-mis-cursos-card">
                <img src="img/<?= $curso['img'] ?>" alt="<?= $curso['titulo'] ?>" class="aula-mis-cursos-img">
                <div class="aula-mis-cursos-info">
                <p class="aula-curso-nivel">
                    <?= $curso['id_nivel'] == 1 ? 'JAPONÉS INICIAL' : 'JAPONÉS INTERMEDIO' ?>
                </p>
                <p class="aula-curso-titulo"><?= $curso['titulo'] ?></p>
                <a href="leccion.php?id=1" class="btn miBoton mt-2">VER CURSO</a>
                </div>
            </div>
            </div>

            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>