<?php
 session_start();

 if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Biodata</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
       .footer {
            background-color: #ad9e89;
            color: black;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
       .content {
            flex: 1; /* Make the content section take up all available space */
            padding-bottom: 20px;
        }
        body {
            background-image: url('img/bg-search.jpg');
            background-size: cover; /* Memastikan background mengisi seluruh layar tanpa pengulangan */
            background-repeat: no-repeat; /* Mencegah gambar diulang */
            background-position: center; /* Posisikan gambar di tengah layar */
            padding: 0;
            margin: 0;
            min-height: 100vh; /* Mengambil seluruh tinggi layar */
            display: flex;
            flex-direction: column;
        }
        .profile {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 15px;
        }
        .profile img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .profile aside {
            background-color: #bebaba;
            padding: 10px;
            border: 1px solid #ebe3e3;
            border-radius: 5px;
            margin-top: 20px;
            width: 100%;
        }
        .navbar {
            background-color: #ad9e89;
        }
        p {
            margin-bottom: 5px;
        }
        .row {
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col-md-6 {
            margin-bottom: 20px;
        }
        .box article {
            margin-bottom: 20px;
        }
        @media (max-width: 767px) {
            .profile img {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="Home.php" style="color: black">HOME</a>
    </div>
</nav>
<div class="content">
    <div class="container mt-3">
        <div class="row">
        <!-- Biodata Orang Pertama -->
            <div class="col-md-6 col-sm-12 profile">
                <aside class="p-3">
                    <h2 class="text-center">BIODATA</h2>
                    <img src="img/fotodekba.jpg" alt="Foto Orang Pertama" class="img-fluid" />
                    <p><strong>Nama:</strong> I Made Feibra Verdiyanto</p>
                    <p><strong>Nim:</strong> 230020010</p>
                    <p><strong>Umur:</strong> 19 Tahun</p>
                    <p><strong>Pekerjaan:</strong> Mahasiswa</p>
                    <p><strong>Alamat:</strong> Jl. Tukad Pancoran Panjer</p>
                </aside>
                <div class="box">
                    <article>
                    <h3>Informasi Tambahan</h3>
                    <p>Web ini dibuat untuk projek ujian akhir semester mata kuliah web front end dan mata kuliah back end saya. Pada projek web ini tugas saya membuat program backend, pada backend disini terdapat database yang berisi data karyawan, penjualan, stok, pemasukan dan pada code PHP terdapat sesion, koneksi, insert, update, delete, select, untuk database kemudian ada percabangan dan code PHP OOP pada code insert data ke database</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
  © 2020 - 2024 Pusat Catatan Penjualan Online
  </div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
