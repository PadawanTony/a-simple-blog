<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../core/bootstrap.php';

use Core\Request;
use Core\Router;

Router::load([
	'guest',
]);
echo Router::direct(Request::uri(), Request::method());
