<?php

if (isset($_POST['btn_beli'])) {
  require 'koneksi.php';
  $id_barang = $_POST['id_barang'];
  $jumlah = $_POST['jumlah'];
  $tgl = $_POST['tgl'];

  // pengurangan stok di tabel barang
  $koneksi->query("UPDATE barang SET stok = stok-$jumlah WHERE id = $id_barang");

  // proses simpan transaksi ke tabel pembelian
  $query = $koneksi->query("INSERT INTO pembelian (barang_id, jumlah, tanggal) VALUES ('$id_barang', '$jumlah', '$tgl')");

  // pengecekan
  if ($query) {
    header('location:pembelian.php?msg=berhasil_beli');
  }
}
