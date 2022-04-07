<?php
    // jika tombol submit diklik
    if (isset($_POST['submit'])) {
      // niclude koneksi
      require 'conn.php';
      // tangkap data dan simpan ke variable
      $product = htmlspecialchars($_POST['name']);
      $description = htmlspecialchars($_POST['description']);
      $price = htmlspecialchars($_POST['price']);
      $stock = htmlspecialchars($_POST['stock']);
      $date=date('Y-m-d H:i:s');

      $insert = $koneksi->query("INSERT INTO products (name, description, price, stock, created) VALUES ('$product', '$description', '$price', '$stock', '$date')");
      
      if ($insert) {
        header('location:product.php?success-insert');
      }
    }
