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


    public function signin()
    {
        $this->render('users\signin', []);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processForm();
        } else {
            // Display the form for creating a new user
            //include 'views/user-form.php';
            $this->render('users\register', ['user' => []]);
        }
    }
    private function processForm()
    {
        $hotenkh = $_POST['txtname'];
        $diachikh = $_POST['txtad'];
        $sodienthoaikh = $_POST['txtphone'];
        $emailkh = $_POST['txtemail'];
        $tendangnhapkh = $_POST['txtun'];
        $matkhaukh =  $_POST['txtpass'];

        // Call the model to create a new user
        $user = $this->userModel->registerUser($hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh);

        if ($user) {
            // Redirect to the user list page or show a success message
            session_start();
            $_SESSION['flash_message'] = "Đăng ký thành công";
            header('Location: /user/signin');
            // echo "Register Success";
            exit();
        } else {
            // Handle the case where the user creation failed
            echo 'Register failed';
        }
    }

    public function showHome()
    {
        $this->render('homes\home', []);
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            if (isset($_SESSION['currentUser'])) {
                unset($_SESSION['currentUser']);
                session_destroy();
                header("Location: ../showHome");
                exit();
            }
        }
    }
}
