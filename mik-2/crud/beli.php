<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembelian</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bts5/css/bootstrap.min.css">
  <!-- Dependencies SweetAlert -->
  <script src="../bts5/js/jquery-3.4.1.slim.min.js"></script>
  <script src="../bts5/js/popper.min.js"></script>
  <script src="../bts5/js/sweetalert.min.js"></script>
</head>

<body>
  <!-- memasukkan elemen navbar -->
  <?php require_once 'navbar.php' ?>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card border-light shadow-sm rounded-1">
          <div class="card-header bg-dark text-light">
            <span class="fs-5 fw-bold">Data Pembelian</span>
            <a href="createbeli.php" class="btn btn-sm btn-outline-primary mb-1 float-end rounded-1">Add New</a>
          </div>
          <div class="card-body">
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
                $result = $koneksi->query("SELECT * FROM beli p LEFT JOIN products b ON b.id = p.barang_id");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                //
                $query = $koneksi->query("SELECT * FROM beli p LEFT JOIN products b ON b.id = p.barang_id LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <!-- menghitung total harga -->
                  <?php $total_harga = $row['price'] * $row['jumlah'] ?>

                  <tr class="align-middle" style="height: 4rem;">
                    <td><?= $no++; ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $total_harga ?></td>
                    <td><?= $row['tgl'] ?></td>

                    <!-- tombol read edit delete -->
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-info rounded-1" data-bs-toggle="modal" data-bs-target="#readProduct<?= $row['id_beli']; ?>">Read</button>

                      <!-- tombol edit -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editProduct<?= $row['id_beli']; ?>">Edit</button>
                      <!-- batas tombol edit -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $row['id_beli']; ?>">Delete</button>
                    </td>
                    <!-- batas tombol -->
                  </tr>
                  <!-- modal untuk hapus -->
                  <div class="modal fade" id="deleteProduct<?= $row['id_beli']; ?>" tabindex="-1">
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
                  <div class="modal fade" id="editProduct<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                  <div class="modal fade" id="readProduct<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                  <a class="page-link" href="product.php?page=<?= $page - 1; ?>">
                    Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                  if ($i != $page) {
                ?>
                    <li class="page-item">
                      <a href="beli.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                  <?php
                  } else {
                  ?>
                    <li class="page-item">
                      <a href="beli.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a class="page-link" href="beli.php?page=<?= $page + 1; ?>">
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

  <!-- JavaScript -->
  <script src="../bts5/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Alert Jika Berhasil Beli -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'sukses_beli') : ?>
  <script>
    swal({
      title: "Success",
      text: "Berhasil melakukan transaksi baru!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif ?>
<!-- Akhir Alert Berhasil Beli -->

<!-- update -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'update_beli') : ?>
  <script>
    swal({
      title: "Success",
      text: "Berhasil mengedit transaksi!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif ?>
<!-- endUpdate -->

<!-- delete -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'delete_beli') : ?>
  <script>
    swal({
      title: "Success",
      text: "Berhasil menghapus transaksi!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif ?>
<!-- endDelete -->

<!-- delete -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'stok_kurang') : ?>
  <script>
    swal({
      title: "PERINGATAN",
      text: "Silahkan cek stok barang!",
      icon: "warning",
      button: false,
      timer: 2000
    });
  </script>
<?php endif ?>
<!-- endDelete -->

</html>