<?php
require_once __DIR__ . '/conexion.php';

// Función para incluir templates
function incluirTemplate($nombre, $datos = []) {
    $archivo = __DIR__ . "/templates/{$nombre}.php";
    
    if (!file_exists($archivo)) {
        die("Template no encontrado: {$nombre}");
    }
    
    extract($datos);
    include $archivo;
}

// Función para sanitizar entradas
function sanitizar($dato) {
    if (is_array($dato)) {
        return array_map('sanitizar', $dato);
    }
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

// Función para redireccionar con mensajes
function redirigir($url, $mensaje = null, $tipo = 'success') {
    if ($mensaje !== null) {
        $_SESSION['mensaje'] = [
            'texto' => $mensaje,
            'tipo' => $tipo
        ];
    }
    header("Location: {$url}");
    exit();
}

// Más funciones esenciales...
?>