<?php
include 'koneksi.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $date = date('Y-m-d H:i:s');

    $update = $koneksi->query("UPDATE barang SET nama='$nama', deskripsi='$deskripsi', harga='$harga', stok='$stok', updated='$date' WHERE id='$id'");

    if ($update) {
        header('location:barang.php?success-update');
    }
}
