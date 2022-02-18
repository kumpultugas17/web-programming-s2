<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DATA PEMBELIAN</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Dependencies sweet alert -->
  <script src="../bootstrap/js/jquery-3.4.1.slim.min.js"></script>
  <script src="../bootstrap/js/popper.min.js"></script>
  <script src="../bootstrap/js/sweetalert.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <?php require_once 'navbar.php'; ?>
  <!-- endNavbar -->

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-dark align-middle">
            <span class="text-light fs-5">DATA PEMBELIAN</span>
            <button type="button" class="btn btn-sm btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#modaltransaksi">Tambah</button>
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
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center" style="width: 12rem;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                $jumlahperpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahperpage) - $jumlahperpage : 0;
                $result = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahperpage);
                $query = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id LIMIT $mulai, $jumlahperpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle" style="height: 65px;">
                    <!-- menghitung harga total harga -->
                    <?php $total = $row['harga'] * $row['jumlah']; ?>

                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td class="text-center"><?= $total; ?></td>
                    <td class="text-center"><?= $row['tgl']; ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-sm btn-info">Detail</a>
                      <!-- tombol edit -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id_beli']; ?>">Edit</button>
                      <!-- akhir tombol edit -->
                      <!-- trigger modal hapus -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id_beli']; ?>">Hapus</button>
                    </td>
                  </tr>

                  <!-- modal hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content p-3">
                        <form action="hapus_beli.php" method="post">
                          <input type="hidden" name="id" value="<?= $row['id_beli']; ?>">
                          <input type="hidden" name="barang_id" value="<?= $row['barang_id'] ?>">
                          <input type="hidden" name="jumlah" value="<?= $row['jumlah'] ?>">
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

                  <!-- modal untuk edit -->
                  <div class="modal fade" id="modalEdit<?= $row['id_beli']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="update_beli.php" method="post">
                          <?php
                          $id = $row['id_beli'];
                          $query = $koneksi->query("SELECT * FROM pembelian WHERE id_beli='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id" value="<?= $result['id_beli']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="barang_id">Id Barang</label>
                              <input type="text" class="form-control" name="barang_id" id="barang_id" placeholder="Enter Product Name" value="<?= $result['barang_id']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="jumlah">Jumlah</label>
                              <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Silahkan masukkan jumlah" value="<?= $result['jumlah']; ?>" required>
                              <input type="hidden" name="tmp_jumlah" value="<?= $result['jumlah']; ?>">
                            </div>
                            <div class="form-group mb-3">
                              <label for="tgl">Tanggal</label>
                              <input type="date" class="form-control" name="tgl" id="tgl" value="<?= $result['tgl']; ?>" required>
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

  <!-- modaltransaksi -->
  <div class="modal fade" id="modaltransaksi" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="proses_beli.php" method="post">
          <div class="modal-header">
            <h5 class="modal-title">Transaksi</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama_barang">Nama Barang</label>
              <select name="nama_barang" id="nama_barang" class="form-select">
                <?php
                $barang = $koneksi->query("SELECT * FROM barang");
                foreach ($barang as $brg) {
                ?>
                  <option value="<?= $brg['id'] ?>"><?= $brg['nama'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="jumlah">Jumlah</label>
              <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
            <div>
              <label for="tgl">Tanggal</label>
              <input type="date" name="tgl" id="tgl" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary" name="btn_transaksi">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'proses_beli') : ?>
  <script>
    swal({
      title: "SUKSES!",
      text: "Transaksi berhasil diproses!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif; ?>

</html>