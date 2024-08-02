<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Lista de Usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>email</th>
        </tr>
        <?php
        include_once('conexion.php');

        $sql = "select * FROM usuario";
        $resultado = $conexion->query($sql);

        // Validación para mostrar los datos
        if ($resultado->num_rows > 0) {
            // Hay información que mostrar
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_user"] . "</td>";
                echo "<td>" . $row["nombres"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align: center;'>Sin información ingresada aún</td></tr>";
        }

        $conexion->close();
        ?>
    </table>
    <a href="listar.php">
    <button class='btnactualiza'>actualizar lista</button></a>

    <h2>Registro de Usuario</h2>
    <form action="insertar.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>