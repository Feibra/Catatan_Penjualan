<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /index.php");
    exit;
}

include '../../backend/koneksi.php';

$row = null;

if (isset($_GET['id_pelanggan'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id_pelanggan']);
    $sql = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Data tidak ditemukan atau query gagal: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $alamat_pelanggan = mysqli_real_escape_string($conn, $_POST['alamat_pelanggan']);
    $email_pelanggan = mysqli_real_escape_string($conn, $_POST['email_pelanggan']);
    $nohp_pelanggan = mysqli_real_escape_string($conn, $_POST['no_hp_pelanggan']);

    $sql = "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', email_pelanggan='$email_pelanggan', no_hp_pelanggan='$nohp_pelanggan' WHERE id_pelanggan=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: pelanggan_lihat.php");
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
    <title>Update Data Pelanggan</title>
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
        <form action="pelanggan_update.php" method="POST" class="bg-dark-subtle">
            <input type="hidden" name="id_pelanggan" value="<?php echo htmlspecialchars($row['id_pelanggan']); ?>">
            <h1 class="text-center fw-bold fs-4">UPDATE DATA PELANGGAN</h1>
            <div class="mb-3 mt-3">
                <label for="nama_pelanggan" class="form-label fw-semibold">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo htmlspecialchars($row['nama_pelanggan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat_pelanggan" class="form-label fw-semibold">Alamat Pelanggan</label>
                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" value="<?php echo htmlspecialchars($row['alamat_pelanggan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email_pelanggan" class="form-label fw-semibold">Email Pelanggan</label>
                <input type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" value="<?php echo htmlspecialchars($row['email_pelanggan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nohp_pelanggan" class="form-label fw-semibold">No Hp</label>
                <input type="number" class="form-control" id="no_hp_pelanggan" name="no_hp_pelanggan" value="<?php echo htmlspecialchars($row['no_hp_pelanggan']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>

        <div class="button">
            <a href="pelanggan_lihat.php" class="btn btn-primary">Back to Data Pelanggan</a>
        </div>
        
        <?php else: ?>
        <p>Data tidak ditemukan.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>