<?php

namespace SayIt\Core;

class Router
{
    protected array $routes = [];

    public function get(string $path, callable|array $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    protected function addRoute(string $method, string $path, callable|array $handler): void
    {
        $this->routes[$method][$path] = $handler;
    }

    public function dispatch(string $uri, string $method = null): void
    {
        $method = $method ?? $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH);

        $handler = $this->routes[$method][$path] ?? null;

        if (is_array($handler)) {
            [$class, $methodName] = $handler;
            call_user_func([$class, $methodName]);
        } elseif (is_callable($handler)) {
            call_user_func($handler);
        } else {
            http_response_code(404);
            echo '404 Not Found';
        }
    }
}
