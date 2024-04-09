<?php

spl_autoload_register(function ($class) {
    // $class = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class . '.php';

    // var_dump($class . " | " . $file);
    
    if (file_exists($file)) {
        include $file;
    }
});

$url = isset($_GET['url']) ? $_GET['url'] : 'Home';
$urlParts = explode('/', $url);

$controllerName = 'Controllers\\'.ucfirst($urlParts[0]).'Controller';
$action = isset($urlParts[1]) ? $urlParts[1] : 'index';

$val = array_slice($urlParts, 2);

if (class_exists($controllerName)) {
    $controller = new $controllerName;
    if (method_exists($controller, $action)) {
        $controller->$action(...($val));
    } else {
        include("View\Home.php");    
    }
} else {
    include("View\Error.php");
}