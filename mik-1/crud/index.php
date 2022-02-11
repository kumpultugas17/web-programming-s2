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
  <link rel="stylesheet" href="../bts5/css/bootstrap.min.css">

  <!-- Dependencies sweet alert -->
  <script src="../bts5/js/jquery-3.4.1.slim.min.js"></script>
  <script src="../bts5/js/popper.min.js"></script>
  <script src="../bts5/js/sweetalert.min.js"></script>
</head>

<body>
  <!-- memasukkan elemen dari navbar.php -->
  <?php require_once 'navbar.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h5 class="display-5">Selamat Datang, Admin <strong><?php echo $_SESSION['name']; ?></strong>!</h5>
        <p class="fs-5">Di Aplikasi Penjualan Sederhana</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
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
                  $query = $koneksi->query("SELECT * FROM barang");
                  echo $jumlah_data = mysqli_num_rows($query);
                  ?> item
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border border-start border-0 border-success border-3 rounded-2 shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-item-center">
              <div class="col mr-2">
                <div class="text-xs fw-bold text-success text-uppercase mb-1">
                  Data Transaksi
                </div>
                <div class="h5 mb-0 fw-bold text-gray-800">
                  <?php
                  $query_beli = $koneksi->query("SELECT * FROM pembelian");
                  echo $jumlah_beli = mysqli_num_rows($query_beli);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border border-start border-0 border-danger border-3 rounded-2 shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-item-center">
              <div class="col mr-2">
                <div class="text-xs fw-bold text-danger text-uppercase mb-1">
                  Total Transaksi
                </div>
                <div class="h5 mb-0 fw-bold text-gray-800">
                  <?php
                  $query_total = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id");
                  foreach ($query_total as $row) {
                    $total[] = $row['harga'] * $row['jumlah'];
                  }
                  echo "Rp. " . number_format(array_sum($total), 0, ',', '.');
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
<!-- alert jika login berhasil -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'login') : ?>
  <script>
    swal({
      title: "Good Job!",
      text: "Login Berhasil!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif; ?>
<!-- akhir alert login berhasil -->

</html>