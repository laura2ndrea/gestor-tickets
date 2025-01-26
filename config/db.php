<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';         
$port = '5432';              
$dbname = 'sistema_tickets';  
$username = 'postgres';     
$password = 'root'; 
try {
    // Crear una instancia de PDO
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);

    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Configurar el modo de retorno de datos
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    // Si ocurre un error, mostrar el mensaje y salir
    die("Error de conexión: " . $e->getMessage());
}
?>