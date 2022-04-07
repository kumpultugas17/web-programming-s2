<?php
include 'conn.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $delete = $koneksi->query("DELETE FROM products WHERE id='$id'");

  if ($delete) {
    header('location:product.php?success-delete');
  }
}
