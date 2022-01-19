<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets-5.1.3/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_barang.php">Data Barang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Tabel Data -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <!-- card -->
        <div class="card rounded-1 border-light shadow-sm">
          <!-- card-header -->
          <div class="card-header bg-dark text-light">
            <span class="fs-4 fw-bold">Data Barang</span>
            <button type="button" class="btn btn-sm btn-primary float-end mb-1">Tambah</button>
          </div>
          <!-- card-body -->
          <div class="card-body">
            <table class="table border-light">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                $query = $koneksi->query("SELECT * FROM barang");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td>
                      <a href="" class="btn btn-sm btn-warning">Edit</a>
                      <a href="" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- end card -->

      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="../assets-5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>