<?php
namespace App\Controller;

use App\Model\UserModel;
class AuthenticationController {
    
    public function __construct(){
        
    }

    public function authenticate() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tendangnhapkh = $_POST['username'];
            $matkhaukh = $_POST['password'];

            $user = (new UserModel())->getUserByUsername($tendangnhapkh);

            if ($user && $matkhaukh === $user['matkhaukh']) {
                session_start();
                $_SESSION['currentUser'] = $user;
                // $_SESSION['makhachhang'] = $user['makhachhang'];
                // Redirect to index.php
                //$_SESSION['flash_message'] = "Login was successful";
                header("Location: ../sanpham/show");
                exit();
            } else {
                // Authentication failed, redirect to signin.php
                session_start();
                $_SESSION['flash_message'] = "Login has failed";
                header("Location: ../user/signin");
                exit();
            }
            header("Location: ../sanpham/show/");
        }

        
    }
}