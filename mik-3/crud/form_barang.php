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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="form_barang.php">Form Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="barang.php">Data Barang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
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