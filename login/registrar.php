<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="validacion_registrar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" required>
        
        <button type="submit">Registrar</button>
    </form>
</body>
</html>

