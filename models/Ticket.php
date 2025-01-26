<?php

class Ticket {
    private $db;

    public function __construct() {
        $this->db = getDBConnection(); // Conexión a la base de datos
    }

    // Método para obtener todos los tickets
    public function getAllTickets() {
        $query = "SELECT t.id_ticket, t.asunto, t.descripcion, 
                         u.nick AS usuario_creacion, 
                         t.fecha_creacion, t.respuesta, 
                         r.nick AS usuario_respuesta, 
                         t.fecha_respuesta, e.descripcion AS estado
                  FROM ticket t
                  JOIN usuario u ON t.usuario_creacion = u.id_usuario
                  LEFT JOIN usuario r ON t.usuario_respuesta = r.id_usuario
                  JOIN estado_ticket e ON t.id_estado_ticket = e.id_estado_ticket";
        $stmt = $this->db->query($query); // Ejecuta la consulta
        return $stmt->fetchAll(); // Devuelve todos los registros
    }

    // Método para crear un nuevo ticket
    public function createTicket($asunto, $descripcion, $usuario_creacion) {
        $query = "INSERT INTO ticket (asunto, descripcion, usuario_creacion, fecha_creacion, id_estado_ticket) 
                  VALUES (:asunto, :descripcion, :usuario_creacion, NOW(), 1)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':usuario_creacion', $usuario_creacion, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Método para actualizar un ticket
    public function updateTicket($id_ticket, $respuesta, $usuario_respuesta, $estado) {
        $query = "UPDATE ticket 
                  SET respuesta = :respuesta, 
                      usuario_respuesta = :usuario_respuesta, 
                      fecha_respuesta = NOW(), 
                      id_estado_ticket = :estado
                  WHERE id_ticket = :id_ticket";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':respuesta', $respuesta);
        $stmt->bindParam(':usuario_respuesta', $usuario_respuesta, PDO::PARAM_INT);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Método para obtener un ticket por su ID
    public function getTicketById($id_ticket) {
        $query = "SELECT * FROM ticket WHERE id_ticket = :id_ticket";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>
