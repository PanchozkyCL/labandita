<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('localhost', 'root', '101292', 'la_bandita');
    $db->set_charset('utf8');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 
    return $db;
}