
<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
  // proses menerima data dari form
  $id_beli = $_POST['id'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];
  $tmp_jumlah = $_POST['tmp_jumlah'];
  $tanggal = $_POST['tanggal'];

  if ($jumlah >= $tmp_jumlah) {
    $sisa = $tmp_jumlah - $jumlah;
    $koneksi->query("UPDATE barang SET stok=stok+$sisa WHERE id = '$barang_id'");
  } else {
    $sisa = $jumlah - $tmp_jumlah;
    $koneksi->query("UPDATE barang SET stok=stok-$sisa WHERE id = '$barang_id'");
  }

  // proses update data di database
  $update = $koneksi->query("UPDATE pembelian SET barang_id='$barang_id', 
  jumlah='$jumlah', tanggal='$tanggal' WHERE id_beli='$id_beli'");
  // proses pengecekan dan pindah halaman
  if ($update) {
    header('location:pembelian.php?msg=update_beli');
  }
}
