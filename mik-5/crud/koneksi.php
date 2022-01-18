<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_crud_mik5";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
  die("Koneksi gagal : ".mysqli_connect_error());
}