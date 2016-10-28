<?php
require_once "conf.inc.php";
require_once "functions.php";

function autoloader($class) {
    $class = strtolower($class);
    //Vérifier s'il existe dans le dossier
    //core un fichier du nom de $class.class.php
    //Si oui alors include
    if (file_exists("core/" . $class . ".class.php")) {
        include DIRECTORY_URL."core/" . $class . ".class.php";
    } else if (file_exists("models/" . $class . ".class.php")) {
        include DIRECTORY_URL."models/" . $class . ".class.php";
    }
}

spl_autoload_register('autoloader');

$route = routing::setRouting();
$name_controller = $route["c"] . "Controller";
$path_controller = "controllers/" . $name_controller . ".class.php";
if (file_exists($path_controller)) {

    include $path_controller;
    $controller = new $name_controller;

    $name_action = $route["a"] . "Action";
    if (method_exists($controller, $name_action)) {

        $controller->$name_action($route["args"]);
    } else {
        die("404, l'action n'existe pas");
    }
} else {
    die("404, le controller n'existe pas");
}







