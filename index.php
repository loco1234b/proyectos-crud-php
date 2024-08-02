<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación Moderna</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">MiSitio</div>
        <ul class="nav-links">
            <li><a href="#">Inicio</a></li>
            <li><a href="buscar.php">buscar</a></li>
            <li><a href="listar.php">mostrar y agregar usuarios</a></li>
            <li><a href="formulario_eliminar.php">eliminar usuario</a></li>
            <li><a href="formulario_actualizar.php">actualizar</a></li>
        </ul>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        mobileMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>
