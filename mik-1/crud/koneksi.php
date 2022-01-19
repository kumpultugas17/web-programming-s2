<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'db_crud_mik1';

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
  die("Gagal koneksi database, silahkan cek! ".mysqli_connect_error());
}