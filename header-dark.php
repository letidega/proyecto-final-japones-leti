<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Japonés con Leti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>

<!-- NAVBAR DARK -->
<nav class="navbar navbar-dark-version navbar-expand-lg">
  <div class="container">

    <a class="navbar-brand" href="index.php">
      <img src="img/logotipo_rosa.png" alt="Japonés con Leti">
    </a>

    <button class="navbar-toggler navbar-toggler-dark" type="button" data-bs-toggle="collapse" data-bs-target="#menu-dark" aria-controls="menu-dark" aria-expanded="false" aria-label="Abrir menú">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu-dark">
      <ul class="navbar-nav mx-auto">

  <li class="nav-item">
    <a class="nav-link nav-link-izq" href="#">Literatura japonesa</a>
  </li>

  <li class="nav-item">
    <a class="nav-link nav-link-izq" href="#">Talleres y eventos</a>
  </li>

  <!-- DROPDOWN -->
  <li class="nav-item dropdown">
    <a class="nav-link nav-link-izq dropdown-toggle" href="cursos.php" data-bs-toggle="dropdown" aria-expanded="false">
      Cursos
    </a>
    <ul class="dropdown-menu dropdown-menu-dark-version">
      <li><a class="dropdown-item text-center" href="cursos.php">VER TODOS LOS CURSOS</a></li>
      <li class="dropdown-header">Japonés inicial</li>
      <li><a class="dropdown-item" href="curso-individual.php">Curso "Sakura" (桜)</a></li>
      <li><a class="dropdown-item" href="curso-individual.php">Curso "Kaze" (風)</a></li>
      <li><a class="dropdown-item" href="curso-individual.php">Curso "Hikari" (光)</a></li>
      <li><hr class="dropdown-divider"></li>
      <li class="dropdown-header">Japonés intermedio</li>
      <li><a class="dropdown-item" href="curso-individual.php">Curso "Michi" (道)</a></li>
      <li><a class="dropdown-item" href="curso-individual.php">Curso "Musubu" (結)</a></li>
      <li><a class="dropdown-item" href="curso-individual.php">Curso "Fukai" (深い)</a></li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link nav-link-der" href="#">Blog</a>
  </li>

  <li class="nav-item">
    <a class="nav-link nav-link-der" href="sobre-mi.php">Sobre nosotros</a>
  </li>

  <li class="nav-item">
    <a class="nav-link nav-link-der" href="#">Contacto</a>
  </li>

</ul>

      <div class="navbar-icons ms-auto d-flex align-items-center gap-3">
        <i class="fa-solid fa-user navbar-icon-dark"></i>
        <i class="fa-solid fa-magnifying-glass navbar-icon-dark"></i>
    </div>

  </div>
</nav>