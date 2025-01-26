<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tickets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Listado de Tickets</h2>
    <a href="index.php?controller=ticket&action=create" class="btn btn-primary mb-3">Crear Ticket</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Asunto</th>
            <th>Descripción</th>
            <th>Creado por</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?php echo $ticket['id_ticket']; ?></td>
                <td><?php echo htmlspecialchars($ticket['asunto']); ?></td>
                <td><?php echo htmlspecialchars($ticket['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($ticket['usuario_creacion']); ?></td>
                <td><?php echo htmlspecialchars($ticket['estado']); ?></td>
                <td>
                    <a href="index.php?controller=ticket&action=edit&id=<?php echo $ticket['id_ticket']; ?>" class="btn btn-warning">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
