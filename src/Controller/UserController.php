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

    public function index(){
        $this->render('sanphams\index', []);
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
        $makhachhang = $this->userModel->registerUser($hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh);
        $this->userModel->createNewCart($makhachhang);

        if ($makhachhang) {
            // Redirect to the user list page or show a success message
            session_start();
            $_SESSION['message_register_success'] = "Đăng ký thành công";
            header('Location: /user/signin');
            // echo "Register Success";
            exit();
        } else {
            // Handle the case where the user creation failed
            session_start();
            $_SESSION['message_register_failed'] = "Tên đăng nhập đã tồn tại.";
            header('Location: /user/register');
        }
    }
    
    public function logout()
    {   
        session_start();
        if (isset($_SESSION['currentUser'])) {
            // Unset và hủy session
            unset($_SESSION['currentUser']);
            session_destroy();
            header("Location: ../index");
            // header('Location: /user/register');
            exit();
        }
        else {
            header('Location: /user/signin');
        }
    }

}
