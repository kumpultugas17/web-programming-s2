<?php
include 'koneksi.php';
if (isset($_POST['btn_hapus'])) {
    $id = $_POST['id'];

    $delete = $koneksi->query("DELETE FROM barang WHERE id='$id'");

    if ($delete) {
        header('location:data_barang.php?success-delete');
    }
}
