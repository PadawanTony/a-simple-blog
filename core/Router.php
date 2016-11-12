<?php declare(strict_types=1);

namespace Core;

use Exception;
use InvalidArgumentException;
use App\Exceptions\HttpNotFoundException;

/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 10/23/16
 */
class Router
{
    protected static $routes = [
        'GET'  => [],
        'POST' => []
    ];

    public static function load(array $files)
    {
        array_walk($files, 'static::loadFile');
    }

    /**
     * @param $file
     */
    public static function loadFile ($file)
    {
        $path = __DIR__ . "/../routes/{$file}.php";

        if (!file_exists($path))
        {
            throw new InvalidArgumentException("No such file at {$path}");
        }

        require $path;
    }

    public static function direct($uri, $method)
    {
        foreach (static::$routes[$method] as $key=>$value) {
            if (preg_match("#^$key$#", $uri))
            {
//                d($key);
//                d($value);
                return static::callAction( ...explode('@', $value) );
            }
        }

        throw new HttpNotFoundException;
    }

    private static function callAction($controller, $action)
    {
        $controller = str_replace('/', '\\', $controller);
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(get_class($controller)." does not respond to the {$action} action.");
        }

        return $controller->$action();
    }

    public static function get($uri, $controller)
    {
        static::$routes['GET'][$uri] = $controller;

//        d(static::$routes['GET']);
    }

    public static function post($uri, $controller)
    {
        static::$routes['POST'][$uri] = $controller;
    }
}