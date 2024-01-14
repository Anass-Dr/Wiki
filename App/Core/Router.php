<?php

namespace App\Core;

class Router
{
    private $routes;

    private function addRouter($method, $uri, $controller, $action, $handler = [])
    {
        if ($handler) {
            $this->routes[$method][$uri] = ["class" => $controller, "action" => $action, "handler" => ["class" => $handler[0], "method" => $handler[1]]];
        } else {
            $this->routes[$method][$uri] = ["class" => $controller, "action" => $action];
        }
    }

    public function get($uri, $controller, $action, $handler = [])
    {
        $this->addRouter('get', $uri, $controller, $action, $handler);
    }

    public function post($uri, $controller, $action, $handler = [])
    {
        $this->addRouter('post', $uri, $controller, $action, $handler);
    }

    public function dispatch($method, $uri)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['class'];
            $action = $this->routes[$method][$uri]['action'];

            if (array_key_exists("handler", $this->routes[$method][$uri])) {
                $handler = $this->routes[$method][$uri]['handler']['class'];
                $handler_method = $this->routes[$method][$uri]['handler']['method'];
                $handler::$handler_method($uri, [$controller, $action]);
            } else {
                $controller::$action();
            }
        } else {
            require __DIR__ . '/../../Views/404.php';
        }
    }
}
