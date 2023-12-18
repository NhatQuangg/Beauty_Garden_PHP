<?php

use App\Controller\AuthenticationController;
use App\Router;
use App\Controller\UserController;


// Usage:
$router = new Router();

// chạy file login lên đầu tiên '/\//'
// $router->addRoute('/\//', [new UserController(), 'showHome']);
// $router->addRoute('/\//', [new UserController(), 'signin']);
$router->addRoute('/\//', [new UserController(), 'register']);

$router->addRoute('/\/user\/signin/', [new UserController(), 'signin']);
$router->addRoute('/\/auth\/validate/', [new AuthenticationController(), 'authenticate']);

$router->addRoute('/\/home\/show/', [new UserController(), 'showHome']);

$router->addRoute('/\/user\/logout/', [new UserController(), 'logout']);