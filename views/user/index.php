<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <a href="index.php?controller=user&action=create">Crear Usuario</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nick</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id_usuario'] ?></td>
                    <td><?= $user['nick'] ?></td>
                    <td><?= $user['correo'] ?></td>
                    <td><?= $user['rol'] ?></td>
                    <td><?= $user['estado'] ?></td>
                    <td>
                        <a href="index.php?controller=user&action=edit&id_usuario=<?= $user['id_usuario'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>