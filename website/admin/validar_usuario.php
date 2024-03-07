<?php
include("./bd.php");

$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

// Obtiene el usuario enviado desde la solicitud Fetch
$usuario = $_POST['usuario'];

// Realiza la consulta SQL para verificar si el usuario existe
$query = "SELECT * FROM usuarios WHERE nombre = :usuario";
$statement = $conexion->prepare($query);
$statement->bindParam(':usuario', $usuario);
$statement->execute();
$usuarioEncontrado = $statement->fetch();

if ($usuarioEncontrado) {
    // El usuario existe
    echo "Usuario encontrado";
} else {
    // El usuario no existe
    echo "Usuario no encontrado";
}
?>