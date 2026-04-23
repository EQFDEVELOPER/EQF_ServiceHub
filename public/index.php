<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Session;
use App\Core\Router;

Session::start();

$routes = require __DIR__ . '/../app/config/routes.php';

$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);