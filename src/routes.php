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
$router->addRoute('/\//', [new UserController(), 'index']);
$router->addRoute('/\/user\/signin/', [new UserController(), 'signin']);
$router->addRoute('/\/auth\/validate/', [new AuthenticationController(), 'authenticate']);
$router->addRoute('/\/user\/logout/', [new UserController(), 'logout']);
$router->addRoute('/\/user\/register/', [new UserController(), 'register']);

$router->addRoute('/\/sanpham\/show/', [new SanphamController(), 'sanphamList']);
$router->addRoute('/\//', [new SanphamController(), 'sanphamList']);

$router->addRoute('/\/ctgh\/(\w+)/', [new CartController(), 'ctghchuaxacnhanList']);


// $router->addRoute('/\/cart\/add/', [new CartController(), 'updateTrangThai']);
$router->addRoute('/\/cart\/add\/(\d+)/', [new CartController(), 'updateTrangThai']);

$router->addRoute('/\/cart\/deleteall\/(\d+)/', [new CartController(), 'updateTrangThai']);


$router->addRoute('/\/cart\/addcart\/(\w+)/', [new CartController(), 'insertProductToCart']);
// thêm vào giỏ hàng
$router->addRoute('/\/cart\/addcart\/(\w+)\/(\d+)/', [new CartController(), 'insertProductToCart']);

$router->addRoute('/\/cart\/update\/(\w+)\/(\w+)/', [new CartController(), 'updateSoLuongMua']);


// $router->addRoute('/\/cart\/addcart\/(\w+)\/(\w+)\/(\w+)\/(\d+)\/(\w+)/', [new CartController(), 'insertProductToCart']);
// $router->addRoute('/\/cart\/addcart\/(\w+)\/(\w+)\/(\w+)\/(\d+)\/(\d+)\/(\d+)/', [new CartController(), 'insertProductToCart']);
// $router->addRoute('/\/cart\/addcart\/(.+)\/(\w+)/', [new CartController(), 'insertProductToCart']);
// $router->addRoute('/\/cart\/addcart\/(.+)\/(\w+)/', [new CartController(), 'insertProductToCart']);
$router->addRoute('/\/cart\/addcart\/(\d+)\/(\d+)/', [new CartController(), 'DeleteCart']);

$router->addRoute('/\/cart\/deleteone\/(\w+)\/(\d+)\/(\d+)/', [new CartController(), 'deleteOne']);

// $router->addRoute('/\/cart\/addcart\/(\w+)\/(\w+)\/(\w+)\/(\w+)\/(\w+)/', [new CartController(), 'insertProductToCart']);



// $router->addRoute('/\/ctgh/', [new CartController(), 'ctghchuaxacnhanList']);
// $router->addRoute('/\/hoadon\/(\d+)/', [new HoadonController(), 'delete']);

// $router->addRoute('/\/sanpham\/cart\/(\w+)/', [new SanphamController(), 'cart']);
// $router->addRoute('/\//', [new UserController(), 'register']);
// $router->addRoute('/\//', [new UserController(), 'showHome']);
// $router->addRoute('/\/home\/show/', [new UserController(), 'showHome']);
