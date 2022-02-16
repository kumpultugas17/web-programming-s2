<?php

if (isset($_POST['submit'])) {
  require 'koneksi.php';

  $id = $_POST['id'];
  
  $delete = $koneksi->query("DELETE FROM pembelian WHERE id_beli = '$id'");

  if ($delete) {
    header('location:pembelian.php?msg=delete_beli');
  }
}