<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /index.php");
    exit;
}

include '../../backend/koneksi.php';

$row = null;

if (isset($_GET['id_transaksi'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id_transaksi']);
    $sql = "SELECT * FROM tb_penjualan WHERE id_transaksi = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Data tidak ditemukan atau query gagal: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_transaksi']);
    $harga_barang = mysqli_real_escape_string($conn, $_POST['harga_barang']);
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $jumlah_terjual = mysqli_real_escape_string($conn, $_POST['jumlah_terjual']);
    $sub_total = mysqli_real_escape_string($conn, $_POST['sub_total']);
    $sql = "UPDATE tb_penjualan SET harga_barang='$harga_barang', nama_barang='$nama_barang', jumlah_terjual='$jumlah_terjual', sub_total='$sub_total' WHERE id_transaksi=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: penjualan_lihat.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container{
            font-family: "Times New Roman", Times, serif;
        }
        .btn-primary {
            text-transform: uppercase;
            font-weight: 500;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-primary:hover {
            background-color: rgb(0, 0, 116);;
        }
        body {
            padding: 20px;
            background: linear-gradient(to right, #434343, #576574, #303952);
        }
        .bg-dark-subtle {
            padding: 20px;
            border-radius: 5px;
        }
        .fw-semibold {
            font-weight: 600;
        }
        .button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($row): ?>
        <form action="penjualan_update.php" method="POST" class="bg-dark-subtle">
            <input type="hidden" name="id_transaksi" value="<?php echo htmlspecialchars($row['id_transaksi']); ?>">
            <p class="text-center fw-bold fs-4">UPDATE DATA PENJUALAN</p>
            <div class="mb-3 mt-3">
                <label for="harga_barang" class="form-label fw-semibold">Harga Barang</label>
                <input type="text" class="form-control" id="harga_barang" name="harga_barang" step="0.01" value="<?php echo htmlspecialchars($row['harga_barang']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($row['nama_barang']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_terjual" class="form-label fw-semibold">Jumlah Terjual</label>
                <input type="number" class="form-control" id="jumlah_terjual" name="jumlah_terjual" value="<?php echo htmlspecialchars($row['jumlah_terjual']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="sub_total" class="form-label fw-semibold">Sub Total</label>
                <input type="text" class="form-control" id="sub_total" name="sub_total" step="0.01" value="<?php echo htmlspecialchars($row['sub_total']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
        <div class="button">
            <a href="penjualan_lihat.php" class="btn btn-primary">Back to Data Penjualan</a>
        </div>

    <?php else: ?>
    <p>Data tidak ditemukan.</p>
    <?php endif; ?>
    
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>