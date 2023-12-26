<?php

use App\Controller\AuthenticationController;
use App\Controller\CartController;
use App\Router;
use App\Controller\UserController;
use App\Controller\SanphamController;

use App\Controller\AdSanphamController;
use App\Controller\HoadonController;
use App\Controller\KhachhangController;
use App\Controller\LoaiController;

// Usage:
$router = new Router();



// -------------------------------------------------------------------------------
//                               USER
// -------------------------------------------------------------------------------

// $router->addRoute('/\//', [new UserController(), 'signin']);
// $router->addRoute('/\//', [new UserController(), 'index']);

$router->addRoute('/\//', [new SanphamController(), 'sanphamList']);
$router->addRoute('/\/user\/signin/', [new UserController(), 'signin']);
$router->addRoute('/\/auth\/validate/', [new AuthenticationController(), 'authenticate']);
$router->addRoute('/\/user\/logout/', [new UserController(), 'logout']);
$router->addRoute('/\/user\/register/', [new UserController(), 'register']);

$router->addRoute('/\/sanpham\/show/', [new SanphamController(), 'sanphamList']);

$router->addRoute('/\/ctgh\/(\w+)/', [new CartController(), 'ctghchuaxacnhanList']);
$router->addRoute('/\/cart\/addbill\/(\d+)/', [new CartController(), 'orderItem']);
$router->addRoute('/\/cart\/deleteall\/(\d+)/', [new CartController(), 'deleteCart']);
$router->addRoute('/\/cart\/addcart\/(\w+)/', [new CartController(), 'insertProductToCart']);
// thêm vào giỏ hàng
$router->addRoute('/\/cart\/addcart\/(\w+)\/(\d+)/', [new CartController(), 'insertProductToCart']);
$router->addRoute('/\/cart\/update\/(\d+)\/(\d+)/', [new CartController(), 'updateSoLuongMua']);
$router->addRoute('/\/cart\/addcart\/(\d+)\/(\d+)/', [new CartController(), 'DeleteCart']);
$router->addRoute('/\/cart\/deleteone\/(\w+)\/(\d+)\/(\d+)\/(\d+)/', [new CartController(), 'deleteOne']);

$router->addRoute('/\/sanpham/', [new SanphamController(), 'timkiemList']);
$router->addRoute('/\/sanpham\/timkiemList/', [new SanphamController(), 'timkiemList']);
$router->addRoute('/\/loai\/chonloailist\/(\w+)/', [new SanphamController(), 'chonloailist']);


// -------------------------------------------------------------------------------
//                               ADMIN
// -------------------------------------------------------------------------------



// // Add routes
// $router->addRoute('/\//', [new AdSanphamController(), 'sanphamlist']);
// $router->addRoute('/\/sanpham/', [new AdSanphamController(), 'sanphamlist']);
// $router->addRoute('/\/sanpham\/index/', [new AdSanphamController(), 'sanphamlist']);
// $router->addRoute('/\/sanpham\/sanphamlist/', [new AdSanphamController(), 'sanphamlist']);
// $router->addRoute('/\/sanpham\/update\/(\w+)/', [new AdSanphamController(), 'update']);
// $router->addRoute('/\/sanpham\/add/', [new AdSanphamController(), 'add']);
// $router->addRoute('/\/sanpham\/delete\/(\w+)/', [new AdSanphamController(), 'delete']);


// // Add routes
// $router->addRoute('/\//', [new LoaiController(), 'loailist']);
// $router->addRoute('/\/loai/', [new LoaiController(), 'loailist']);
// $router->addRoute('/\/loai\/index/', [new LoaiController(), 'loailist']);
// $router->addRoute('/\/loai\/loailist/', [new LoaiController(), 'loailist']);
// $router->addRoute('/\/loai\/update\/(\w+)/', [new LoaiController(), 'update']);
// $router->addRoute('/\/loai\/add/', [new LoaiController(), 'add']);
// $router->addRoute('/\/loai\/delete\/(\w+)/', [new LoaiController(), 'delete']);

// // Add routes
// $router->addRoute('/\//', [new KhachhangController(), 'khachhanglist']);
// $router->addRoute('/\/khachhang/', [new KhachhangController(), 'khachhanglist']);
// $router->addRoute('/\/khachhang\/index/', [new KhachhangController(), 'khachhanglist']);
// $router->addRoute('/\/khachhang\/khachhanglist/', [new KhachhangController(), 'khachhanglist']);
// $router->addRoute('/\/khachhang\/update\/(\w+)/', [new KhachhangController(), 'update']);
// $router->addRoute('/\/khachhang\/delete\/(\w+)/', [new KhachhangController(), 'delete']);


// // Add routes
// $router->addRoute('/\//', [new HoadonController(), 'hoadonchuaxacnhanList']);
// $router->addRoute('/\/hoadon/', [new HoadonController(), 'hoadonchuaxacnhanList']);
// $router->addRoute('/\/hoadon\/index/', [new HoadonController(), 'hoadonchuaxacnhanList']);
// $router->addRoute('/\/hoadon\/hoadonchuaxacnhanList/', [new HoadonController(), 'hoadonchuaxacnhanList']);
// $router->addRoute('/\/hoadon\/update\/(\d+)/', [new HoadonController(), 'update']);
// $router->addRoute('/\/hoadon\/delete\/(\d+)/', [new HoadonController(), 'delete']);
// $router->addRoute('/\/hoadon\/deleteall/', [new HoadonController(), 'deleteall']);
// $router->addRoute('/\/hoadon\/hoadondaxacnhanList/', [new HoadonController(), 'hoadondaxacnhanList']);






