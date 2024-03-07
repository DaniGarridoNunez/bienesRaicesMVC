<?php

define('FUNCIONES_URL', __DIR__ . "/funciones.php");
define('TEMPLATES_URL', __DIR__ . "/templates");


function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() : bool {
    session_start();

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    
    if(!$_SESSION['login']) {
        header('Location: /');
    } 

    return true;
}

function debug($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';

    exit;
}