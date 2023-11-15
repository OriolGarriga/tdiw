<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sessió</title>
</head>
<body>

<form action="mvc/controller/IniciarSesion.php" method="post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br>

    <label for="password">Contrasenya:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Iniciar Sesión</button>
</form>

</body>
</html>
