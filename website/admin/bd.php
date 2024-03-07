<?php
$servidor = "localhost";
$basededatos = "website";
$usuario = "root";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
} catch (Exception $error) {
    echo $error->getMessage();
}
?>