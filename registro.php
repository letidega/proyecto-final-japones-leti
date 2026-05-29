<?php include("header.php"); ?>

<section class="registro-section">
  <div class="container">

    <h1 class="registro-titulo text-center">FORMULARIO DE REGISTRO</h1>

    <form class="registro-form" novalidate>

      <div class="registro-grupo">
        <label for="nombre">Nombre y apellido</label>
        <input type="text" id="nombre" name="nombre" class="registro-input" placeholder="Introduce tu nombre">
      </div>

      <div class="registro-grupo">
        <label for="usuario">Nombre de usuario</label>
        <input type="text" id="usuario" name="usuario" class="registro-input" placeholder="Introduce un nombre de usuario">
      </div>

      <div class="registro-grupo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" class="registro-input" placeholder="Introduce tu número de teléfono">
      </div>

      <div class="registro-grupo">
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" class="registro-input" placeholder="ejemplo@correo.com">
      </div>

      <div class="registro-grupo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="registro-input" placeholder="Contraseña">
      </div>

      <div class="registro-grupo">
        <label for="password2">Confirmar contraseña</label>
        <input type="password" id="password2" name="password2" class="registro-input" placeholder="Contraseña">
      </div>

      <div class="registro-submit text-center">
        <button type="submit" class="btn-auth">REGISTRARME</button>
      </div>

    </form>

  </div>
</section>

<?php include("footer.php"); ?>