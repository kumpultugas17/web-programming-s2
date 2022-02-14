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

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p class="display-6 alert alert-success">Selamat Datang Admin, <strong><?php echo $_SESSION['name']; ?></strong>!</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
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
                  $barang = $koneksi->query("SELECT * FROM products");
                  echo mysqli_num_rows($barang);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
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
                  $transaksi = $koneksi->query("SELECT * FROM beli");
                  echo mysqli_num_rows($transaksi);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
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
                  $total = $koneksi->query("SELECT * FROM beli b LEFT JOIN products p ON p.id = b.barang_id");
                  foreach ($total as $row) {
                    $ttl[] = $row['price'] * $row['jumlah'];
                  }
                  echo "Rp " . number_format(array_sum($ttl), 0, ',', '.');
                  ?>
                </div>
              </div>
            </div>
          </div>
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