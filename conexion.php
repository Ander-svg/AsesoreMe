<?php
$server = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "AsesoraMe";

$conexion = new mysqli($server, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Establecer la codificación de caracteres
$conexion->set_charset("utf8mb4");

// Establecer la clave de encriptación que usarán los triggers
$conexion->query("SET @encryption_key = 'tu-clave-secreta-muy-larga-y-segura-aqui'");
?>