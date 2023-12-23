<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Model\CartModel;
use App\Controller;

class CartController extends Controller
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $this->render('giohangs\index', []);
    }

    public function ctghchuaxacnhanList($makhachhang)
    {
        $magiohang = $this->cartModel->getMaGioHang($makhachhang);

        $ctghs = $this->cartModel->getAllCtghChuaXacNhan($makhachhang);

        $mgh = $magiohang['magiohang'];
        
        $machitietgiohang = $this->cartModel->getMaChiTietGioHang($mgh);

        $tongtien = $this->cartModel->calculateTotalPrice($mgh);

        // echo var_dump($tongtien);
        $total = $tongtien['total'];

        $this->cartModel->updateTotalPriceForCart($mgh, $total);

        $data = ['ctghs' => $ctghs, 'magiohang' => $magiohang, 'machitietgiohang' => $machitietgiohang, 'tongtien' => $tongtien];

        $this->render('cart\cart', $data);
    }

    public function updateTrangThai($makhachhang)
    {
        $mgh = $_POST['mgh'];

        $tongtien = $this->cartModel->calculateTotalPrice_2($mgh);

        $total = $tongtien['total'];

        $mahoadon = $this->cartModel->insertHoaDon($makhachhang, $total);

        $cthd = $this->cartModel->insertChiTietHoaDon($mahoadon, $mgh);

        $giohang = $this->cartModel->deleteChiTietGioHang($mgh);
        if ($giohang && $mahoadon && $cthd) {
            // echo "thanh cong";
            header("Location: ../index");
            exit();
        } else {
            // Handle the case where the user creation failed
            echo 'update xac nhan failed.';
        }
    }

    public function DeleteCart()
    {
        $mgh = $_POST['mgh'];
        $this->cartModel->deleteCart($mgh);
        header("Location: ../index");
    }

    public function deleteOne($masanpham, $magiohang, $makhachhang)
    {
        $machitietgiohang = $this->cartModel->getMaChiTietGioHang($magiohang);

        $mctgh = $machitietgiohang['machitietgiohang'];
        $this->cartModel->deleteOne($masanpham, $magiohang, $makhachhang, $mctgh);

        header("Location: /ctgh/$makhachhang");
    }

    public function insertProductToCart($masanpham, $makhachhang)
    {

        $magiohang = $this->cartModel->getMaGioHang($makhachhang);

        $product = $this->cartModel->getAllProductInCart($masanpham);

        $anh = $product['anh'];
        $tensanpham = $product['tensanpham'];
        $magiohang = $magiohang['magiohang'];

        $chitietgiohang = $this->cartModel->insertProductToDetailCart($magiohang, $masanpham, $anh, $tensanpham);


        header("Location: /ctgh/$makhachhang");
    }

    public function updateSoLuongMua($machitietgiohang, $makhachhang)
    {
        $slm = $_POST['txtsl'];
        // echo $slm;
        $this->cartModel->updateSoLuongMua($machitietgiohang, $slm);

        header("Location: /ctgh/$makhachhang");
    }

}
