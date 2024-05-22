<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="build/css/estilos.css">
</head>
<header>
</header>
<body>
<div class="container">
        <h1>Bienvenido a nuestra Página de Inicio</h1>
        <p>Por favor, inicia sesión para acceder.</p>
        <form action="/mostrar" method="POST">
            <input type="text" name="username" placeholder="Nombre de usuario" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit" class="btn">Iniciar sesión</button>
        </form>
    </div>
<footer>
    <h4>Lizeth Tafoya & Sebastián Venegas</h4>
</footer>
</body>
</html>
