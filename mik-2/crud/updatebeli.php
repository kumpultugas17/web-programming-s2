<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
  $id = $_POST['id_beli'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];
  $tgl = $_POST['tgl'];


  $update = $koneksi->query("UPDATE beli SET barang_id='$barang_id', jumlah='$jumlah', tgl='$tgl' WHERE id_beli='$id'");

  if ($update) {
    header('location:beli.php?success-update');
  }
}
