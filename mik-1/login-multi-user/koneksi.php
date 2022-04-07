<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_login');

if (!$koneksi) {
  die("Gagal koneksi ke database, silahkan cek!".mysqli_connect_error());
}