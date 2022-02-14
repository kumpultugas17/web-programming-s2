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

    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <h4 class="card-title">Dashboard</h4>
          </div>
          <div class="card-body">
            <h5 class="card-title">Hallo, Admin <?php echo $_SESSION['name']; ?> !</h5>
            <p class="card-text">Selamat datang di Halaman Admin! </p>
            <p class="card-text">Anda dapat mengelola data di halaman ini. </p>

            <div class="row">
              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border border-start border-0 border-primary border-3 rounded-2 shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-item-center">
                      <div class="col mr-2">
                        <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                          Data Barang
                        </div>
                        <div class="h5 mb-0 fw-bold text-gray-800">
                          <?php
                          require 'koneksi.php';
                          $barang = $koneksi->query("SELECT * FROM barang");
                          echo $brg = mysqli_num_rows($barang);
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border border-start border-0 border-warning border-3 rounded-2 shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-item-center">
                      <div class="col mr-2">
                        <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                          Data Transaksi
                        </div>
                        <div class="h5 mb-0 fw-bold text-gray-800">
                          <?php
                          require 'koneksi.php';
                          $pembelian = $koneksi->query("SELECT * FROM beli");
                          echo $beli = mysqli_num_rows($pembelian);
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border border-start border-0 border-danger border-3 rounded-2 shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-item-center">
                      <div class="col mr-2">
                        <div class="text-xs fw-bold text-danger text-uppercase mb-1">
                          Total Transaksi
                        </div>
                        <div class="h5 mb-0 fw-bold text-gray-800">
                          <?php
                          require 'koneksi.php';
                          $pembelian = $koneksi->query("SELECT * FROM beli");
                          echo $beli = mysqli_num_rows($pembelian);
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="card-footer text-muted text-center">
            <p class="m-4 text-muted"> MIK ELTIBIZ &copy; 2021 </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Javascript -->
  <script src="../assets-5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Alert Jika Login Berhasil -->
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
<!-- Akhir Alert Login Berhasil -->

</html>