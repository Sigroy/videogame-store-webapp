<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/nav.php';
require_once 'views/layout/sidebar.php';

function mostrarError()
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = DEFAULT_CONTROLLER;
} else {
    mostrarError();
    exit;
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = DEFAULT_ACTION;
        $controlador->$action_default();
    } else {
        mostrarError();
    }
} else {
    mostrarError();
}

require_once 'views/layout/footer.php';

ob_end_flush();