<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class AdSanphamModel
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

    public function getsanpham()
    {
        $result = $this->mysqli->query("SELECT * FROM sanpham");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getloai()
    {
        $result = $this->mysqli->query("SELECT * FROM loai");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getsanphamById($masanpham)
    {
        $masanpham = $this->mysqli->real_escape_string($masanpham);
        $result = $this->mysqli->query("SELECT * FROM sanpham WHERE masanpham = '$masanpham'");
        return $result->fetch_assoc();
    }

    public function updatesanpham($masanpham,$tensanpham,$soluong,$gia,$anh,$ngaynhap,$tomtat,$thongtinsanpham,$maloai)
    {
        $masanpham = $this->mysqli->real_escape_string($masanpham);
        $tensanpham = $this->mysqli->real_escape_string($tensanpham);
        $soluong = $this->mysqli->real_escape_string($soluong);
        $gia = $this->mysqli->real_escape_string($gia);
        $anh = $this->mysqli->real_escape_string($anh);
        $ngaynhap = $this->mysqli->real_escape_string($ngaynhap);
        $tomtat = $this->mysqli->real_escape_string($tomtat);
        $thongtinsanpham = $this->mysqli->real_escape_string($thongtinsanpham);
        $maloai = $this->mysqli->real_escape_string($maloai);

        return $this->mysqli->query("UPDATE sanpham SET  tensanpham='$tensanpham', soluong='$soluong', gia='$gia', anh='$anh', ngaynhap='$ngaynhap', tomtat='$tomtat', thongtinsanpham='$thongtinsanpham', maloai='$maloai' WHERE masanpham='$masanpham'");
    }

    public function addsanpham($masanpham,$tensanpham,$soluong,$gia,$anh,$ngaynhap,$tomtat,$thongtinsanpham,$maloai)
    {
        
        $masanpham = $this->mysqli->real_escape_string($masanpham);
        $tensanpham = $this->mysqli->real_escape_string($tensanpham);
        $soluong = $this->mysqli->real_escape_string($soluong);
        $gia = $this->mysqli->real_escape_string($gia);
        $anh = $this->mysqli->real_escape_string($anh);
        $ngaynhap = $this->mysqli->real_escape_string($ngaynhap);
        $tomtat = $this->mysqli->real_escape_string($tomtat);
        $thongtinsanpham = $this->mysqli->real_escape_string($thongtinsanpham);
        $maloai = $this->mysqli->real_escape_string($maloai);


        return $this->mysqli->query("INSERT INTO sanpham (masanpham,tensanpham,soluong,gia,anh,ngaynhap,tomtat,thongtinsanpham,maloai) VALUES ('$masanpham','$tensanpham','$soluong','$gia','$anh','$ngaynhap','$tomtat','$thongtinsanpham','$maloai')");
    
    }

    public function deletesanpham($masanpham)
    {
        $masanpham = $this->mysqli->real_escape_string($masanpham);
        $this->mysqli->query(" DELETE FROM sanpham WHERE masanpham = '$masanpham'");
    }
}



