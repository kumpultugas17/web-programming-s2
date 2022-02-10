<?php
session_start();

if ($_SESSION['username'] == "") {
  header('Location: login.php?msg=login');
}
?>
<!-- di atas adalah perintah untuk mengembalikan ke halaman login  
jika belum ada aktifitas login-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bts5/css/bootstrap.min.css">
  <!-- Dependencies SweetAlert -->
  <script src="../bts5/js/jquery-3.4.1.slim.min.js"></script>
  <script src="../bts5/js/popper.min.js"></script>
  <script src="../bts5/js/sweetalert.min.js"></script>
</head>

<body>
  <!-- memasukkan elemen navbar -->
  <?php require_once 'navbar.php' ?>

  <h4>Selamat Datang Admin, <?php echo $_SESSION['name']; ?> !</h4>

  <?php
  require 'koneksi.php';
  $query = $koneksi->query("SELECT * FROM products");
  $data = mysqli_num_rows($query);
  $query1 = $koneksi->query("SELECT * FROM beli");
  $beli = mysqli_num_rows($query1);
  ?>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="card bg-success bg-gradient rounded-0 p-4 text-light shadow border-0">
          <h2>Data Products</h2>
          <p class="display-4 fw-bold text-center mt-3">
            <?= $data; ?>
          </p>
        </div>
      </div>
      <div class="col-6">
        <div class="card bg-warning bg-gradient rounded-0 p-4 text-light shadow border-0">
          <h2>Data Pembelian</h2>
          <p class="display-4 fw-bold text-center mt-3">
            <?= $beli; ?>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="../bts5/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Alert Jika Login Berhasil -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'login') : ?>
  <script>
    swal({
      title: "Login Berhasil",
      text: "Selamat datang ...",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif ?>
<!-- Akhir Aler Login Berhasil -->

</html>