<?php
if (isset($_POST['hapus'])) {
  require 'koneksi.php';

  $id = $_POST['id_beli'];

  $delete = $koneksi->query("DELETE FROM pembelian WHERE id_beli='$id'");

  if ($delete) {
    header('Location:pembelian.php?delete-success');
  }
}
