<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:/index.php");
    exit;
}

include '../../backend/koneksi.php';

if (isset($_GET['id_pelanggan'])) {
    $id = $_GET['id_pelanggan'];
    $sql = "DELETE FROM tb_pelanggan WHERE id_pelanggan = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: pelanggan_lihat.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>