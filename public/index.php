<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

# 
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

# Initialize new Router Object :
$router = new App\Core\Router();

# ------------------------------------ #
# --------- Add Routing : ------------ #
# ------------------------------------ #

# -> Authentification :
$router->get('/login', App\Controllers\Authentification::class, 'loginHTML');
$router->post('/login', App\Controllers\Authentification::class, 'login');
$router->get('/register', App\Controllers\Authentification::class, 'registerHTML');
$router->post('/register', App\Controllers\Authentification::class, 'register');
$router->get('/logout', App\Controllers\Authentification::class, 'logout');

# -> Home Page :
$router->get('/', App\Controllers\HomeController::class, 'index');
$router->get('/wikis', App\Controllers\WikiController::class, 'getAll');
$router->get('/lastWikis', App\Controllers\WikiController::class, 'getLatest');
$router->get('/tags', App\Controllers\TagController::class, 'getAll');

#
$router->get('/wiki', App\Controllers\WikiController::class, 'index');


#
$router->dispatch($method, $uri);
