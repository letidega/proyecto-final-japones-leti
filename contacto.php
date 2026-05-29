<?php include("header.php"); ?>

<!-- HERO CONTACTO -->
<section class="contacto-hero d-flex">

  <div class="contacto-hero-left">
    <p class="contacto-intro">
      Si tienes alguna duda, quieres más información o no sabes por dónde empezar,
      ¡escríbeme sin compromiso! Estaré encantada de leerte y ayudarte a dar el siguiente
      paso con el japonés.
    </p>

    <form class="contacto-form" novalidate>

      <div class="contacto-form-grupo">
        <label for="nombre">Nombre *</label>
        <input type="text" id="nombre" name="nombre" class="contacto-input" placeholder="Introduce tu nombre">
      </div>

      <div class="contacto-form-grupo">
        <label for="apellido">Apellido *</label>
        <input type="text" id="apellido" name="apellido" class="contacto-input" placeholder="Introduce tu apellido">
      </div>

      <div class="contacto-form-grupo">
        <label for="telefono">Teléfono *</label>
        <input type="tel" id="telefono" name="telefono" class="contacto-input" placeholder="Introduce tu número de teléfono">
      </div>

      <div class="contacto-form-grupo">
        <label for="email">Correo Electrónico *</label>
        <input type="email" id="email" name="email" class="contacto-input" placeholder="ejemplo@correo.com">
      </div>

      <div class="contacto-form-grupo">
        <label for="mensaje">Mensaje *</label>
        <textarea id="mensaje" name="mensaje" class="contacto-input" placeholder="Escribe tu mensaje aquí"></textarea>
      </div>

      <div class="contacto-form-submit">
        <button type="submit" class="btn-contacto-enviar">ENVIAR</button>
      </div>

    </form>
  </div>

  <div class="contacto-hero-right">
    <img src="img/contacto.jpg" alt="Teléfono retro de color naranja">
  </div>

</section>

<!-- INFO CONTACTO -->
<section class="contacto-info">
  <div class="container">
    <div class="row text-center">

      <div class="col-md-4">
        <h3 class="contacto-info-titulo">T E L É F O N O</h3>
        <p class="contacto-info-dato">+34 681 29 78 66</p>
      </div>

      <div class="col-md-4">
        <h3 class="contacto-info-titulo">E M A I L</h3>
        <p class="contacto-info-dato">japonesconleti@gmail.com</p>
      </div>

      <div class="col-md-4">
        <h3 class="contacto-info-titulo">H O R A R I O</h3>
        <p class="contacto-info-dato">Lunes a viernes: 08:00 - 20:00</p>
      </div>

    </div>
  </div>
</section>

<?php include("footer.php"); ?>