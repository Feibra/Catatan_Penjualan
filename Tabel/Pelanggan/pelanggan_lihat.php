<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:../../index.php");
    exit;
}

include '../../backend/koneksi.php';

$sql = "SELECT * FROM tb_pelanggan";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
           background: linear-gradient(to right, #434343, #576574, #303952);
        }
        .container{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .btn-danger {
            text-transform: uppercase;
            font-weight: 500;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-danger:hover {
            background-color: red;
        }
        .btn-warning {
            text-transform: uppercase;
            font-weight: 500;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-warning:hover {
            background-color: yellow;
        }
        .btn-primary {
            text-transform: uppercase;
            font-weight: 500;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-primary:hover {
            background-color: rgb(0, 0, 116);;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-uppercase mt-3 fw-semibold">Data Pelanggan</h1>
            <div class="table-container">
                <input class="form-control mb-3" id="searchInput" type="text" placeholder="Search...">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pelangganTable">
                                <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['id_pelanggan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['nama_pelanggan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['alamat_pelanggan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email_pelanggan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['no_hp_pelanggan']); ?></td>
                                        <td>
                                            <a href="pelanggan_update.php?id_pelanggan=<?php echo $row['id_pelanggan']; ?>" class="btn btn-warning mb-1">Update</a>
                                            <a href="pelanggan_delete.php?id_pelanggan=<?php echo $row['id_pelanggan']; ?>" class="btn btn-danger"onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">Tidak ada data pelanggan</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="btn-container text-center">
                <a href="./tabel_pelanggan.php" class="btn btn-primary">Back</a>
            </div>
    </div>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#pelangganTable tr');
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>