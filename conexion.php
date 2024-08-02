<?php
$servidor   = 'localhost'; // nombre de servidor
$usuario    = 'root'; // nombre de usuario
$contrasena = ''; // contraseña se es q hay o no
$bd = 'crud_php'; // nombre de base de datos

// se crea la conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

// se valida la conexión

if ($conexion->connect_error) {

    die('Hubo un fallo en la conexión ' . $conexion->connect_error);
}
else {
    echo "conexion valida"; // imprimir mensaje
}