<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuario</title>
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
        .btnactualiza {
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
        }
        .btnactualiza:hover {
            background-color: #0056b3;
        }
        .search-form {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Buscar Usuario</h2>
    <div class="search-form">
        <form action="buscar.php" method="GET">
            <label for="search">Buscar por ID o Nombre:</label><br>
            <input type="text" id="search" name="search" required><br><br>
            <input type="submit" value="Buscar">
        </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php
        include_once('conexion.php');

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        if ($search != '') {
            $sql = "SELECT * FROM usuario WHERE id_user LIKE '%$search%' OR nombres LIKE '%$search%'";
        } else {
            $sql = "SELECT * FROM usuario";
        }

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
    <a href="buscar.php">
        <button class='btnactualiza'>Actualizar lista</button>
    </a>
</body>
</html>
