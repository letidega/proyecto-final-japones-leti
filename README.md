# Japonés con Leti

Academia de japonés online desarrollada como proyecto del Curso Superior de Diseño y Desarrollo Web de Escuela Arte Granada.

## Tecnologías

- PHP + PDO
- MySQL / MariaDB
- Bootstrap 5.3
- CSS personalizado + JavaScript vanilla

## Qué incluye

- Diseño responsive con sistema de diseño propio (variables CSS, tipografías, paleta de colores)
- Base de datos relacional con cursos, lecciones, vocabulario, gramática, ejercicios, audio, cultura, libros y blog
- CRUD completo de cursos desde el panel de administración
- Sistema de login y registro con sesiones, cookies de "recuérdame" y contraseñas hasheadas
- Aula virtual para alumnos con acceso a sus cursos inscritos
- Lecciones interactivas con tabs y ejercicios autocorregibles
- Páginas públicas: inicio, cursos, curso individual, sobre mí, contacto, literatura japonesa y blog

## Base de datos

Nombre: `japones_leti`

Importa el archivo `.sql` desde phpMyAdmin antes de ejecutar el proyecto.

## Instalación

1. Copia la carpeta `japones_con_leti/` en `xampp/htdocs/`
2. Importa la base de datos en phpMyAdmin
3. Accede a `http://localhost/japones_con_leti/`

## Credenciales admin

| Campo    | Valor                         |
|----------|-------------------------------|
| Email    |  admin@japonesconleti.com     |
| Password |  admin123                     |

Acceso al panel: `http://localhost/japones_con_leti/admin-cursos.php`
