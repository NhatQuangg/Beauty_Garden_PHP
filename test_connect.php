<?php
  function Connect_DB() {
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "beautygarden";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    else {
      echo "Connected successfully";
      return $conn;
    }
  }

  Connect_DB();
?>