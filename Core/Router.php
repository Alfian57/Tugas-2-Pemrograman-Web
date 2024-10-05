<?php

namespace Core;

class Router
{
    protected static array $routes = [];

    protected static function addRoute(string $method, string $uri, string $controller, string $function): void
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public static function GET(string $uri, string $controller, string $function): void
    {
        self::addRoute('GET', $uri, $controller, $function);
    }

    public static function POST(string $uri, string $controller, string $function): void
    {
        self::addRoute('POST', $uri, $controller, $function);
    }

    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['PATH_INFO'] ?? '/';

        foreach (self::$routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                $controller = new $route['controller'];
                $controller->{$route['function']}();
                return;
            }
        }

        echo '404 - Not Found';
    }
}
