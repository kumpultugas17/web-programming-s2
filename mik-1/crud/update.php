<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
  // proses menerima data dari form
  $id = $_POST['id'];
  $nama_barang = $_POST['nama'];
  $des = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $date = date('Y-m-d H:i:s');
  // proses update data di database
  $update = $koneksi->query("UPDATE barang SET nama='$nama_barang', 
  deskripsi='$des', harga='$harga', stok='$stok', 
  updated='$date' WHERE id='$id'");
  // proses pengecekan dan pindah halaman
  if ($update) {
    header('location:barang.php?update-success');
  }
}
