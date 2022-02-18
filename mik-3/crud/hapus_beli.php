<?php

if (isset($_POST['submit'])) {
  require 'koneksi.php';

  $id = $_POST['id'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];

  // menambahkan stok di tabel barang
  $koneksi->query("UPDATE barang SET stok=stok+$jumlah WHERE id = '$barang_id'");

  // menghapus di tabel pembelian
  $hapus = $koneksi->query("DELETE FROM pembelian WHERE id_beli = '$id'");

  if ($hapus) {
    header('Location:pembelian.php?msg=sukses_hapus_beli');
  }
}
