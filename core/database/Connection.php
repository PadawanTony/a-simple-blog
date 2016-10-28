<?php

namespace Core\database;

use PDO;

class Connection
{
    public static function make($config)
    {
        $type = $config['type'];

        return new PDO(
            $config[$type]['connection'].';port:'.$config[$type]['port'].';dbname='.$config[$type]['name'].';charset='.$config[$type]['charset'],
            $config[$type]['username'],
            $config[$type]['password'],
            $config[$type]['options']
        );
    }
}