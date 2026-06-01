<?php

session_start();

require_once 'conexion.php';

// Si ya hay sesión activa redirigir a perfil
if (isset($_SESSION['id_usuario'])) {
    header('Location: mi-perfil.php');
    exit;
}

$error = '';
$exito = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Comprobar que las contraseñas coinciden
    if ($password != $password2) {
        $error = "Las contraseñas no coinciden.";

    // Comprobar que el email no existe ya
    } else {
        $consultaEmail = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
        $consultaEmail->execute([':email' => $email]);
        $emailExiste = $consultaEmail->fetch(PDO::FETCH_ASSOC);

        if ($emailExiste) {
            $error = "Este correo electrónico ya está registrado.";

        // Comprobar que el nombre de usuario no existe ya
        } else {
            $consultaUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario");
            $consultaUsuario->execute([':nombre_usuario' => $nombre_usuario]);
            $usuarioExiste = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

            if ($usuarioExiste) {
                $error = "Ese nombre de usuario ya está en uso.";

            } else {
                // Hashear contraseña e insertar usuario
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $consultaInsertar = $conexion->prepare("INSERT INTO usuarios 
                    (nombre, apellido, nombre_usuario, telefono, email, password, rol) 
                    VALUES (:nombre, :apellido, :nombre_usuario, :telefono, :email, :password, 'cliente')");
                $consultaInsertar->execute([
                    ':nombre'         => $nombre,
                    ':apellido'       => $apellido,
                    ':nombre_usuario' => $nombre_usuario,
                    ':telefono'       => $telefono,
                    ':email'          => $email,
                    ':password'       => $hash
                ]);

                $exito = "Registro completado correctamente. Ya puedes iniciar sesión.";
            }
        }
    }
}

include("header.php");
?>

<section class="registro-section">
  <div class="container">

    <h1 class="registro-titulo text-center">FORMULARIO DE REGISTRO</h1>

    <?php if ($error) { ?>
      <p class="registro-error text-center"><?= $error ?></p>
    <?php } ?>

    <?php if ($exito) { ?>
      <p class="registro-exito text-center"><?= $exito ?> <a href="login.php">Acceder aquí</a></p>
    <?php } ?>

    <form class="registro-form" method="POST" action="registro.php">

      <div class="registro-grupo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="registro-input" placeholder="Introduce tu nombre" required>
      </div>

      <div class="registro-grupo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="registro-input" placeholder="Introduce tu apellido" required>
      </div>

      <div class="registro-grupo">
        <label for="nombre_usuario">Nombre de usuario</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" class="registro-input" placeholder="Introduce un nombre de usuario" required>
      </div>

      <div class="registro-grupo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" class="registro-input" placeholder="Introduce tu número de teléfono">
      </div>

      <div class="registro-grupo">
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" class="registro-input" placeholder="ejemplo@correo.com" required>
      </div>

      <div class="registro-grupo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="registro-input" placeholder="Contraseña" required>
      </div>

      <div class="registro-grupo">
        <label for="password2">Confirmar contraseña</label>
        <input type="password" id="password2" name="password2" class="registro-input" placeholder="Repite la contraseña" required>
      </div>

      <div class="registro-submit text-center">
        <button type="submit" class="btn-auth">REGISTRARME</button>
      </div>

      <p class="text-center mt-3" style="font-family: var(--font-sans); font-size: 14px;">
        ¿Ya tienes cuenta? <a href="login.php" style="color: var(--marron-oscuro);">Inicia sesión aquí</a>
      </p>

    </form>

  </div>
</section>

<?php include("footer.php"); ?>