<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pembelian</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets-5.1.3/css/bootstrap.min.css">
</head>

<body>
  <?php
  // untuk memasukkan elemen dari file navbar
  require_once 'navbar.php';
  ?>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card border-light shadow-sm rounded-1">
          <div class="card-header bg-dark text-light">
            <span class="fs-5 fw-bold">Data Pembelian</span>
            <a href="form_beli.php" class="btn btn-sm btn-outline-primary mb-1 float-end rounded-1">Tambah</a>
          </div>
          <div class="card-body">
            <!-- pesan insert -->
            <?php if (isset($_GET['success-insert'])) { ?>
              <div class="alert alert-success">Data berhasil ditambahkan!</div>
            <?php } ?>
            <!-- pesan update -->
            <?php if (isset($_GET['success-update'])) { ?>
              <div class="alert alert-warning">Data berhasil di update!</div>
            <?php } ?>
            <!-- pesan delete -->
            <?php if (isset($_GET['success-delete'])) { ?>
              <div class="alert alert-danger">Data berhasil di hapus!</div>
            <?php } ?>
            <table class="table table-striped border-light">
              <thead>
                <tr class="align-middle">
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Tanggal</th>

                  <th class="text-center" style="width: 12rem;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                //untuk pengaturan halaman
                $jumlahPerpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM beli p LEFT JOIN barang b ON b.id = p.barang_id");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                //
                $query = $koneksi->query("SELECT * FROM beli p LEFT JOIN barang b ON b.id = p.barang_id LIMIT $mulai,
                 $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>

                  <tr class="align-middle" style="height: 4rem;">
                    <!-- menghitung total harga -->
                    <?php $total = $row['harga'] * $row['jumlah']; ?>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $total; ?></td>
                    <td><?= $row['tgl'] ?></td>

                    <!-- tombol read edit delete -->
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-info rounded-1" data-bs-toggle="modal" data-bs-target="#detailBeli<?= $row['id_beli']; ?>">Detail</button>

                      <!-- tombol edit -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editBeli<?= $row['id_beli']; ?>">Edit</button>
                      <!-- batas tombol edit -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusBeli<?= $row['id_beli']; ?>">Hapus</button>
                    </td>
                    <!-- batas tombol -->
                  </tr>
                  <!-- modal untuk hapus -->
                  <div class="modal fade" id="hapusBeli<?= $row['id_beli']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Detele Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="deletebeli.php" method="POST">
                          <input type="hidden" name="id_beli" value="<?= $row['id_beli'] ?>">
                          <div class="modal-body">
                            <?php
                            $id_beli = $row['id_beli'];
                            $q = $koneksi->query("SELECT barang_id FROM beli WHERE id_beli = '$id_beli'");
                            $data = mysqli_fetch_assoc($q);
                            ?>
                            <p class="text-center fs-5">Data Pembelian Product <?= $data['barang_id']; ?> akan dihapus ? </p>
                            <div class="text-center">
                              <button type="submit" name="btn_delete" class="btn btn-sm btn-success">YA</button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">TIDAK</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- modal untuk edit -->
                  <div class="modal fade" id="editBeli<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="updatebeli.php" method="post">
                          <?php
                          $id_beli = $row['id_beli'];
                          $query = $koneksi->query("SELECT * FROM beli WHERE id_beli='$id_beli'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id_beli" value="<?= $result['id_beli']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Pembelian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="barang_id">Barang ID</label>
                              <input type="text" class="form-control" name="barang_id" id="barang_id" placeholder="Enter Barang_id" value="<?= $result['barang_id']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="jumlah">Jumlah</label>
                              <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Enter Jumlah" value="<?= $result['jumlah']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tgl">Tanggal</label>
                              <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Enter Tanggal Pembelian" value="<?= $result['tgl']; ?>" required>
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
                  <!-- end modal untuk edit  -->

                  <!-- modal untuk Read -->
                  <div class="modal fade" id="detailBeli<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="" method="">
                          <?php
                          $id_beli = $row['id_beli'];
                          $query = $koneksi->query("SELECT * FROM beli WHERE id_beli='$id_beli'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id_beli" value="<?= $result['id_beli']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Detail Pembelian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="barang_id">Barang ID</label>
                              <input type="text" class="form-control" name="barang_id" id="barang_id" placeholder="Enter barang_id" value="<?= $result['barang_id']; ?>" disabled>
                            </div>
                            <div class="form-group mb-2">
                              <label for="jumlah">Jumlah</label>
                              <textarea name="jumlah" id="jumlah" rows="5" class="form-control" placeholder="Enter Jumlah" disabled><?= $result['jumlah']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tgl">Tanggal Beli</label>
                              <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Enter Product tgl" value="<?= $result['tgl']; ?>" disabled>
                            </div>

                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal untuk read  -->
                <?php } ?>
              </tbody>
            </table>
            <!-- page/halaman -->
            <nav aria-label="Page navigation">
              <ul class="pagination float-end">
                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                  <a class="page-link" href="data_beli.php?page=<?= $page - 1; ?>">
                    Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                  if ($i != $page) {
                ?>
                    <li class="page-item">
                      <a href="data_beli.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                  <?php
                  } else {
                  ?>
                    <li class="page-item">
                      <a href="data_beli.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a class="page-link" href="data_beli.php?page=<?= $page + 1; ?>">
                    Next</a>
                </li>
              </ul>
            </nav>
            <!-- end page/halaman -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->

  <!-- Javascript -->
  <script src="../assets-5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>