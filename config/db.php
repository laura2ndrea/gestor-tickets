<?php
// Configuración de la base de datos 
$host = 'localhost'; 
$port = '5432'; 
$dbname = 'sistema_tickets'; 
$username = 'postgres'; 
$password = 'root'; 

try {
    // Instancia del PDO 
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password); 

    // Configuración del PDO para lanzar excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    // Modo de retorno de los datos
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Mensaje para comprobar que la conexión funciona
    echo "Conexión exitosa a la base de datos";  
} catch (PDOException $e) {
    
    die("Error en la conexión: " .$e->getMessage());
}
?>