<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class UserModel
{
    private $mysqli;

    public function __construct()
    {
        // Replace these values with your actual database configuration
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

    public function getUserByUsername($username)
    {
        $userId = $this->mysqli->real_escape_string($username);
        $result = $this->mysqli->query("SELECT * FROM khachhang WHERE tendangnhapkh = '$username'");

        return $result->fetch_assoc();
    }

    public function registerUser($hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh)
    {
        $hotenkh =  $this->mysqli->real_escape_string($hotenkh);
        $diachikh =  $this->mysqli->real_escape_string($diachikh);
        $sodienthoaikh =  $this->mysqli->real_escape_string($sodienthoaikh);
        $emailkh =  $this->mysqli->real_escape_string($emailkh);
        $tendangnhapkh =  $this->mysqli->real_escape_string($tendangnhapkh);
        $matkhaukh =  $this->mysqli->real_escape_string($matkhaukh);

        // Kiểm tra xem tendangnhapkh đã tồn tại hay chưa
        $checkQuery = $this->mysqli->query("SELECT COUNT(*) AS count FROM khachhang WHERE tendangnhapkh = '$tendangnhapkh'");
        // lấy một hàng dữ liệu từ kết quả truy vấn dưới dạng một mảng kết hợp (associative array)
        $result = $checkQuery->fetch_assoc();

        if ($result['count'] > 0) {
            return null;
        } else {
            $this->mysqli->query("INSERT INTO khachhang (hotenkh, diachikh, sodienthoaikh, emailkh, tendangnhapkh, matkhaukh) 
            VALUES ('$hotenkh', '$diachikh', $sodienthoaikh, '$emailkh', '$tendangnhapkh', '$matkhaukh')");

            $result = $this->mysqli->query("SELECT LAST_INSERT_ID() AS makhachhang");
            $row = $result->fetch_assoc();
            $makhachhang = $row['makhachhang'];

            return $makhachhang;
        }
    }

    public function createNewCart($makhachhang)
    {
        $insertResult = $this->mysqli->query("INSERT INTO giohang (makhachhang, tongtien, trangthai) VALUES ($makhachhang, 0, 0)");

        return $insertResult;
    }
}
