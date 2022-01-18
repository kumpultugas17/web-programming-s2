<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_crud_mik2');

if (!$koneksi) {
  die("Koneksi gagal : " . mysqli_connect_error());
}
