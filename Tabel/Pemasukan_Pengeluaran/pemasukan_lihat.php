<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:../../index.php");
    exit;
}

include '../../backend/koneksi.php';

$sql = "SELECT * FROM tb_pemasukan_pengeluaran";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemasukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .btn-danger {
            text-transform: uppercase;
            font-weight: 500;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-danger:hover {
            background-color: red;
        }
        .btn-warning {
            text-transform: uppercase;
            font-weight: 500;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-warning:hover {
            background-color: yellow;
        }
        .btn-primary {
            text-transform: uppercase;
            font-weight: 500;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .btn-primary:hover {
            background-color: rgb(0, 0, 116);;
        }
        body{
            background: linear-gradient(to right, #434343, #576574, #303952);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center fw-semibold text-uppercase mt-3">Data Pemasukan & Pengeluaran</h1>
            <div class="table-container">
                <input class="form-control mb-3" id="searchInput" type="text" placeholder="Search...">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pemasukanTable">
                                <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['id_barang']); ?></td>
                                        <td><?php echo htmlspecialchars($row['tanggal_masuk']); ?></td>
                                        <td><?php echo htmlspecialchars($row['tanggal_keluar']); ?></td>
                                        <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                                        <td><?php echo htmlspecialchars($row['harga_barang']); ?></td>
                                        <td>
                                            <a href="pemasukan_update.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-warning mb-1">Update</a>
                                            <a href="pemasukan_delete.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-danger"onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">Tidak ada data Penjualan</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="btn-container text-center">
                <a href="./tabel_pemasukan_pengeluaran.php" class="btn btn-primary">Back</a>
            </div>
    </div>
    
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#pemasukanTable tr');
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