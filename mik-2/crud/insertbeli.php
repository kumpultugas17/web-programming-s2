<?php
// jika tombol submit diklik
if (isset($_POST['submit'])) {
  // include koneksi
  require 'koneksi.php';
  // menerima data dari form
  $barang_id = htmlspecialchars($_POST['barang_id']);
  $jumlah = htmlspecialchars($_POST['jumlah']);
  $tgl = htmlspecialchars($_POST['tgl']);

  // proses insert
  $query = $koneksi->query("INSERT INTO beli (barang_id, jumlah, tgl) VALUES ('$barang_id', '$jumlah', '$tgl')");

  // pengecekan
  if ($query) {
    header('location:beli.php?msg=sukses_beli');
  }
}
