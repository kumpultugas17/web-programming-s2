<?php
if (isset($_POST['submit'])) {
  require 'koneksi.php';

  $id = $_POST['id'];

  $query = $koneksi->query("DELETE FROM barang WHERE id = '$id'");

  if ($query) {
    header('Location:barang.php?berhasil_hapus');
  }
}