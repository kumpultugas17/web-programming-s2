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
  <?php
  // untuk memasukkan elemen dari file navbar
  require_once 'navbar.php';
  ?>

  <!-- Tabel Data -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <!-- card -->
        <div class="card rounded-1 border-light shadow-sm">
          <!-- card-header -->
          <div class="card-header bg-dark text-light">
            <span class="fs-4 fw-bold">Data Barang</span>
            <a href="form_barang.php" type="button" class="btn btn-sm btn-primary float-end mb-1">Tambah</a>
          </div>
          <!-- card-body -->
          <div class="card-body">
            <table class="table border-light">
              <thead>
                <tr>
                  <th class="text-center" style="width: 3rem;">#</th>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th class="text-center" style="width: 14rem;">Harga</th>
                  <th class="text-center" style="width: 7rem;">Stok</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                //pengaturan halaman
                $jumlahPerpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM barang");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                //
                $query = $koneksi->query("SELECT * FROM barang LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td class="text-center"><?= $row['harga'] ?></td>
                    <td class="text-center"><?= $row['stok'] ?></td>
                    <td class="text-center" style="width: 12rem;">
                      <a href="" class="btn btn-sm btn-info">Detail</a>
                      <!-- tombol edit -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editProduct<?= $row['id']; ?>">Edit</button>
                      <!-- akhir tombol edit -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusProduct<?= $row['id']; ?>">Hapus</button>
                    </td>
                  </tr>
                  <!-- modal untuk hapus -->
                  <div class="modal fade" id="hapusProduct<?= $row['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header bg-danger text-light">
                          <h5 class="modal-title">HAPUS DATA</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="delete.php" method="POST">
                          <div class="modal-body">
                            <p class="fs-5 text-center">Data ini akan dihapus ?</p>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <button type="submit" name="btn_hapus" class="btn btn-sm btn-success">Ya</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Tidak</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- modal untuk edit -->
                  <div class="modal fade" id="editProduct<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="update.php" method="post">
                          <?php
                          $id = $row['id'];
                          $query = $koneksi->query("SELECT * FROM barang WHERE id='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id" value="<?= $result['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="name">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Product Name" value="<?= $result['nama']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="desckripsi">Desckripsi</label>
                              <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Enter Ddeskripsi" required><?= $result['deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="harga">Harga</label>
                              <input type="number" class="form-control" name="harga" id="harga" placeholder="Enter Product harga" value="<?= $result['harga']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="stok">Stok</label>
                              <input type="number" class="form-control" name="stok" id="stok" placeholder="Enter Product stok" value="<?= $result['stok']; ?>" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-sm btn-warning">Update</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal untuk edit -->

                <?php } ?>
              </tbody>
            </table>
            <!-- page/halaman -->
            <nav aria-label="Page navigation">
              <ul class="pagination float-end">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                  <a class="page-link" href="data_barang.php?page=<?= $page - 1; ?>">
                    Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                  if ($i != $page) {
                ?>
                    <li class="page-item">
                      <a href="data_barang.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                  <?php
                  } else {
                  ?>
                    <li class="page-item">
                      <a href="data_barang.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a class="page-link" href="data_barang.php?page=<?= $page + 1; ?>">
                    Next</a>
                </li>
              </ul>
            </nav>
            <!-- end page/halaman -->
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