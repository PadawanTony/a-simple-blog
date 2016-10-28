<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 10/23/16
 */

namespace Core;
use InvalidArgumentException;

/**
 * Class App Dependency injection container.
 * @package core
 */
class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new InvalidArgumentException("No {$key} is bound in the container.");
        }

        return static::$registry[$key];
    }

//	public function __toString()
//	{
//		$string = "";
//		foreach (self::$registry as $key => $value)
//		{
//			$string .= $key . '--> ' . $value . '<br>';
//		}
//
//		return $string;
//    }
}