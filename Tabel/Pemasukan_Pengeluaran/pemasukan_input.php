<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form action="pemasukan_input.php" METHOD="POST" class="bg-dark-subtle">
    <p class="text-center fw-bold fs-4">DATA PEMASUKAN</p>
    <div class="mb-3 mt-3">
      <label for="tanggal_masuk" class="form-label fw-semibold">Tanggal Masuk</label>
      <input type="datetime-local" class="form-control" id="tanggal_masuk" placeholder="tanggal_masuk" name="tanggal_masuk">
    </div>
    <div class="mb-3">
      <label for="tanggal_keluar" class="form-label fw-semibold">Tanggal Keluar</label>
      <input type="datetime-local" class="form-control" id="tanggal_keluar" placeholder="tanggal_keluar" name="tanggal_keluar" >
    </div>
    <div class="mb-3">
      <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" placeholder="nama_barang" name="nama_barang" >
    </div>
    <div class="mb-3">
      <label for="harga_barang" class="form-label fw-semibold">Harga Barang</label>
      <input type="text" class="form-control" id="harga_barang" placeholder="harga_barang" name="harga_barang" step="0.01">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
  </form>
</div>

  <div class="button">
  <a href="./tabel_pemasukan_pengeluaran.php"><button type="submit" class="btn btn-primary" name="back">back</button></a>
</div>

<?php
include '../../backend/database.php';

// Membuat objek dari kelas Pemasukan
$pemasukan = new Pemasukan();

// Memanggil metode tambahPemasukan untuk menambahkan data pemasukan
if(isset($_POST['submit'])) {
    $pemasukan->tambahPemasukan($_POST['tanggal_masuk'], $_POST['tanggal_keluar'], $_POST['nama_barang'], $_POST['harga_barang']);
}

// Menutup koneksi ke database
$pemasukan->closeConnection();

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>