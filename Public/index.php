<?php

require_once '../vendor/autoload.php';
require_once '../Controllers/TrajetController.php';
require_once '../Controllers/UsersController.php';

require_once '../Database/database.php';

$router = new \Buki\Router\Router();

$router->get('/', function() {
    $controller = new TrajetController();
    $controller->index();
});

$router->get('/users', function() {
    $controller = new UsersController();
    $controller->index();
});






ini_set('display_errors', 1);
error_reporting(E_ALL);

$router->run();