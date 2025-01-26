<?php
// Modelo para la tabla "usuario"
require_once 'config/db.php';

class User {
    private $db;

    public function __construct() {
        $this->db = getDBConnection();
    }

    // Obtener todos los usuarios
    public function getAllUsers() {
        $sql = "SELECT u.id_usuario, u.nick, u.correo, r.descripcion AS rol, e.descripcion AS estado 
                FROM usuario u
                JOIN usuario_rol r ON u.id_rol = r.id_usuario_rol
                JOIN usuario_estado e ON u.id_estado = e.id_usuario_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM usuario WHERE id_usuario = :id";
        $stmt = $this->db->prepare($query); // Prepara la consulta
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Vincula el parámetro
        $stmt->execute(); // Ejecuta la consulta
        return $stmt->fetch(); // Devuelve el usuario como un array asociativo
    }

    // Insertar un nuevo usuario
    public function createUser($nick, $correo, $contrasenia, $id_estado, $id_rol) {
        $sql = "INSERT INTO usuario (nick, correo, contrasenia, id_estado, id_rol)
                VALUES (:nick, :correo, :contrasenia, :id_estado, :id_rol)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nick' => $nick,
            ':correo' => $correo,
            ':contrasenia' => password_hash($contrasenia, PASSWORD_BCRYPT), // Hasheamos la contraseña
            ':id_estado' => $id_estado,
            ':id_rol' => $id_rol,
        ]);
    }

    // Actualizar un usuario
    public function updateUser($id_usuario, $nick, $correo, $id_estado, $id_rol) {
        $sql = "UPDATE usuario 
                SET nick = :nick, correo = :correo, id_estado = :id_estado, id_rol = :id_rol
                WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_usuario' => $id_usuario,
            ':nick' => $nick,
            ':correo' => $correo,
            ':id_estado' => $id_estado,
            ':id_rol' => $id_rol,
        ]);
    }

    // Cambiar el estado de un usuario
    public function changeUserState($id_usuario, $id_estado) {
        $sql = "UPDATE usuario 
                SET id_estado = :id_estado
                WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_usuario' => $id_usuario,
            ':id_estado' => $id_estado,
        ]);
    }
}
?>