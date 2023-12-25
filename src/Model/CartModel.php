<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class CartModel
{
    private $mysqli;

    public function __construct()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->mysqli = new \mysqli($host, $username, $password, $database);

        // Check connection
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }
    public function getAllCtghChuaXacNhan($makhachhang)
    {
        $result = $this->mysqli->query(
            "SELECT ctg.masanpham, ctg.machitietgiohang ,ctg.anh, ctg.tensanpham, ctg.soluongmua, sp.gia, (ctg.soluongmua * sp.gia) as tongtien
            FROM giohang cg
            JOIN chitietgiohang ctg ON cg.magiohang = ctg.magiohang
            JOIN sanpham sp ON ctg.masanpham = sp.masanpham
            WHERE cg.trangthai = 0 AND cg.makhachhang = '$makhachhang'"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMaGioHang($makhachhang)
    {
        $result = $this->mysqli->query("SELECT magiohang FROM giohang WHERE makhachhang = $makhachhang AND trangthai = false");
        return $result->fetch_assoc();
    }

    public function getMaChiTietGioHang($magiohang)
    {

        $magiohang = $this->mysqli->real_escape_string($magiohang);
        $result = $this->mysqli->query("SELECT machitietgiohang FROM chitietgiohang WHERE magiohang = $magiohang");

        return $result->fetch_assoc();
    }

    // public function getMaChiTietGioHang_2($magiohang, $machitietgiohang)
    // {

    //     $magiohang = $this->mysqli->real_escape_string($magiohang);
    //     $machitietgiohang = $this->mysqli->real_escape_string($machitietgiohang);
    //     $result = $this->mysqli->query("SELECT machitietgiohang FROM chitietgiohang WHERE magiohang = $magiohang AND machitietgiohang = $machitietgiohang");

    //     return $result->fetch_assoc();
    // }

    public function insertHoaDon($makhachhang, $total)
    {
        $makhachhang = $this->mysqli->real_escape_string($makhachhang);
        $this->mysqli->query("INSERT INTO hoadon (makhachhang, ngaymua, damua, tongtien) VALUES ($makhachhang, NOW(), 0, $total)");

        // Lấy ra mã hóa đơn vừa mới tạo
        $result = $this->mysqli->query("SELECT LAST_INSERT_ID() AS mahoadon");
        $row = $result->fetch_assoc();
        $mahoadon = $row['mahoadon'];

        return $mahoadon;
    }

    public function insertChiTietHoaDon($mahoadon, $magiohang)
    {
        $mahoadon = $this->mysqli->real_escape_string($mahoadon);
        $magiohang = $this->mysqli->real_escape_string($magiohang);

        $result = $this->mysqli->query("INSERT INTO chitiethoadon (masanpham, soluongmua, mahoadon, damua)
                                SELECT ctgh.masanpham, ctgh.soluongmua, $mahoadon, 0
                                FROM chitietgiohang ctgh
                                WHERE ctgh.magiohang = $magiohang");
        return $result;
    }

    public function deleteChiTietGioHang($magiohang)
    {
        $magiohang = $this->mysqli->real_escape_string($magiohang);

        $result = $this->mysqli->query("DELETE FROM chitietgiohang WHERE magiohang = '$magiohang'");

        return $result;
    }

    public function getAllProductInCart($masanpham)
    {
        $result = $this->mysqli->query("SELECT * FROM sanpham WHERE masanpham = '$masanpham'");

        return $result->fetch_assoc();
    }

    public function insertProductToDetailCart($magiohang, $masanpham, $anh, $tensanpham)
    {
        $anh = $this->mysqli->real_escape_string($anh);
        $tensanpham = $this->mysqli->real_escape_string($tensanpham);

        $result = $this->mysqli->query("INSERT INTO chitietgiohang (magiohang, masanpham, soluongmua, anh, tensanpham) 
                                                VALUES ($magiohang, '$masanpham', 1, '$anh', '$tensanpham')");

        return $result;
    }

    public function calculateTotalPrice($magiohang)
    {
        $magiohang = $this->mysqli->real_escape_string($magiohang);

        // $chuoi_gio_hang = implode(',', $magiohang);

        $result = $this->mysqli->query("SELECT SUM(ctg.soluongmua * sp.gia) as total
                                        FROM chitietgiohang ctg JOIN sanpham sp ON ctg.masanpham = sp.masanpham
                                        WHERE ctg.magiohang = $magiohang");
        return $result->fetch_assoc();
    }

    public function calculateTotalPrice_2($magiohang)
    {

        $magiohang = $this->mysqli->real_escape_string($magiohang);

        $result = $this->mysqli->query("SELECT SUM(ctg.soluongmua * sp.gia) as total
                                        FROM chitietgiohang ctg JOIN sanpham sp ON ctg.masanpham = sp.masanpham
                                        WHERE ctg.magiohang = $magiohang");
        return $result->fetch_assoc();
    }

    public function updateTotalPriceForCart($magiohang, $tongtien)
    {
        $magiohang = $this->mysqli->real_escape_string($magiohang);

        $stmt = $this->mysqli->prepare("UPDATE giohang SET tongtien = ? WHERE magiohang = ?");

        // đối số 'di' chỉ định rằng tham số đầu tiên là số thực và tham số thứ 2 là số nguyên
        $stmt->bind_param("di", $tongtien, $magiohang);

        $updateResult = $stmt->execute();

        $stmt->close();

        return $updateResult;

        // Phương pháp này giúp ngăn chặn SQL injection và đảm bảo rằng các giá trị được định dạng đúng trong truy vấn.
    }

    public function updateSoLuongMua($machitietgiohang, $soluongmua)
    {
        $result = $this->mysqli->query("UPDATE chitietgiohang SET soluongmua = $soluongmua WHERE machitietgiohang = $machitietgiohang");

        return $result;
    }

    public function deleteCart($magiohang)
    {
        $magiohang = $this->mysqli->real_escape_string($magiohang);

        $result = $this->mysqli->query("DELETE FROM giohang WHERE magiohang = $magiohang");

        return $result;
    }

    public function deleteOne($masanpham, $magiohang, $makhachhang, $machitietgiohang)
    {
        $masanpham = $this->mysqli->real_escape_string($masanpham);
        $magiohang = $this->mysqli->real_escape_string($magiohang);
        $makhachhang = $this->mysqli->real_escape_string($makhachhang);
        $machitietgiohang = $this->mysqli->real_escape_string($machitietgiohang);


        $result = $this->mysqli->query("DELETE FROM chitietgiohang WHERE masanpham = '$masanpham' AND magiohang = $magiohang AND machitietgiohang = $machitietgiohang");

        return $result;
    }
}
