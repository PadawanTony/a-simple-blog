<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../core/bootstrap.php';

use Core\Request;
use Core\Router;

echo Router::load([
	'guest',
])->direct(Request::uri(), Request::method());
