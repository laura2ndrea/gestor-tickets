<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="index.php?controller=user&action=create" method="POST">
        <label for="nick">Nick:</label>
        <input type="text" id="nick" name="nick" required>
        <br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        <br><br>

        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia" required>
        <br><br>

        <label for="id_estado">Estado:</label>
        <select id="id_estado" name="id_estado" required>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>
        <br><br>

        <label for="id_rol">Rol:</label>
        <select id="id_rol" name="id_rol" required>
            <option value="1">Administrador</option>
            <option value="2">Responsable de Soporte</option>
            <option value="3">Usuario</option>
        </select>
        <br><br>

        <button type="submit">Crear Usuario</button>
    </form>
    <br>
    <a href="index.php?controller=user&action=index">Volver a la lista de usuarios</a>
</body>
</html>