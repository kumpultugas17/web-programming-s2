<?php
require 'koneksi.php';
// menangkap data dari form
$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];
$tgl = $_POST['tgl'];

// cek pembelian
$cek_stok = $koneksi->query("SELECT stok FROM barang WHERE id='$barang_id'");
$cek = mysqli_fetch_assoc($cek_stok);
if ($cek['stok'] < $jumlah) {
  header('Location:pembelian.php?msg=cek_stok');
} else {
  // pengurangan stok di tabel barang
  $koneksi->query("UPDATE barang SET stok = stok-$jumlah WHERE id = '$barang_id'");

  // proses insert data ke database
  $query = $koneksi->query("INSERT INTO pembelian (barang_id, jumlah, tgl) VALUES ('$barang_id', '$jumlah', '$tgl')");

  // redirect ke halama data pembelian
  if ($query) {
    header('Location:pembelian.php?berhasil');
  }
}
