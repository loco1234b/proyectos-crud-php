<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <style>
        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        label, input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }
        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Actualizar Usuario</h2>
    <form method="POST" action="actualizar.php">
        <label for="id">ID del Usuario:</label>
        <input type="number" name="id" id="id" required>
        
        <label for="nombres">Nuevo Nombre:</label>
        <input type="text" name="nombres" id="nombres" required>

        <label for="Email">Nuevo Email:</label>
        <input type="email" name="Email" id="Email" required>

        <input type="submit" value="Actualizar Usuario">
    </form>

    </body>
</html>