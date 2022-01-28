<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $koneksi->query("DELETE FROM barang WHERE id='$id'");

    if ($delete) {
        header('location:data_barang.php?success-delete');
    }
}
