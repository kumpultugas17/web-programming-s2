<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA PEMBELIAN</title>
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
            <span class="text-light fs-5">DATA PEMBELIAN</span>
            <a href="form_beli.php" class="btn btn-sm btn-outline-primary float-end">Tambah</a>
          </div>
          <div class="card-body">
            <table class="table table-striped border-light">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Barang ID</th>
                  <th>Nama Barang </th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                  <th class="text-center" style="width: 12rem;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                $jumlahPerpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id ");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                $query = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id  LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr>
                    <!-- menhitung total harga -->
                    <?php $total = $row['harga'] * $row['jumlah']; ?>

                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['barang_id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= $row['tgl']; ?></td>
                    <td><?php echo $total; ?></td>


                    <td class="text-center">
                      <!-- tombol detail -->
                      <button type="button" class="btn btn-sm btn-info rounded-1" data-bs-toggle="modal" data-bs-target="#detailBeli<?= $row['id_beli']; ?>">Detail</button>
                      <!-- dibawah ini adalah tombol edit yang memanggil modal -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editBeli<?= $row['id_beli']; ?>">Edit</button>
                      <!-- batas tombol edit  -->

                      <!-- modal trigger hapus -->
                      <button type="button" class="btn btn-sm btn-danger rounded-1" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id_beli']; ?>">Hapus</button>
                      <!-- batal hapus -->
                    </td>
                  </tr>
                  <!-- modal untuk hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="row p-3">
                          <div class="col-12">
                            <h4 class="text-center">HAPUS DATA</h4>
                            <h6 class="text-center mb-3">Data ini akan dihapus ?</h6>
                            <div class="text-center">
                              <form action="deletebeli.php" method="post">
                                <input type="hidden" name="id_beli" value="<?= $row['id_beli']; ?>">
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
                  <div class="modal fade" id="editBeli<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="updatebeli.php" method="post">
                          <?php
                          $id = $row['id_beli'];
                          $query = $koneksi->query("SELECT * FROM pembelian WHERE id_beli='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id_beli" value="<?= $result['id_beli']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                              Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="nama">Barang ID</label>
                              <input type="text" class="form-control" name="barang_id" id="barang_id" placeholder="Masukan barang ID " value="<?= $result['barang_id']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="jumlah">Jumlah</label>
                              <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukan Jumlah " value="<?= $result['jumlah']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tgl">Tanggal</label>
                              <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Masukkan Tanggal" value="<?= $result['tgl']; ?>" required>
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
                  <div class="modal fade" id="detailBeli<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="" method="">
                          <?php
                          $id = $row['id_beli'];
                          $query = $koneksi->query("SELECT * FROM pembelian WHERE id_beli='$id'");
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
                              <label for="nama">Barang ID</label>
                              <input type="text" class="form-control" name="barang_id" id="barang_id" placeholder="Masukan barang ID " value="<?= $result['barang_id']; ?>" disabled>
                            </div>
                            <div class="form-group mb-2">
                              <label for="jumlah">Jumlah</label>
                              <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukan Jumlah " value="<?= $result['jumlah']; ?>" disabled>
                            </div>
                            <div class="form-group mb-2">
                              <label for="tgl">Tanggal</label>
                              <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Masukkan Tanggal" value="<?= $result['tgl']; ?>" disabled>
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
                      <a href="pembelian.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a class="page-link" href="pembelian.php?page=<?= $page + 1; ?>">Next</a>
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
      text: "Berhasil melakukan transaksi pembelian!",
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
      text: "Data transaksi pembelian berhasil dirubah!",
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
      text: "Data transaksi berhasil dihapus!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>

</html>