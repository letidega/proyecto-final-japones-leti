<?php

session_start();

include("header.php");

require_once 'conexion.php';

// Temporal hasta tener el login funcionando
$id_usuario = 1;

// Datos del usuario
$consultaUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
$consultaUsuario->execute([':id_usuario' => $id_usuario]);
$usuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

// Cursos del usuario
$consultaCursos = $conexion->prepare("SELECT * FROM usuarios_cursos WHERE id_usuario = :id_usuario");
$consultaCursos->execute([':id_usuario' => $id_usuario]);
$cursos = $consultaCursos->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="perfil-section">
  <div class="container">

    <h1 class="perfil-titulo text-center">MI PERFIL</h1>

    <!-- TARJETA DE PERFIL -->
    <div class="perfil-card">
      <div class="perfil-card-inner">

        <div class="perfil-foto">
          <img src="img/<?= $usuario['foto'] ?>" alt="Foto de perfil">
        </div>

        <div class="perfil-datos">
          <div class="perfil-dato">
            <span class="perfil-dato-label">NOMBRE:</span>
            <span class="perfil-dato-valor"><?= $usuario['nombre'] ?></span>
          </div>
          <div class="perfil-dato">
            <span class="perfil-dato-label">APELLIDO:</span>
            <span class="perfil-dato-valor"><?= $usuario['apellido'] ?></span>
          </div>
          <div class="perfil-dato">
            <span class="perfil-dato-label">CORREO ELECTRÓNICO:</span>
            <span class="perfil-dato-valor"><?= $usuario['email'] ?></span>
          </div>
          <div class="perfil-dato">
            <span class="perfil-dato-label">TELÉFONO:</span>
            <span class="perfil-dato-valor"><?= $usuario['telefono'] ?></span>
          </div>
          <a href="editar-perfil.php" class="perfil-editar">Editar datos</a>
        </div>

      </div>

      <div class="perfil-suscripcion">
        <p class="perfil-suscripcion-label">MI SUSCRIPCIÓN</p>
        <p class="perfil-suscripcion-texto">
          Actualmente estás disfrutando de la suscripción gratuita de Japonés con Leti.
          Si deseas obtener recursos adicionales, contenido exclusivo y seguimiento personalizado,
          puedes actualizar en cualquier momento suscribiéndote a uno de nuestros
          <a href="#" class="perfil-planes-link">planes premium.</a>
        </p>
        <div class="text-center mt-4">
          <a href="aula-virtual.php" class="btn miBoton">ACCEDER A MI AULA</a>
        </div>
      </div>

    </div>

    <!-- CALENDARIO -->
    <h2 class="perfil-calendario-titulo text-center">MI CALENDARIO</h2>

    <div class="perfil-calendario">
      <button class="cal-flecha cal-flecha-izq" aria-label="Mes anterior">&#8249;</button>

      <div class="cal-inner">
        <div class="cal-mes-header">
          <span id="cal-mes-titulo"></span>
        </div>
        <div class="cal-dias-semana">
          <span>L</span><span>M</span><span>X</span><span>J</span>
          <span>V</span><span>S</span><span>D</span>
        </div>
        <div class="cal-dias" id="cal-dias"></div>
      </div>

      <button class="cal-flecha cal-flecha-der" aria-label="Mes siguiente">&#8250;</button>
    </div>

  </div>
</section>

<?php include("footer.php"); ?>