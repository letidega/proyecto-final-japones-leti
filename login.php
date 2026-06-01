<?php
session_start();
require_once 'conexion.php';

// Si ya hay sesión activa redirigir a perfil
if (isset($_SESSION['id_usuario'])) {
    header('Location: mi-perfil.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $consultaLogin = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
    $consultaLogin->execute([':email' => $email]);
    $usuario = $consultaLogin->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        // Cookie de recuérdame — dura 30 días
        if (isset($_POST['recordarme'])) {
            setcookie('recordarme_email', $email, time() + (30 * 24 * 60 * 60), '/');
        }

        header('Location: mi-perfil.php');
        exit;
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}

include("header.php");
?>

<section class="auth-section">
  <div class="auth-bg">
    <div class="auth-card">

      <h1 class="auth-titulo">ACCEDER A MI CUENTA</h1>

      <?php if (isset($error)) { ?>
        <p class="auth-error"><?= $error ?></p>
      <?php } ?>

      <form class="auth-form" method="POST" action="login.php">

        <div class="auth-grupo">
          <label for="email">Correo Electrónico</label>
          <input type="email" id="email" name="email" class="auth-input"
            placeholder="ejemplo@correo.com"
            value="<?= isset($_COOKIE['recordarme_email']) ? $_COOKIE['recordarme_email'] : '' ?>">
        </div>

        <div class="auth-grupo">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" class="auth-input" placeholder="Contraseña">
        </div>

        <div class="auth-grupo-check">
          <input type="checkbox" id="recordarme" name="recordarme">
          <label for="recordarme">Recuérdame</label>
        </div>

        <div class="auth-submit">
          <button type="submit" class="btn-auth">ACCEDER</button>
        </div>

        <p class="auth-link text-center mt-3">
          ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
        </p>

      </form>

    </div>
  </div>
</section>

<?php include("footer.php"); ?>