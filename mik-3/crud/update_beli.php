<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
  // proses menerima data dari form
  $id = $_POST['id'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];
  $tmp_jumlah = $_POST['tmp_jumlah'];
  $tgl = $_POST['tgl'];

  // proses update data di tabel barang
  if ($jumlah >= $tmp_jumlah) {
    $sisa = $tmp_jumlah - $jumlah;
    $koneksi->query("UPDATE barang SET stok=stok+$sisa WHERE id = '$barang_id'");
  } else {
    $sisa = $jumlah - $tmp_jumlah;
    $koneksi->query("UPDATE barang SET stok=stok-$sisa WHERE id = '$barang_id'");
  }

  // proses update data di tabel pembelian
  $update = $koneksi->query("UPDATE pembelian SET barang_id = '$barang_id', jumlah = '$jumlah', tgl='$tgl' WHERE id_beli = '$id'");
  // proses direct halaman
  if ($update) {
    header('Location:pembelian.php?msg=sukses_update');
  }
}
