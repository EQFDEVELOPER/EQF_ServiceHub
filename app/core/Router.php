<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        $basePath = '/EQF_ServiceHub/public';
        if (str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
        }

        $uri = $uri ?: '/';
        if ($uri === '/index.php') {
    $uri = '/';
}

        foreach ($this->routes as [$routeMethod, $routeUri, $handler]) {
            if ($method === $routeMethod && $uri === $routeUri) {
                [$controller, $action] = $handler;
                $instance = new $controller();
                $instance->$action();
                return;
            }
        }

        http_response_code(404);
        echo '404 - Page not found';
    }
}