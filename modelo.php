<?php
// Conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bbdd_barcos";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
