<?php
// Conectar a la base de datos
$servername = "localhost"; // Cambia si es necesario
$username = "root"; // Cambia por tu usuario de SQL Server
$password = ""; // Cambia por tu contraseña si es necesario
$dbname = "login"; // Cambia por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Hashear la contraseña para almacenarla de forma segura
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    // Preparar la consulta para insertar el usuario
    $sql = "INSERT INTO usuario1 (nombre, apellidos, email, contraseña)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $apellidos, $email, $contraseña_hash);

    // Ejecutar la consulta y verificar si se insertó correctamente
    if ($stmt->execute()) {
        echo "Registro exitoso. Puedes iniciar sesión ahora.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>