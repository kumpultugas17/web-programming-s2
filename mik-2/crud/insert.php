<?php
// jika tombol submit diklik
if (isset($_POST['submit'])) {
  // include koneksi
  require 'koneksi.php';
  // menerima data dari form
  $product = htmlspecialchars($_POST['name']);
  $description = htmlspecialchars($_POST['description']);
  $price = htmlspecialchars($_POST['price']);
  $stock = htmlspecialchars($_POST['stock']);
  $date = date('Y-m-d H:i:s');

  // proses insert
  $query = $koneksi->query("INSERT INTO products (name, description, price, stock, created) VALUES ('$product', '$description', '$price', '$stock', '$date')");

  // pengecekan
  if ($query) {
    header('location:product.php?success-insert');
  }
}
