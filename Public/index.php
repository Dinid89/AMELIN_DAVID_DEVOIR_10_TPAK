<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';

require_once '../Controllers/TrajetController.php';
require_once '../Controllers/UsersController.php';
require_once '../Controllers/AgencesController.php';
require_once '../Controllers/ListTrajetController.php';
require_once '../Controllers/LoginController.php';

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

$router->get('/agences', function() {
    $controller = new AgencesController();
    $controller->index();
});

$router->get('/trajets', function() {
    $controller = new ListTrajetController();
    $controller->listTrajets();
});

$router->get('/login', function() {
    $controller = new LoginController();
    $controller->showForm();
});

$router->post('/login', function() {
    $controller = new LoginController();
    $controller->login();
});

$router->get('/Home', function() {
    $controller = new TrajetController();
    $controller->index();
});

$router->get('/logout', function() {
    session_start();
    session_destroy();
    header('Location: /');
    exit();
});

$router->run();