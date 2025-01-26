<?php
// Archivo principal del sistema de tickets

// Incluir el archivo de configuración
require_once 'config/db.php';

// Obtener la ruta de la solicitud
$controller = $_GET['controller'] ?? 'home'; // Por defecto, el controlador "home"
$action = $_GET['action'] ?? 'index';       // Por defecto, la acción "index"

// Construir la ruta al archivo del controlador
$controllerFile = "controllers/{$controller}_controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Llamar a la función correspondiente dentro del controlador
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