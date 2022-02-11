<?php
require 'koneksi.php';
// menangkap data dari form
$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];
$tgl = $_POST['tgl'];


// proses insert data ke database
$query = $koneksi->query("INSERT INTO pembelian (barang_id, jumlah, tgl) VALUES ('$barang_id', '$jumlah', '$tgl')");

// redirect ke halama data barang
if ($query) {
  header('Location:pembelian.php?berhasil');
}
