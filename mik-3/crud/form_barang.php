<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORM BARANG</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <?php require_once 'navbar.php'; ?>
  <!-- endNavbar -->

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-dark text-light">
            <span class="fs-5">Form Input Barang</span>
            <a href="barang.php" class="btn-close btn-outline-light float-end"></a>
          </div>
          <div class="card-body">
            <form action="proses_simpan.php" method="POST">
              <div class="form-group mb-2">
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" class="form-control" required>
              </div>
              <div class="form-group mb-2">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Barang" class="form-control" rows="5"></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga Barang" required>
              </div>
              <div class="form-group mb-3">
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok Barang" required>
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
              <button type="reset" class="btn btn-sm btn-secondary">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->

  <!-- JavaScript -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>