<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$exito = '';
$error = '';

// PROCESAR FORMULARIO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Comprobar si el email ya existe en otro usuario
    $consultaEmail = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email AND id_usuario != :id_usuario");
    $consultaEmail->execute([':email' => $email, ':id_usuario' => $id_usuario]);
    $emailExiste = $consultaEmail->fetch(PDO::FETCH_ASSOC);

    if ($emailExiste) {
        $error = "Ese correo electrónico ya está en uso por otro usuario.";
    } else {

        // Si ha introducido nueva contraseña
        if (!empty($_POST['password'])) {

            if ($_POST['password'] != $_POST['password2']) {
                $error = "Las contraseñas no coinciden.";
            } else {
                $nuevaPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $consultaUpdate = $conexion->prepare("UPDATE usuarios SET 
                    nombre = :nombre,
                    apellido = :apellido,
                    telefono = :telefono,
                    email = :email,
                    password = :password
                    WHERE id_usuario = :id_usuario");
                $consultaUpdate->execute([
                    ':nombre'     => $nombre,
                    ':apellido'   => $apellido,
                    ':telefono'   => $telefono,
                    ':email'      => $email,
                    ':password'   => $nuevaPass,
                    ':id_usuario' => $id_usuario
                ]);
                $_SESSION['nombre'] = $nombre;
                $exito = "Datos actualizados correctamente.";
            }

        } else {
            // Sin cambio de contraseña
            $consultaUpdate = $conexion->prepare("UPDATE usuarios SET 
                nombre = :nombre,
                apellido = :apellido,
                telefono = :telefono,
                email = :email
                WHERE id_usuario = :id_usuario");
            $consultaUpdate->execute([
                ':nombre'     => $nombre,
                ':apellido'   => $apellido,
                ':telefono'   => $telefono,
                ':email'      => $email,
                ':id_usuario' => $id_usuario
            ]);
            $_SESSION['nombre'] = $nombre;
            $exito = "Datos actualizados correctamente.";
        }
    }
}

// Cargar datos actuales del usuario
$consultaUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
$consultaUsuario->execute([':id_usuario' => $id_usuario]);
$usuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

include("header.php");
?>

<section class="editar-perfil-section">
  <div class="container">

    <h1 class="perfil-titulo text-center">EDITAR PERFIL</h1>

    <?php if ($exito) { ?>
      <p class="editar-perfil-exito text-center"><?= $exito ?></p>
    <?php } ?>

    <?php if ($error) { ?>
      <p class="editar-perfil-error text-center"><?= $error ?></p>
    <?php } ?>

    <div class="editar-perfil-card">
      <form method="POST" action="editar-perfil.php">

        <h3 class="editar-perfil-subtitulo">Datos personales</h3>

        <div class="editar-perfil-grid">

          <div class="editar-perfil-grupo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="editar-perfil-input" value="<?= $usuario['nombre'] ?>">
          </div>

          <div class="editar-perfil-grupo">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="editar-perfil-input" value="<?= $usuario['apellido'] ?>">
          </div>

          <div class="editar-perfil-grupo">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" class="editar-perfil-input" value="<?= $usuario['telefono'] ?>">
          </div>

          <div class="editar-perfil-grupo">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="editar-perfil-input" value="<?= $usuario['email'] ?>">
          </div>

        </div>

        <h3 class="editar-perfil-subtitulo mt-4">Cambiar contraseña <span>(déjalo vacío si no quieres cambiarla)</span></h3>

        <div class="editar-perfil-grid">

          <div class="editar-perfil-grupo">
            <label for="password">Nueva contraseña</label>
            <input type="password" id="password" name="password" class="editar-perfil-input" placeholder="Nueva contraseña">
          </div>

          <div class="editar-perfil-grupo">
            <label for="password2">Confirmar contraseña</label>
            <input type="password" id="password2" name="password2" class="editar-perfil-input" placeholder="Repite la contraseña">
          </div>

        </div>

        <div class="editar-perfil-botones">
          <button type="submit" class="btn miBoton">GUARDAR CAMBIOS</button>
          <a href="mi-perfil.php" class="btn editar-perfil-cancelar">CANCELAR</a>
        </div>

      </form>
    </div>

  </div>
</section>

<?php include("footer.php"); ?>