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
<form action="stok_input.php" METHOD="POST" class="bg-dark-subtle">
    <p class="text-center fw-bold fs-4">DATA STOK</p>
    <div class="mb-3 mt-3">
      <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" placeholder="nama_barang" name="nama_barang">
    </div>
    <div class="mb-3">
      <label for="stok_barang" class="form-label fw-semibold">Stok Barang</label>
      <input type="text" class="form-control" id="stok_barang" placeholder="stok_barang" name="stok_barang" >
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
  </form>
</div>

<div class="button">
  <a href="./tabel_stock.php"><button type="submit" class="btn btn-primary" name="back">back</button></a>
</div>

<?php
include '../../backend/database.php';

// Membuat objek dari kelas stok
$stok = new stok();

// Memanggil metode tambahstok untuk menambahkan data stok
if(isset($_POST['submit'])) {
    $stok->tambahstok($_POST['nama_barang'], $_POST['stok_barang'],);
}

// Menutup koneksi ke database
$stok->closeConnection();

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>