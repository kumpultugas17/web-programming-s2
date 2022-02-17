<?php
// jika tombol submit diklik
if (isset($_POST['submit'])) {
  // include koneksi
  require 'koneksi.php';
  // menerima data dari form
  $barang_id = htmlspecialchars($_POST['barang_id']);
  $jumlah = htmlspecialchars($_POST['jumlah']);
  $tgl = htmlspecialchars($_POST['tgl']);

  $cek_data = $koneksi->query("SELECT stok FROM barang WHERE id = '$barang_id'");
  $data = mysqli_fetch_assoc($cek_data);
  if ($data['stok'] < $jumlah) {
    header('Location:data_beli.php?msg=cek_stok');
  } else {
    // proses pengurangan stok
    $koneksi->query("UPDATE barang SET stok=stok-$jumlah WHERE id='$barang_id'");

    // proses insert
    $query = $koneksi->query("INSERT INTO beli (barang_id, jumlah, tgl) VALUES ('$barang_id', '$jumlah', '$tgl')");

    // pengecekan
    if ($query) {
      header('location:data_beli.php?success-insert');
    }
  }
}
