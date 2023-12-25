<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class HoadonModel
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

    public function getAllHoadonschuaXacnhan()
    {
        $result = $this->mysqli->query("SELECT * FROM vxacnhan ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllHoadonsdaXacnhan()
    {
        $result = $this->mysqli->query("SELECT * FROM vdaxacnhan ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateXacnhan($mahoadon)
    {
        $mahoadon = $this->mysqli->real_escape_string($mahoadon);
        $this->mysqli->query("UPDATE chitiethoadon SET damua = 1 WHERE mahoadon=$mahoadon");

        return $this->mysqli->query("UPDATE hoadon SET damua = 1 WHERE mahoadon=$mahoadon");
    }

    

    public function updatesoluong($mahoadon)
    {
        $mahoadon = $this->mysqli->real_escape_string($mahoadon);

        return $this->mysqli->query("UPDATE sanpham INNER JOIN chitiethoadon ON sanpham.masanpham = chitiethoadon.masanpham
            SET sanpham.soluong = sanpham.soluong - chitiethoadon.soluongmua WHERE chitiethoadon.mahoadon = $mahoadon");
    }

    public function deletehoadon($mahoadon)
    {
        $mahoadon = $this->mysqli->real_escape_string($mahoadon);
        $this->mysqli->query("DELETE FROM chitiethoadon WHERE chitiethoadon.mahoadon = $mahoadon");
        $this->mysqli->query("DELETE FROM hoadon WHERE hoadon.mahoadon = $mahoadon");
    }

    public function deleteallhoadon()
    {
        $this->mysqli->query(" SET SQL_SAFE_UPDATES = 0");
        $this->mysqli->query(" DELETE FROM beautygarden.hoadon where damua = 1");
    }
}
