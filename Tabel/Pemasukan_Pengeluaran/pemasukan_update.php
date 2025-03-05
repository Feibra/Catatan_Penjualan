<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /index.php");
    exit;
}

include '../../backend/koneksi.php';

$row = null;

if (isset($_GET['id_barang'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id_barang']);
    $sql = "SELECT * FROM tb_pemasukan_pengeluaran WHERE id_barang = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Data tidak ditemukan atau query gagal: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $tanggal_masuk = mysqli_real_escape_string($conn, $_POST['tanggal_masuk']);
    $tanggal_keluar = mysqli_real_escape_string($conn, $_POST['tanggal_keluar']);
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $harga_barang = mysqli_real_escape_string($conn, $_POST['harga_barang']);
    $sql = "UPDATE tb_pemasukan_pengeluaran SET tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', nama_barang='$nama_barang', harga_barang='$harga_barang' WHERE id_barang=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: pemasukan_lihat.php");
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
        <form action="pemasukan_update.php" method="POST" class="bg-dark-subtle">
            <input type="hidden" name="id_barang" value="<?php echo htmlspecialchars($row['id_barang']); ?>">
            <p class="text-center fw-bold fs-4">UPDATE DATA PEMASUKAN & PENGELUARAN</p>
            <div class="mb-3 mt-3">
                <label for="tanggal_masuk" class="form-label fw-semibold">Tanggal Masuk</label>
                <input type="datetime-local" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo htmlspecialchars($row['tanggal_masuk']); ?>" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="tanggal_keluar" class="form-label fw-semibold">Tanggal Keluar</label>
                <input type="datetime-local" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo htmlspecialchars($row['tanggal_keluar']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($row['nama_barang']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label fw-semibold">Harga barang</label>
                <input type="text" class="form-control" id="harga_barang" name="harga_barang" step="0.01" value="<?php echo htmlspecialchars($row['harga_barang']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
        <div class="button">
            <a href="pemasukan_lihat.php" class="btn btn-primary">Back to Data Pemasukan & Pengeluaran</a>
        </div>

    <?php else: ?>
    <p>Data tidak ditemukan.</p>
    <?php endif; ?>
    
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>