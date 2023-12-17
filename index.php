<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\UserController;
use App\Router;


require __DIR__. '/src/routes.php';
$uri = $_SERVER['REQUEST_URI'];
//echo 'uri: ' . $uri . '<br>';
$router->match($uri);
