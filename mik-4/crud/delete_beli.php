<?php

if (isset($_POST['submit'])) {
  require 'koneksi.php';

  $id = $_POST['id'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];

  $koneksi->query("UPDATE barang SET stok=stok+$jumlah WHERE id='$barang_id'");
  
  $delete = $koneksi->query("DELETE FROM pembelian WHERE id_beli = '$id'");

  if ($delete) {
    header('location:pembelian.php?msg=delete_beli');
  }
}