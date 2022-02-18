<?php
if (isset($_POST['hapus'])) {
  require 'koneksi.php';

  $id = $_POST['id_beli'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];

  // menambah stok di tabel barang
  $koneksi->query("UPDATE barang SET stok = stok+$jumlah WHERE id = '$barang_id'");
  // menghapus data di tabel pembelian
  $delete = $koneksi->query("DELETE FROM pembelian WHERE id_beli='$id'");

  if ($delete) {
    header('Location:pembelian.php?delete-success');
  }
}
