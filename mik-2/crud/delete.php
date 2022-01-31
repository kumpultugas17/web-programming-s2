<?php
if (isset($_POST['btn_delete'])) {
  require 'koneksi.php';
  $id = $_POST['id'];

  $query = $koneksi->query("DELETE FROM products WHERE id = '$id'");

  if ($query) {
    header('Location:product.php?success-delete');
  }
}
