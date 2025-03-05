<?php

class Pelanggan {
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $database_name = "dbpenjualan";
  private $conn;

  // Konstruktor untuk membuat koneksi ke database
  public function __construct() {
      $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database_name);
      if (!$this->conn) {
          die("koneksi gagal: " . mysqli_connect_error());
      }
  }

  // Metode untuk menambahkan data pelanggan
  public function tambahPelanggan($nama_pelanggan, $email_pelanggan, $alamat_pelanggan, $no_hp) {
      $sql = "INSERT INTO tb_pelanggan (nama_pelanggan, email_pelanggan, alamat_pelanggan, no_hp_pelanggan)
      VALUES ('$nama_pelanggan', '$email_pelanggan', '$alamat_pelanggan', '$no_hp')";

      if (mysqli_query($this->conn, $sql)) {
          echo "<script> alert ('DATA MASUK') </script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
  }

  // Metode untuk menutup koneksi ke database
  public function closeConnection() {
      mysqli_close($this->conn);
  }
}

class Penjualan {
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $database_name = "dbpenjualan";
  private $conn;

  // Konstruktor untuk membuat koneksi ke database
  public function __construct() {
      $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database_name);
      if (!$this->conn) {
          die("koneksi gagal: " . mysqli_connect_error());
      }
  }

  // Metode untuk menambahkan data pelanggan
  public function tambahPenjualan($harga_barang, $nama_barang, $jumlah_terjual, $sub_total) {
      $sql = "INSERT INTO tb_penjualan (harga_barang, nama_barang, jumlah_terjual, sub_total)
      VALUES ('$harga_barang', '$nama_barang', '$jumlah_terjual', '$sub_total')";

      if (mysqli_query($this->conn, $sql)) {
          echo "<script> alert ('DATA MASUK') </script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
  }

  // Metode untuk menutup koneksi ke database
  public function closeConnection() {
      mysqli_close($this->conn);
  }
}

class pemasukan {
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $database_name = "dbpenjualan";
  private $conn;

  // Konstruktor untuk membuat koneksi ke database
  public function __construct() {
      $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database_name);
      if (!$this->conn) {
          die("koneksi gagal: " . mysqli_connect_error());
      }
  }

  // Metode untuk menambahkan data pelanggan
  public function tambahpemasukan($tanggal_masuk, $tanggal_keluar, $nama_barang, $harga_barang) {
      $sql = "INSERT INTO tb_pemasukan_pengeluaran (tanggal_masuk, tanggal_keluar, nama_barang, harga_barang)
      VALUES ('$tanggal_masuk', '$tanggal_keluar', '$nama_barang', '$harga_barang')";

      if (mysqli_query($this->conn, $sql)) {
          echo "<script> alert ('DATA MASUK') </script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
  }

  // Metode untuk menutup koneksi ke database
  public function closeConnection() {
      mysqli_close($this->conn);
  }
}

    class stok {
      private $servername = "localhost";
      private $username = "root";
      private $password = "";
      private $database_name = "dbpenjualan";
      private $conn;
    
      // Konstruktor untuk membuat koneksi ke database
      public function __construct() {
          $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database_name);
          if (!$this->conn) {
              die("koneksi gagal: " . mysqli_connect_error());
          }
      }
    
      // Metode untuk menambahkan data pelanggan
      public function tambahstok($nama_barang, $stok_barang) {
          $sql = "INSERT INTO tb_stock (nama_barang, stok_barang)
          VALUES ('$nama_barang', '$stok_barang')";
    
          if (mysqli_query($this->conn, $sql)) {
              echo "<script> alert ('DATA MASUK') </script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
          }
      }
    
      // Metode untuk menutup koneksi ke database
      public function closeConnection() {
          mysqli_close($this->conn);
      }
    }