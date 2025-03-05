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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style/styles.css">
    <!-- logo dari fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
    <style>
      body {
      background-image: url(img/bg-search.jpg);
      }
      h1 {
        text-align: center;
        margin-top: 125px;
        margin-bottom: 10px;
        color: 	#EEE8AA;
      }
      .search-box {
        margin: 20px auto;
        width: 100%;
        max-width: 600px;
      }
      .sale{
        margin-top:50px
      }
      img{
        margin-left:600px;
      }
      .rows {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .navbar{
        background-color:#AD9E89;
      }
      a{
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }
      .footer{
        bottom: 0;
        color: black;
        left: 0px;
        text-align: center;
        padding: 17px 15px;
        position: absolute;
        right: 0;
        border-top: 1px solid rgba(120, 130, 140, 0.13);
        background: #AD9E89;
      }
    </style>
<title>Home</title>
</head>
  <body>
  <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="Home.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="Home.php"><img src="img/foto-user.png" alt="user" width=30px> Halo, <?php echo $_SESSION['nama'];?></a>
        <a class="nav-link" href="kontak.php">Kontak</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>

<h1 class="text-center">Selamat Datang Di Database Penjualan</h1>
<div class="container search-box ">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="input-group">
                <input
                    type="text"
                    id="input-box"
                    class="form-control"
                    placeholder="Cari Tabel"
                    autocomplete="off"
                />
                <button id="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>
    <div class="result-box mt-2"></div>
</div>


    <!-- footer -->
  <div class="footer">
  © 2020 - 2024 Pusat Penjualan Online
  </div>
    <script src="script/search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>