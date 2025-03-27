<?php
// config.php o app.php en la raíz

// Definir constantes de rutas
define('APP_ROOT', dirname(__DIR__));
define('TEMPLATES_URL', APP_ROOT . '/includes/templates');
define('IMAGES_URL', APP_ROOT . '/assets/img');

// Otras configuraciones
define('APP_INCLUDED', true);
?>