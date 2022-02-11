<?php

session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

$result = $koneksi->query("SELECT * FROM users WHERE username ='$username' AND password = '$password'");

$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);

    $_SESSION['name'] = $data['name'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    header('Location:index.php?msg=login');
} else {
    header('Location:login.php?msg=gagal');
}
