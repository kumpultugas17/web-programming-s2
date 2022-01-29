<?php
if (isset($_POST['hapus'])) {
  require 'koneksi.php';

  $id = $_POST['id'];

  $delete = $koneksi->query("DELETE FROM barang WHERE id='$id'");

  if ($delete) {
    header('Location:barang.php?delete-success');
  }
}