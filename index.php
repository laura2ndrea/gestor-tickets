<?php
// Se incluye el archivo de configuración 
require_once 'config/db.ph';

// Para obtener la ruta de la solicitud 
$controller = $_GET['controller'] ?? 'home'; 
$action = $_GET['action'] ?? 'index'; 

// Construcción de la ruta al archivo del controlador 
$controllerFile = 'controllers/{$controller}_controller.php'; 

if(file_exists($controllerFile)) {
    require_once $controllerFile; 

    // Se llama a la función correspondiente dentro del controlador 
    $function = "{$action}Action"; 
    if (function_exists($function)) {
        $function(); 
    } else {
        echo "Acción no encontrada: {$action}"; 
    }
} else {
    echo "Controlador no encontrado: {$controller}"; 
}
?>

