<?php
// jika tombol simpan diklik
if (isset($_POST['submit'])) {
  // include koneksi database
  require 'koneksi.php';
  // menangkap data dari form
  $nama_barang = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $date = date('Y-m-d H:i:s');

  // proses insert ke database
  $query = $koneksi->query("INSERT INTO barang (nama, deskripsi, harga, stok, created) VALUES ('$nama_barang', '$deskripsi', '$harga', '$stok', '$date')");

  // proses pengecekan
  if ($query) {
    header('Location:barang.php?berhasil');
  }
}
