<?php
// Configuración básica
define('APP_ROOT', dirname(__DIR__));
define('BASE_URL', 'http://localhost:8000/index.php');

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '101292');
define('DB_NAME', 'labandita_sistema');

// Configuración de reCAPTCHA
define('RECAPTCHA_SITE_KEY', '6Lfe1QErAAAAAG-zYzrMvS__45hsoRhZcU16QCvq');
define('RECAPTCHA_SECRET_KEY', '6Lfe1QErAAAAAB5nGdhHuJUu3W3Tq8L2f1qc2shq');

// Iniciar sesión
session_start();

// Configuración de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>