<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_crud_mik3');

if (!$koneksi) {
  die("Koneksi Database Gagal : " . mysqli_connect_error());
}
