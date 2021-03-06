<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA BARANG</title>
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

  <!-- Content -->
  <div class="container">
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
                  <th>ID</th>
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
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td class="text-center"><?= $row['stok']; ?></td>
                    <td class="text-center">
                      <!-- tombol detail -->
                      <button type="button" class="btn btn-sm btn-success rounded-1" data-bs-toggle="modal" data-bs-target="#detailProduct<?= $row['id']; ?>">Detail</button>
                      <!-- dibawah ini adalah tombol edit yang memanggil modal -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editProduct<?= $row['id']; ?>">Edit</button>
                      <!-- batas tombol edit  -->

                      <!-- modal trigger hapus -->
                      <button type="button" class="btn btn-sm btn-danger rounded-1" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id']; ?>">Hapus</button>
                      <!-- batal hapus -->
                    </td>
                  </tr>
                  <!-- modal untuk hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="row p-3">
                          <div class="col-12">
                            <h4 class="text-center">HAPUS DATA</h4>
                            <h6 class="text-center mb-3">Data ini akan dihapus ?</h6>
                            <div class="text-center">
                              <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <button type="submit" name="hapus" class="btn btn-sm btn-success">Ya</button>
                                <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm">Batal</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end modal hapus -->

                  <!-- modal untuk edit-->
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
                            <h5 class="modal-title" id="staticBackdropLabel">
                              Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="name">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Produk" value="<?= $result['nama']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="deskripsi">Deskripsi</label>
                              <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Masukkan Deskripsi" required><?= $result['deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="price">Harga</label>
                              <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga" value="<?= $result['harga']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="stock">Stok</label>
                              <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok" value="<?= $result['stok']; ?>" required>
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
                  <!-- end modal -->

                  <!-- modal untuk detail-->
                  <div class="modal fade" id="detailProduct<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="" method="">
                          <?php
                          $id = $row['id'];
                          $query = $koneksi->query("SELECT * FROM barang WHERE id='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id" value="<?= $result['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                              Detail Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="name">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Produk" value="<?= $result['nama']; ?>" disabled>
                            </div>
                            <div class="form-group mb-2">
                              <label for="deskripsi">Deskripsi</label>
                              <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Masukkan Deskripsi" disabled><?= $result['deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="price">Harga</label>
                              <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga" value="<?= $result['harga']; ?>" disabled>
                            </div>
                            <div class="form-group mb-3">
                              <label for="stock">Stok</label>
                              <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok" value="<?= $result['stok']; ?>" disabled>
                            </div>
                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                <?php } ?>
              </tbody>
            </table>
            <!-- page/halaman -->
            <nav aria-label="Page navigation">
              <ul class="pagination float-end">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                  <a class="page-link" href="barang.php?page=<?= $page - 1; ?>">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                  if ($i != $page) {
                ?>
                    <li class="page-item">
                      <a href="barang.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                  <?php
                  } else {
                  ?>
                    <li class="page-item">
                      <a href="barang.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a class="page-link" href="barang.php?page=<?= $page + 1; ?>">Next</a>
                </li>
              </ul>
            </nav>
            <!-- end page/halaman -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- encContent -->

  <!-- JavaScript -->
  <script src="../bts5/js/bootstrap.bundle.min.js"></script>
</body>
<!-- pesan insert -->
<?php if (isset($_GET['berhasil'])) { ?>
  <script>
    swal({
      title: "Success Insert!",
      text: "Data barang berhasil ditambahkan!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>
<!-- pesan update -->
<?php if (isset($_GET['update-success'])) { ?>
  <script>
    swal({
      title: "Success Update!",
      text: "Data barang berhasil diupdate!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>
<!-- pesan delete -->
<?php if (isset($_GET['delete-success'])) { ?>
  <script>
    swal({
      title: "Success Delete!",
      text: "Data barang berhasil dihapus!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>

</html>