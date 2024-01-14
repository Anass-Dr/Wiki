<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

# Class Namespaces :
use App\Middlewares\Authorization;

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
$router->get('/wiki', App\Controllers\WikiController::class, 'index');
$router->get('/search', App\Controllers\HomeController::class, 'search');

# -> Dashboard Side :
## -> Admin :
$router->get('/admin', App\Controllers\Admin\DashboardController::class, 'index', [Authorization::class, 'handle']);
$router->get('/admin/tags-and-categories', App\Controllers\Admin\DashboardController::class, 'showTagsCategoriesPage', [Authorization::class, 'handle']);
$router->post('/admin/add', App\Controllers\Admin\DashboardController::class, 'add', [Authorization::class, 'handle']);
$router->get('/admin/get', App\Controllers\Admin\DashboardController::class, 'get', [Authorization::class, 'handle']);
$router->post('/admin/update', App\Controllers\Admin\DashboardController::class, 'update', [Authorization::class, 'handle']);
$router->post('/admin/delete', App\Controllers\Admin\DashboardController::class, 'delete', [Authorization::class, 'handle']);
$router->get('/admin/wikis', App\Controllers\Admin\WikiController::class, 'index', [Authorization::class, 'handle']);
$router->post('/admin/archive', App\Controllers\Admin\WikiController::class, 'archive', [Authorization::class, 'handle']);

## -> Author :
$router->get('/author', App\Controllers\Author\DashboardController::class, 'index', [Authorization::class, 'handle']);
$router->get('/author/wikis', App\Controllers\Author\WikiController::class, 'wikiPage', [Authorization::class, 'handle']);
$router->get('/author/add', App\Controllers\Author\WikiController::class, 'add', [Authorization::class, 'handle']);
$router->post('/author/add', App\Controllers\Author\WikiController::class, 'add', [Authorization::class, 'handle']);
$router->get('/author/update', App\Controllers\Author\WikiController::class, 'updateHTML', [Authorization::class, 'handle']);
$router->post('/author/update', App\Controllers\Author\WikiController::class, 'update', [Authorization::class, 'handle']);
$router->post('/author/delete', App\Controllers\Author\WikiController::class, 'delete', [Authorization::class, 'handle']);

#
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

$router->dispatch($method, $uri);
