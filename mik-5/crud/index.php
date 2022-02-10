<?php
session_start();

if ($_SESSION['username'] == "") {
  header('Location: login.php?msg=login');
}
?>
<!-- di atas adalah perintah untuk mengembalikan ke halaman login jika belum ada aktifitas login -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets-5.1.3/css/bootstrap.min.css">
  <!-- Dependecies SweetAlert -->
  <script src="../assets-5.1.3/js/jquery-3.4.1.slim.min.js"></script>
  <script src="../assets-5.1.3/js/popper.min.js"></script>
  <script src="../assets-5.1.3/js/sweetalert.min.js"></script>
</head>

<body>
  <?php
  // untuk memasukkan elemen dari file navbar
  require_once 'navbar.php';
  ?>

  <!-- main -->
  <div class="container">
    <div class="row mb-4">
      <div class="col-6">
        <div class="card bg-warning bg-gradient rounded-0 border-0 text-light p-4">
          <h2 class="mb-3">DATA BARANG</h2>
          <p class="fw-bold display-4 text-center">
            <?php
            require 'koneksi.php';
              $query_data = $koneksi->query("SELECT * FROM barang");
              $jumlah_data = mysqli_num_rows($query_data);
              echo $jumlah_data;
            ?>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-dark align-middle">
            <div class="card text-left">
              <div class="card-header">
                Dashboard
              </div>
              <div class="card-body">
                <h5 class="card-title">Hallo, Admin <?php echo $_SESSION['name']; ?> !</h5>
                <p class="card-text">Selamat datang di Halaman Admin! </p>
                <p class="card-text">Anda dapat mengelola data di halaman ini. </p>

              </div>
              <div class="card-footer text-muted text-center">
                <p class="mt-5 mb-3 text-muted"> MIK ELTIBIZ &copy; 2021 </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Javascript -->
  <script src="../assets-5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Alert Jika Login Gagal -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'login') : ?>
  <script>
    swal({
      title: "SUCCESS !!!",
      text: "LOGIN BERHASIL ... !",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif ?>
<!-- Akhir Alert Login Gagal -->

</html>