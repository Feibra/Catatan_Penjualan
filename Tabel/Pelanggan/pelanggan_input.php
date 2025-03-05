<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
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
            background: linear-gradient(to right, #434343, #576574, #303952);
            padding: 20px;
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
        <form action="pelanggan_input.php" METHOD="POST" class="bg-dark-subtle">
            <p class="text-center fw-bold fs-4">DATA PELANGGAN</p>
            <div class="mb-3 mt-3">
                <label for="nama_pelanggan" class="form-label fw-semibold">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" placeholder="Nama Pelanggan" name="nama_pelanggan">
            </div>
            <div class="mb-3">
                <label for="alamat_pelanggan" class="form-label fw-semibold">Alamat Pelanggan</label>
                <input type="text" class="form-control" id="alamat_pelanggan" placeholder="Alamat Pelanggan" name="alamat_pelanggan" >
            </div>
            <div class="mb-3">
                <label for="email_pelanggan" class="form-label fw-semibold">Email Pelanggan</label>
                <input type="text" class="form-control" id="email_pelanggan" placeholder="Email Pelanggan" name="email_pelanggan" >
            </div>
            <div class="mb-3">
                <label for="nohp_pelanggan" class="form-label fw-semibold">No Hp</label>
                <input type="number" class="form-control" id="no_hp_pelanggan" placeholder="No Hp" name="no_hp_pelanggan" >
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </form>
        <div class="button">
            <a href="./tabel_pelanggan.php" class="btn btn-primary">Back</a>
        </div>
    </div>

<?php
include '../../backend/database.php';

// Membuat objek dari kelas Pelanggan
$pelanggan = new Pelanggan();

// Memanggil metode tambahPelanggan untuk menambahkan data pelanggan
if(isset($_POST['submit'])) {
    $pelanggan->tambahPelanggan($_POST['nama_pelanggan'], $_POST['email_pelanggan'], $_POST['alamat_pelanggan'], $_POST['no_hp_pelanggan']);
}

// Menutup koneksi ke database
$pelanggan->closeConnection();

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
