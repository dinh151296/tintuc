<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tintuc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
  $conn->set_charset("utf8");

// Check connection
if (!$conn) {
    die("Kết nối database lỗi: " . mysqli_connect_error());
    exit();
}
