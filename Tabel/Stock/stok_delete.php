<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:../../index.php");
    exit;
}

include '../../backend/koneksi.php';

if (isset($_GET['id_barang'])) {
    $id = $_GET['id_barang'];
    $sql = "DELETE FROM tb_stock WHERE id_barang = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: stok_lihat.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>