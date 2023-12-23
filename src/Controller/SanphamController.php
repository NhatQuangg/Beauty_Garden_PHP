<?php

namespace App\Controller;
use App\Controller;
use App\Model\SanphamModel;

class SanphamController extends Controller
{
    private $sanphamModel;

    public function __construct()
    {
        $this->sanphamModel = new SanphamModel();
    }

    public function index(){
        $this->render('sanphams\index', []);
    }

    public function sanphamList()
    {
        $sanphams = $this->sanphamModel->getAllSanpham();
        $this->render('sanphams\index', ['sanphams' => $sanphams]);
    }

}
