<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .avatar {
    display: inline-block;
    vertical-align: middle;
    }
    .avatar img {
    width: 50px; 
    height: 50px;
    border-radius: 50%; 
    }
    .card-header {
    background-color:rgba(238, 238, 238, 0.842);
    transition: 2s;
    }
    .card-header:hover{
    background-color:rgb(204, 204, 204);
    }
    .card {
    margin-top: 50px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border: 1px solid black;
    }
    h3{
        font-family: "Times New Roman", Times, serif;
    }
    </style>
</head>
<body class="bg-gradient">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center ">
                        <div class="avatar">
                            <img src="img/foto-user.png" alt="Avatar">
                        </div>
                            <h3 class="text-uppercase">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="nama ">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
include "backend/koneksi.php";

if (isset($_POST['nama']) && isset($_POST['pass'])) {
    $user = $_POST['nama'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM tb_karyawan WHERE Nama_karyawan = '$user' AND password = '$pass'";
    $hasil = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($hasil) > 0) {
      $row = mysqli_fetch_assoc($hasil);
      $_SESSION['login'] = TRUE;
      $_SESSION['nama'] = $row['Nama_karyawan'];
      header("Location: Home.php");
    } else {
      echo "<script>alert('Login gagal, Username atau password salah')</script>";
     }
    }
    mysqli_close($conn);
?>