<?php

use App\Controller\AuthenticationController;
use App\Controller\CartController;
use App\Router;
use App\Controller\UserController;
use App\Controller\SanphamController;

// Usage:
$router = new Router();

// chạy file login lên đầu tiên '/\//'
// $router->addRoute('/\//', [new UserController(), 'signin']);
// $router->addRoute('/\//', [new UserController(), 'index']);
$router->addRoute('/\/user\/signin/', [new UserController(), 'signin']);
$router->addRoute('/\/auth\/validate/', [new AuthenticationController(), 'authenticate']);
$router->addRoute('/\/user\/logout/', [new UserController(), 'logout']);
$router->addRoute('/\/user\/register/', [new UserController(), 'register']);

$router->addRoute('/\/sanpham\/show/', [new SanphamController(), 'sanphamList']);
$router->addRoute('/\//', [new SanphamController(), 'sanphamList']);

$router->addRoute('/\/ctgh\/(\w+)/', [new CartController(), 'ctghchuaxacnhanList']);


$router->addRoute('/\/cart\/addbill\/(\d+)/', [new CartController(), 'orderItem']);
$router->addRoute('/\/cart\/deleteall\/(\d+)/', [new CartController(), 'deleteCart']);

$router->addRoute('/\/cart\/addcart\/(\w+)/', [new CartController(), 'insertProductToCart']);
// thêm vào giỏ hàng
$router->addRoute('/\/cart\/addcart\/(\w+)\/(\d+)/', [new CartController(), 'insertProductToCart']);
$router->addRoute('/\/cart\/update\/(\d+)\/(\d+)/', [new CartController(), 'updateSoLuongMua']);
$router->addRoute('/\/cart\/addcart\/(\d+)\/(\d+)/', [new CartController(), 'DeleteCart']);
$router->addRoute('/\/cart\/deleteone\/(\w+)\/(\d+)\/(\d+)\/(\d+)/', [new CartController(), 'deleteOne']);
