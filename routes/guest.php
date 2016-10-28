<?php

$router->get('', 'Guest/MainController@home');
$router->get('home', 'Guest/MainController@home');
$router->get('index', 'Guest/MainController@home');
$router->get('about', 'Guest/MainController@about');
$router->get('single', 'Guest/MainController@single');
$router->get('contact', 'Guest/MainController@contact');
$router->get('gallery', 'Guest/MainController@gallery');