<?php
include_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

$sql = "insert into usuario (nombres,email) VALUES('$nombre','$email');";

if ($conexion->query($sql) === TRUE) {
    echo "Registro ingresado correctamente.";
} else {
    echo $conexion->error;
}
$conexion->close();
}