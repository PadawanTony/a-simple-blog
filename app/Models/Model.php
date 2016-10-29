<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 10/23/16
 */

namespace App\Models;

use ReflectionClass;

abstract class Model
{
    /**
     * @return string Name of DB table
     */
    public static function getTable()
    {
	    $model = static::class;

	    $reflect = new ReflectionClass($model);

	    return strtolower($reflect->getShortName().'s');
	}
}