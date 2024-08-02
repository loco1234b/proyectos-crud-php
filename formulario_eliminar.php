<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
</head>
<body>
    <h2>Eliminar Usuario</h2>
    <form action="eliminar.php" method="POST">
        <label for="id">ID del Usuario:</label><br>
        <input type="number" id="id" name="id" required><br><br>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>