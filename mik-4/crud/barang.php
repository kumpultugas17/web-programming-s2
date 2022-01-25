<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA BARANG</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Application MIK-4</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_barang.php">Form Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="barang.php">Data Barang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- endNAvbar -->

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-dark">
            <span class="text-light fs-5">DATA BARANG</span>
            <a href="form_barang.php" class="btn btn-sm btn-outline-primary float-end">Tambah</a>
          </div>
          <div class="card-body">
            <table class="table table-striped border-light">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th class="text-center">Stok</th>
                  <th class="text-center" style="width: 12rem;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                $jumlahPerpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM barang");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                $query = $koneksi->query("SELECT * FROM barang LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle" style="height: 60px;">
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td class="text-center"><?= $row['stok']; ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-sm btn-info">Detail</a>
                      <a href="" class="btn btn-sm btn-warning">Edit</a>
                      <a href="" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                  <a href="barang.php?page=<?= $page - 1 ?>" class="page-link">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) :
                  if ($i != $page) {
                ?>
                    <li class="page-item">
                      <a href="barang.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                  <?php } else { ?>
                    <li class="page-item">
                      <a href="barang.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php
                  }
                endfor
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a href="barang.php?page=<?= $page + 1 ?>" class="page-link">Next</a>
                </li>
              </ul>
            </nav>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->

  <!-- Javascript -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>