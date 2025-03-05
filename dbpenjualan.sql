-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2025 pada 06.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `Id_karyawan` int(50) NOT NULL,
  `Nama_karyawan` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `No_hp` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`Id_karyawan`, `Nama_karyawan`, `Email`, `Password`, `No_hp`, `Alamat`) VALUES
(1, 'Damar', 'damar@gmail.com', 'anjay123', '081237732768', 'jln tukad yeh sungi'),
(3, 'dekba', 'dekba@gmail.com', 'dekba1', '085381273984', 'tukad pancoran'),
(4, 'Kadek Damar Priandana', 'damar@gmail.com', '230020003', '081237732768', 'desa penuktukan'),
(5, 'I Made Feibra Verdiyanto', 'feibra@gmail.com', '230020010', '0895383339280', 'jl tukad pancoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `no_hp_pelanggan` varchar(30) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp_pelanggan`, `email_pelanggan`) VALUES
(1, 'Odik', 'jln tukad yeh sungi', '0812737497394', 'odik@gmail.com'),
(2, 'Agung', 'Penuktukan', '021987654789', 'agung@gmail.com'),
(3, 'Agung', 'Penuktukan', '08264863284', 'agung@gmail.com'),
(5, 'Sulas', 'Penuktukan', '087657764874', 'sulas@gmail.com'),
(7, 'puspa', 'Penuktukan', '082345543765', 'puspa@gmail.com'),
(8, 'Kolok', 'Penuktukan', '08123873924', 'kolok@gmail.com'),
(10, 'dekba', 'jl tukad pancoran', '081726638892', 'dekba@gmail.com'),
(12, 'saya', 'jl bangli', '087678234213', 'saya@gmail.com'),
(13, 'aku', 'jl akasia', '089765234678', 'aku@gmail.com'),
(15, 'pasya', 'jl gatot subroto', '081897789652', 'pasya@gmail.com'),
(16, 'putu', 'jl sudirman', '032789234567', 'putu@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemasukan_pengeluaran`
--

CREATE TABLE `tb_pemasukan_pengeluaran` (
  `id_barang` int(50) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pemasukan_pengeluaran`
--

INSERT INTO `tb_pemasukan_pengeluaran` (`id_barang`, `tanggal_masuk`, `tanggal_keluar`, `nama_barang`, `harga_barang`) VALUES
(1, '2024-02-03 23:00:00', '2024-06-17 10:00:00', 'celana jeans', '200000'),
(2, '2024-12-08 08:00:00', '2024-12-10 11:00:00', 'kemeja', '100000'),
(4, '2024-05-07 09:00:00', '2024-06-17 12:00:00', 'hoodie', '125.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_transaksi` int(50) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_terjual` varchar(100) NOT NULL,
  `sub_total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_transaksi`, `harga_barang`, `nama_barang`, `jumlah_terjual`, `sub_total`) VALUES
(1, '200000', 'celana jeans', '4', '800.000'),
(2, '100000', 'Kemeja', '2', '200.000'),
(4, '25.000', 'singlet', '4', '100.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id_barang` int(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_stock`
--

INSERT INTO `tb_stock` (`id_barang`, `nama_barang`, `stok_barang`) VALUES
(1, 'celana jeans', '1000'),
(3, 'baju polos hitam ', '80'),
(4, 'baju polos hitam ', '80'),
(6, 'hoodie', '25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`Id_karyawan`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pemasukan_pengeluaran`
--
ALTER TABLE `tb_pemasukan_pengeluaran`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `Id_karyawan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_pemasukan_pengeluaran`
--
ALTER TABLE `tb_pemasukan_pengeluaran`
  MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
