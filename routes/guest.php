<?php

use Core\Router;

Router::get('', 'Guest/MainController@home');
Router::get('home', 'Guest/MainController@home');
Router::get('index', 'Guest/MainController@home');
Router::get('about', 'Guest/MainController@about');
Router::get('single', 'Guest/MainController@single');
Router::get('contact', 'Guest/MainController@contact');
Router::get('gallery', 'Guest/MainController@gallery');