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
            background: linear-gradient(to right, #434343, #576574, #303952);;
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
<form action="penjualan_input.php" METHOD="POST" class="bg-dark-subtle">
    <p class="text-center fw-bold fs-4">DATA PENJUALAN</p>
    <div class="mb-3 mt-3">
      <label for="harga_barang" class="form-label fw-semibold">Harga Barang</label>
      <input type="text" class="form-control" id="harga_barang" placeholder="harga_barang" name="harga_barang" step="0.01">
    </div>
    <div class="mb-3">
      <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" placeholder="nama_barang" name="nama_barang" >
    </div>
    <div class="mb-3">
      <label for="jumla_terjual" class="form-label fw-semibold">Jumlah Terjual</label>
      <input type="number" class="form-control" id="jumlah_terjual" placeholder="jumlah_terjual" name="jumlah_terjual" >
    </div>
    <div class="mb-3">
      <label for="sub_total" class="form-label fw-semibold">Sub Total</label>
      <input type="text" class="form-control" id="sub_total" placeholder="sub_total" name="sub_total" step="0.01">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
  </form>
</div>

<div class="button">
  <a href="./tabel_penjualan.php"><button type="submit" class="btn btn-primary" name="back">back</button></a>
</div>

<?php
include '../../backend/database.php';

// Membuat objek dari kelas Penjualan
$penjualan = new Penjualan();

// Memanggil metode tambahPenjualan untuk menambahkan data penjualan
if(isset($_POST['submit'])) {
    $penjualan->tambahPenjualan($_POST['harga_barang'], $_POST['nama_barang'], $_POST['jumlah_terjual'], $_POST['sub_total']);
}

// Menutup koneksi ke database
$penjualan->closeConnection();

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>