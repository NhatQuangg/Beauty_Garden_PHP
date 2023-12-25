<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class SanphamModel
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


    public function getAllSanpham()
    {
        $result = $this->mysqli->query("SELECT * FROM sanpham");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function timkiemSanpham($keyword)
    {
        // Sử dụng Prepared Statement để tránh SQL injection
        $stmt = $this->mysqli->prepare("SELECT * FROM sanpham WHERE masanpham LIKE ? OR tensanpham LIKE ?");

        // Bind parameters và thực hiện truy vấn
        $searchKeyword = "%$keyword%";
        $stmt->bind_param("ss", $searchKeyword, $searchKeyword);
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();

        // Trả về kết quả tìm kiếm dưới dạng một mảng liên kết (associative array)
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getloai()
    {
        // Thực hiện truy vấn SQL để lấy 'tenloai' từ bảng 'loai'
        $result = $this->mysqli->query("SELECT * FROM loai");

        // Chuyển kết quả thành mảng kết hợp (associative array)
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function laySanPhamTheoLoai($maloai)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM sanpham WHERE maloai = ?");

        if ($stmt) {
            $stmt->bind_param("s", $maloai);
            $stmt->execute();

            $result = $stmt->get_result();
            $sanphams = $result->fetch_all(MYSQLI_ASSOC);

            $stmt->close();

            return $sanphams;
        } else {
            // Xử lý lỗi prepare statement nếu cần
            return [];
        }
    }
}
