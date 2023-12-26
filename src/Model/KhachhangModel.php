<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class KhachhangModel
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

    public function getkhachhang()
    {
        $result = $this->mysqli->query("SELECT * FROM khachhang");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getkhachhangById($makhachhang)
    {
        $makhachhang = $this->mysqli->real_escape_string($makhachhang);
        $result = $this->mysqli->query("SELECT * FROM khachhang WHERE makhachhang = '$makhachhang'");
        return $result->fetch_assoc();
    }

    public function updatekhachhang($makhachhang, $hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh)
    {
        $makhachhang = $this->mysqli->real_escape_string($makhachhang);
        $hotenkh = $this->mysqli->real_escape_string($hotenkh);
        $diachikh = $this->mysqli->real_escape_string($diachikh);
        $sodienthoaikh = $this->mysqli->real_escape_string($sodienthoaikh);
        $emailkh = $this->mysqli->real_escape_string($emailkh);
        $tendangnhapkh = $this->mysqli->real_escape_string($tendangnhapkh);
        $matkhaukh = $this->mysqli->real_escape_string($matkhaukh);

        return $this->mysqli->query("UPDATE khachhang SET  hotenkh='$hotenkh', diachikh='$diachikh', sodienthoaikh='$sodienthoaikh', emailkh='$emailkh', tendangnhapkh='$tendangnhapkh', matkhaukh='$matkhaukh' WHERE makhachhang='$makhachhang'");
    }

    public function addkhachhang($makhachhang, $hotenkh, $diachikh, $sodienthoaikh, $emailkh, $tendangnhapkh, $matkhaukh)
    {

        $makhachhang = $this->mysqli->real_escape_string($makhachhang);
        $hotenkh = $this->mysqli->real_escape_string($hotenkh);
        $diachikh = $this->mysqli->real_escape_string($diachikh);
        $sodienthoaikh = $this->mysqli->real_escape_string($sodienthoaikh);
        $emailkh = $this->mysqli->real_escape_string($emailkh);
        $tendangnhapkh = $this->mysqli->real_escape_string($tendangnhapkh);
        $matkhaukh = $this->mysqli->real_escape_string($matkhaukh);


        return $this->mysqli->query("INSERT INTO khachhang (makhachhang,hotenkh,diachikh,sodienthoaikh,emailkh,tendangnhapkh,matkhaukh) VALUES ('$makhachhang','$hotenkh','$diachikh','$sodienthoaikh','$emailkh','$tendangnhapkh','$matkhaukh')");
    }

    public function deletekhachhang($makhachhang)
    {
        $makhachhang = $this->mysqli->real_escape_string($makhachhang);
        $this->mysqli->query(" DELETE FROM khachhang WHERE makhachhang = '$makhachhang'");
    }
}
