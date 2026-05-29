<?php include("header.php"); ?>

<section class="auth-section">
  <div class="auth-bg">
    <div class="auth-card">

      <h1 class="auth-titulo">ACCEDER A MI CUENTA</h1>

      <form class="auth-form" novalidate>

        <div class="auth-grupo">
          <label for="usuario">Nombre de usuario</label>
          <input type="text" id="usuario" name="usuario" class="auth-input" placeholder="Introduce tu apellido">
        </div>

        <div class="auth-grupo">
          <label for="email">Correo Electrónico</label>
          <input type="email" id="email" name="email" class="auth-input" placeholder="ejemplo@correo.com">
        </div>

        <div class="auth-grupo">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" class="auth-input" placeholder="Contraseña">
        </div>

        <div class="auth-submit">
          <button type="submit" class="btn-auth">REGISTRARME</button>
        </div>

        <p class="auth-link text-center mt-3">
          ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
        </p>

      </form>

    </div>
  </div>
</section>

<?php include("footer.php"); ?>