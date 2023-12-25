<?php

namespace App\Model;
//require_once(__DIR__ . '/../../config.php');

class LoaiModel
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

    public function getloai()
    {
        $result = $this->mysqli->query("SELECT * FROM loai");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getloaiById($maloai)
    {
        $maloai = $this->mysqli->real_escape_string($maloai);
        $result = $this->mysqli->query("SELECT * FROM loai WHERE maloai = '$maloai'");
        return $result->fetch_assoc();
    }

    public function updateloai($maloai,$tenloai)
    {
        $maloai = $this->mysqli->real_escape_string($maloai);
        $tenloai = $this->mysqli->real_escape_string($tenloai);
       
        return $this->mysqli->query("UPDATE loai SET  tenloai='$tenloai' WHERE maloai='$maloai'");
    }

    public function addloai($maloai,$tenloai)
    {
        
        $maloai = $this->mysqli->real_escape_string($maloai);
        $tenloai = $this->mysqli->real_escape_string($tenloai);
       
        return $this->mysqli->query("INSERT INTO loai (maloai,tenloai) VALUES ('$maloai','$tenloai')");
    
    }

    public function deleteloai($maloai)
    {
        $maloai = $this->mysqli->real_escape_string($maloai);
        $this->mysqli->query(" DELETE FROM loai WHERE maloai = '$maloai'");
        
    }
}
