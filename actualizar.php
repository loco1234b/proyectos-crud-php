<?php
    include_once('conexion.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $Email = $_POST['Email'];

        // Actualizar registros
        $sql = "UPDATE usuario SET nombres = '$nombres', Email = '$Email' WHERE id_user = $id";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro actualizado correctamente";
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }

        $conexion->close();
    }
    ?>