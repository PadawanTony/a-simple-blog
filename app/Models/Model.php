<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 10/23/16
 */

namespace App\Models;


abstract class Model
{
    /**
     * @return string Name of DB table
     */
    public static function getTable()
    {
        return strtolower(get_class(self::class).'s');
    }
}