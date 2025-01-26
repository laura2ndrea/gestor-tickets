<?php
function getDBConnection() {
    try {
        $dsn = "pgsql:host=localhost;port=5432;dbname=sistema_tickets;";
        $username = "postgres";
        $password = "root";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    }
}
?>