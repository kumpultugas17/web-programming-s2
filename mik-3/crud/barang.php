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
            <a class="nav-link" href="form_barang.php">Form Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="barang.php">Data Barang</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- endNavbar -->

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-dark align-middle">
            <span class="text-light fs-5">DATA BARANG</span>
            <a href="form_barang.php" class="btn btn-sm btn-outline-primary float-end">Tambah</a>
          </div>
          <div class="card-body">
            <!-- pesan tambah data -->
            <?php if (isset($_GET['berhasil'])) { ?>
              <div class="alert alert-success">Data berhasil ditambahkan!</div>
            <?php } ?>
            <!-- pesan hapus data -->
            <?php if (isset($_GET['hapus_berhasil'])) { ?>
              <div class="alert alert-success">Data berhasil dihapus!</div>
            <?php } ?>
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
                $jumlahperpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahperpage) - $jumlahperpage : 0;
                $result = $koneksi->query("SELECT * FROM barang");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahperpage);
                $query = $koneksi->query("SELECT * FROM barang LIMIT $mulai, $jumlahperpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle" style="height: 65px;">
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td class="text-center"><?= $row['stok']; ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-sm btn-info">Detail</a>
                      <a href="" class="btn btn-sm btn-warning">Edit</a>
                      <!-- trigger modal hapus -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id']; ?>">Hapus</button>
                    </td>
                  </tr>
                  <!-- modal hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content p-3">
                        <form action="proses_hapus.php" method="post">
                          <input type="hidden" name="id" value="<?= $row['id']; ?>">
                          <p class="fs-4 fw-bold text-center">HAPUS DATA</p>
                          <p class="fs-6 text-center">Data ini akan dihapus ?</p>
                          <div class="row">
                            <div class="col-sm-12 text-center">
                              <button type="submit" name="submit" class="btn btn-sm btn-success">Ya</button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Tidak</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- tutup modal hapus -->
                <?php } ?>
              </tbody>
            </table>
            <!-- Page/Halaman -->
            <nav>
              <ul class="pagination">
                <li class="page-item <?= $page == 1 ? 'disabled' : ''; ?>">
                  <a class="page-link" href="barang.php?page=<?= $page - 1; ?>">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) :
                  if ($i != $pages) {
                ?>
                    <li class="page-item">
                      <a class="page-link" href="barang.php?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                  <?php } else { ?>
                    <li class="page-item">
                      <a class="page-link" href="barang.php?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php
                  }
                endfor
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : ''; ?>">
                  <a class="page-link" href="barang.php?page=<?= $page + 1; ?>">Next</a>
                </li>
              </ul>
            </nav>
            <!-- endPage/Halaman -->
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