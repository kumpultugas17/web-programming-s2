<?php
if (isset($_POST['btn_transaksi'])) {
  require 'koneksi.php';
  $nama_barang = $_POST['nama_barang'];
  $jumlah = $_POST['jumlah'];
  $tgl = $_POST['tgl'];

  // update stok ditabel barang
  $koneksi->query("UPDATE barang SET stok=stok-$jumlah WHERE id = '$nama_barang'");

  // proses insert ke database
  $query = $koneksi->query("INSERT INTO pembelian (barang_id, jumlah, tgl) VALUES ('$nama_barang', '$jumlah', '$tgl')");

  // proses pengecekan
  if ($query) {
    header('Location:pembelian.php?msg=proses_beli');
  }
}
