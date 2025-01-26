<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="index.php?controller=user&action=edit" method="POST">
        <input type="hidden" name="id_usuario" value="<?= $user['id_usuario'] ?>">

        <label for="nick">Nick:</label>
        <input type="text" id="nick" name="nick" value="<?= $user['nick'] ?>" required>
        <br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?= $user['correo'] ?>" required>
        <br><br>

        <label for="id_estado">Estado:</label>
        <select id="id_estado" name="id_estado" required>
            <option value="1" <?= $user['id_estado'] == 1 ? 'selected' : '' ?>>Activo</option>
            <option value="2" <?= $user['id_estado'] == 2 ? 'selected' : '' ?>>Inactivo</option>
        </select>
        <br><br>

        <label for="id_rol">Rol:</label>
        <select id="id_rol" name="id_rol" required>
            <option value="1" <?= $user['id_rol'] == 1 ? 'selected' : '' ?>>Administrador</option>
            <option value="2" <?= $user['id_rol'] == 2 ? 'selected' : '' ?>>Responsable de Soporte</option>
            <option value="3" <?= $user['id_rol'] == 3 ? 'selected' : '' ?>>Usuario</option>
        </select>
        <br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
    <br>
    <a href="index.php?controller=user&action=index">Volver a la lista de usuarios</a>
</body>
</html>