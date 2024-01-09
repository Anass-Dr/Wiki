<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

# 
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

# Initialize new Router Object :
$router = new App\Core\Router();

# Add Routing :
$router->get('/', App\Controllers\HomeController::class, 'index');

#
$router->dispatch($method, $uri);
