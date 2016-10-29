<?php
use App\Models\Post;
use Core\App;
use Core\database\Connection;
use Core\database\QueryBuilder;
use Dotenv\Dotenv;

//Customize Kint
Kint::$theme = 'solarized';

//Load .env
$dotenv = new Dotenv($path = __DIR__ . '/..');

if (file_exists($path . '/.env'))
{
	$dotenv->load();

	$dotenv->required(
		[
			'DB_HOST',
			'DB_USERNAME',
			'DB_PASSWORD',
		]
	)->notEmpty();
}


//Create configuration
App::bind('config.app', require __DIR__ . '/config/app.php');
App::bind('config.database', require __DIR__ . '/config/database.php');
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config.database'))
));

// Initiate configuration
date_default_timezone_set(App::get('config.app')['timezone']);
