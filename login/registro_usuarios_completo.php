<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "tu_base_de_datos"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el correo ya existe
$email = $_POST['email'];
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "El correo ya está registrado.";
} else {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];
    $talla = $_POST['talla'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Hash de la contraseña

    // Manejar la foto de perfil
    $foto_perfil = $_FILES['foto_perfil']['tmp_name'];
    $foto_perfil_contenido = addslashes(file_get_contents($foto_perfil));

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, fecha_nacimiento, sexo, talla, contraseña, foto_perfil) VALUES ('$nombre', '$apellidos', '$email', '$fecha_nacimiento', '$sexo', '$talla', '$contraseña', '$foto_perfil_contenido')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>