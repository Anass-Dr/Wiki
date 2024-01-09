<?php

namespace App\Core;

class Router
{
    private $routes;

    private function addRouter($method, $uri, $controller, $action)
    {
        $this->routes[$method][$uri] = ["class" => $controller, "action" => $action];
    }

    public function get($uri, $controller, $action)
    {
        $this->addRouter('get', $uri, $controller, $action);
    }

    public function post($uri, $controller, $action)
    {
        $this->addRouter('post', $uri, $controller, $action);
    }

    public function dispatch($method, $uri)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['class'];
            $action = $this->routes[$method][$uri]['action'];

            // call_user_func($controller::$action);
            $controller::$action();
        } else {
            echo "Not Found";
        }
    }
}
