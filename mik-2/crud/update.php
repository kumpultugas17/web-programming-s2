<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $product = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $date = date('Y-m-d H:i:s');

  $update = $koneksi->query("UPDATE products SET name='$product', description='$description', price='$price', stock='$stock', updated='$date' WHERE id='$id'");

  if ($update) {
    header('location:product.php?success-update');
  }
}
