<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:/index.php");
    exit;
}

include '../../backend/koneksi.php';

if (isset($_GET['id_transaksi'])) {
    $id = $_GET['id_transaksi'];
    $sql = "DELETE FROM tb_penjualan WHERE id_transaksi = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: penjualan_lihat.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
