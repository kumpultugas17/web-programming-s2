
<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
  // proses menerima data dari form
  $id = $_POST['id_beli'];
  $barang_id = $_POST['barang_id'];
  $jumlah = $_POST['jumlah'];
  $tgl = $_POST['tgl'];

  // proses update data di database
  $update = $koneksi->query("UPDATE pembelian SET barang_id='$barang_id', 
  jumlah='$jumlah', tgl='$tgl' WHERE id_beli='$id'");
  // proses pengecekan dan pindah halaman
  if ($update) {
    header('location:pembelian.php?update-success');
  }
}
