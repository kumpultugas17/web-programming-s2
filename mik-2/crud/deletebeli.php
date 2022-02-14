<?php
if (isset($_POST['btn_delete'])) {
  require 'koneksi.php';
  $id = $_POST['id_beli'];

  $query = $koneksi->query("DELETE FROM beli WHERE id_beli = '$id'");

  if ($query) {
    header('Location:beli.php?msg=delete_beli');
  }
}
