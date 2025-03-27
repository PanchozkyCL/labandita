<?php
require_once __DIR__ . '/../config.php';

function conectarDB() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Error de conexión: " . $e->getMessage());
        die("Error en el sistema. Por favor intente más tarde.");
    }
}
?>