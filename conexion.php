<?php

$server = "127.0.0.1:3307";
//Si estoy en mi laptop cambiar el puerto
// $server = "localhost";
$username = "root";
$password = "";
$database = "asesorame";

$conexion = new mysqli($server, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}
?>