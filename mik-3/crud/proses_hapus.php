<?php 
if (isset($_POST['submit'])) {
  // include koneksi
  require 'koneksi.php';

  $id = $_POST['id'];

  // proses hapus
  $query = $koneksi->query("DELETE FROM barang WHERE id = '$id' ");

  if ($query) {
    header('Location:barang.php?hapus_berhasil');
  }
}