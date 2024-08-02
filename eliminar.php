<?php
include_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id_nombre = $_POST['id'];

// eliminar registros
$sql = "delete from usuario WHERE id_user = $id_nombre ";

// validación proceso
if ($conexion->query($sql) === TRUE) {

    echo "Eliminación de registro exitosa";
} else {

    $conexion->error;
}
$conexion->close();
}