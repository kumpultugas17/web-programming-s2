<?php
if (isset($_POST['simpan'])) {
  // include koneksi
  require 'koneksi.php';
  // menangkap data yang dikirimkan dari form
  $nama_barang = $_POST['nama_barang'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  // pembuatan tanggal hari ini
  $date = date('Y-m-d H:i:s');

  // proses simpan ke database
  $query = $koneksi->query("INSERT INTO barang (nama, deskripsi, harga, stok, created) VALUES ('$nama_barang', '$deskripsi', '$harga', '$stok', '$date')");
  // proses pengecekan berhasil atau tidaknya simpan data ke database
  if ($query) {
    header('Location:barang.php?berhasil');
  } else {
    echo "Gagal Tambah Data";
  }
}