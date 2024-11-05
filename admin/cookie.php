<?php
// Verifica si la sesión no ha sido iniciada ya
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión
}

// Define el tiempo máximo de inactividad en segundos
$inactive = 6000;

// Verifica si existe una sesión y su tiempo de inactividad
if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    
    // Si el tiempo transcurrido excede el tiempo de inactividad permitido
    if ($session_life > $inactive) {
        // Destruir la sesión
        session_unset();
        session_destroy();
        
        // Redirigir al usuario al login o página de inicio
        header("Location: index.php");
        exit();
    }
}

// Actualizar el tiempo de inicio de la sesión
$_SESSION['timeout'] = time();
?>