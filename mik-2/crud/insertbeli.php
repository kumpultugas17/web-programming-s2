<?php
// jika tombol submit diklik
if (isset($_POST['submit'])) {
  // include koneksi
  require 'koneksi.php';
  // menerima data dari form
  $barang_id = htmlspecialchars($_POST['barang_id']);
  $jumlah = htmlspecialchars($_POST['jumlah']);
  $tgl = htmlspecialchars($_POST['tgl']);

  // proses cari data stok
  $cek_data = $koneksi->query("SELECT stock FROM products WHERE id = '$barang_id'");
  $stok = mysqli_fetch_assoc($cek_data);
  // cek jumlah stok
  if ($stok['stock'] < $jumlah) {
    header('Location:beli.php?msg=stok_kurang');
  } else {
    // update stok di tabel barang
    $koneksi->query("UPDATE products SET stock = stock-$jumlah WHERE id = '$barang_id'");

    // proses insert
    $query = $koneksi->query("INSERT INTO beli (barang_id, jumlah, tgl) VALUES ('$barang_id', '$jumlah', '$tgl')");

    // pengecekan
    if ($query) {
      header('location:beli.php?msg=sukses_beli');
    }
  }
}
