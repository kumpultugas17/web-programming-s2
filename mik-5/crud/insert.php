<?php
require 'koneksi.php';
// menangkap data dari form
$nama_barang = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$tgl = date('Y-m-d H:i:s');

// proses insert data ke database
$query = $koneksi->query("INSERT INTO barang (nama, deskripsi, harga, stok, created) VALUES ('$nama_barang', '$deskripsi', '$harga', '$stok', '$tgl')");

// redirect ke halama data barang
if ($query) {
  header('Location:data_barang.php?berhasil');
}
