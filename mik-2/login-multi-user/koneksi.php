<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_login");

if (!$koneksi) {
  die("Gagal koneksi ke database!".mysqli_connect_error());
}