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

    
}
