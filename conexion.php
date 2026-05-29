<?php

// CONFIGURACIÓN 

define('DB_HOST', 'localhost');
define('DB_NAME', 'japones_leti');
define('DB_USER', 'root');
define('DB_PASS', '');

// CONEXIÓN

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

try{
    $conexion = new PDO($dsn, DB_USER, DB_PASS);
    echo "Hemos conectado";
} catch(PDOException $e){
    echo "Conexión fallida: " . $e->getMessage();
}

?>
