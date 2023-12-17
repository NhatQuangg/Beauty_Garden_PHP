<?php
namespace App\Controller;

use App\Model\UserModel;
class AuthenticationController {
    
    public function __construct(){
        
    }

    public function authenticate() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username . $password;

            $user = (new UserModel())->getUserByUsername($username);
            echo $user;
            if ($user && $password === $user['matkhaukh']) {
                session_start();
                $_SESSION['currentUser'] = $user;
    
                // Redirect to index.php
                $_SESSION['flash_message'] = "Login was successful";
                header("Location: ../home/show/");
                exit();
            } else {
                // Authentication failed, redirect to signin.php
                $_SESSION['flash_message'] = "Login has failed";
                header("Location: ../user/signin");
                exit();
            }
        }

        
    }
}