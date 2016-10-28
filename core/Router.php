<?php namespace Core;

use Exception;
use InvalidArgumentException;
use App\Exceptions\HttpNotFoundException;

/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 10/23/16
 */
class Router
{
    protected $routes = [
        'GET'  => [],
        'POST' => []
    ];

    public static function load(array $files)
    {
        $router = new static;

        foreach ($files as $file) {
            if (!file_exists($path = __DIR__."/../routes/{$file}.php")) {
                throw new InvalidArgumentException("No such file at {$path}");
            }

            require $path;
        }

        return $router;
    }

    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

        throw new HttpNotFoundException;
    }

    private function callAction($controller, $action)
    {
        $controller = str_replace('/', '\\', $controller);
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(get_class($controller)." does not respond to the {$action} action.");
        }

        return $controller->$action();
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
}