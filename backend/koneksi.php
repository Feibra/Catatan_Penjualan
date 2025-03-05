<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "dbpenjualan";

$conn = mysqli_connect($servername, $username, $password, $database_name);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>