<?php

require_once __DIR__ . '/../models/Ticket.php';

function indexAction() {
    $ticketModel = new Ticket();
    $tickets = $ticketModel->getAllTickets();
    require_once __DIR__ . '/../views/ticket/index.php'; // Renderiza la vista de lista
}

function createAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $asunto = $_POST['asunto'];
        $descripcion = $_POST['descripcion'];
        $usuario_creacion = 1; // Reemplazar con el ID del usuario autenticado

        $ticketModel = new Ticket();
        if ($ticketModel->createTicket($asunto, $descripcion, $usuario_creacion)) {
            header('Location: index.php?controller=ticket&action=index');
        } else {
            echo "Error al crear el ticket.";
        }
    } else {
        require_once __DIR__ . '/../views/ticket/create.php'; // Renderiza la vista de creación
    }
}

function editAction() {
    $ticketModel = new Ticket();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_ticket = $_POST['id_ticket'];
        $respuesta = $_POST['respuesta'];
        $usuario_respuesta = 2; // Reemplazar con el ID del usuario autenticado
        $estado = $_POST['estado'];

        if ($ticketModel->updateTicket($id_ticket, $respuesta, $usuario_respuesta, $estado)) {
            header('Location: index.php?controller=ticket&action=index');
        } else {
            echo "Error al actualizar el ticket.";
        }
    } else {
        $id_ticket = $_GET['id'];
        $ticket = $ticketModel->getTicketById($id_ticket);
        require_once __DIR__ . '/../views/ticket/edit.php'; // Renderiza la vista de edición
    }
}
?>
