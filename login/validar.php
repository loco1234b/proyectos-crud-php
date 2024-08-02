<?php
session_start(); // Iniciar la sesión (si no está iniciada)

$dsn = 'mysql:host=localhost;dbname=login';
$username = 'root';
$password = '';

try {
    $conexion = new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para verificar las credenciales
    $sql = "select * FROM usuario1 WHERE email = :email AND contraseña = :password";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Comprobar si se encontró un usuario con las credenciales
    if ($stmt->rowCount() === 1) {
        // Inicio de sesión exitoso, redireccionar al usuario a la página principal
        $_SESSION['email'] = $email; // Almacenar el correo electrónico en la sesión
        header("Location: bienvenida.php");
        exit();
    } else {
         echo 'error'; // Enviar respuesta de error a AJAX
         exit;
   }
}
