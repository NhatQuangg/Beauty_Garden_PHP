<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Controller;

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function signin(){
        $this->render('users\signin', []);
    }

    public function showHome() {
        $this->render('homes\home', []);
    }

    public function logout(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_start();
            if(isset($_SESSION['currentUser'])){
                unset($_SESSION['currentUser']);
                session_destroy();
                header("Location: ../showHome");
                exit();
            }
        }
    }
}
