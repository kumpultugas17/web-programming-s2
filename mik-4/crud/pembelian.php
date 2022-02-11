<?php
session_start();

if ($_SESSION['username'] == "") {
  header('Location: login.php?msg=login');
}
?>
<!-- di atas adalah perintah untuk mengembalikan ke halaman login jika belum ada aktifitas login -->

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
  <!-- memasukkan elemen file navbar.php -->
  <?php require_once 'navbar.php'; ?>

  <!-- Content -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-dark">
            <span class="text-light fs-5">DATA PEMBELIAN</span>
            <button type="button" class="btn btn-outline-primary float-end" data-bs-target="#modalTransaksi" data-bs-toggle="modal">Transaksi</button>
          </div>
          <div class="card-body">
            <!-- bagian pesan -->
            <?php if (isset($_GET['berhasil_hapus'])) { ?>
              <div class="alert alert-success">Data berhasil dihapus!</div>
            <?php } ?>
            <!-- batas bagian pesan -->
            <table class="table table-striped border-light">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Tanggal</th>
                  <th class="text-center" style="width: 12rem;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require 'koneksi.php';
                $jumlahPerpage = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                $query = $koneksi->query("SELECT * FROM pembelian p LEFT JOIN barang b ON b.id = p.barang_id LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle" style="height: 60px;">
                    <!-- menghitung total harga -->
                    <?php $total = $row['harga'] * $row['jumlah']; ?>

                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= $total; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-sm btn-info">Detail</a>
                      <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $row['id']; ?>">Edit</button>

                      <!-- triggel modal hapus -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id']; ?>">Hapus</button>
                    </td>
                  </tr>
                  <!-- modal hapus -->
                  <div class="modal fade" id="modalhapus<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <p class="fs-4 fw-bold text-center mt-3">HAPUS DATA</p>
                        <hr>
                        <p class="fs-6 text-center mt-1">Data ini aka dihapus ?</p>
                        <form action="delete.php" method="POST">
                          <input type="hidden" name="id" value="<?= $row['id']; ?>">
                          <div class="row">
                            <div class="col-sm-12 mt-1 mb-3 text-center">
                              <button type="submit" name="submit" class="btn btn-sm btn-success">Ya</button>
                              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Tidak</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal hapus  -->

                  <!-- modal edit -->
                  <div class="modal fade" id="modaledit<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <!-- form untuk edit -->
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
                              <input type="text" class="form-control" name="nama" id="nama" value="<?= $result['nama']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="deskripsi">Deskripsi</label>
                              <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required><?= $result['deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="harga">Harga</label>
                              <input type="number" class="form-control" name="harga" id="harga" value="<?= $result['harga']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="stok">Stok</label>
                              <input type="number" class="form-control" name="stok" id="stok" value="<?= $result['stok']; ?>" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-sm btn-warning">Update</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
                        <!-- akhir form -->

                      </div>
                    </div>
                  </div>
                  <!-- end modal edit  -->

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

  <div class="modal fade" id="modalTransaksi" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="post">
          <div class="modal-header">
            <h5 class="modal-title">Transaksi</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="id_barang">Nama Barang</label>
              <select name="id_barang" id="id_barang" class="form-select">
                <option disabled selected>Pilih Barang</option>
                <?php
                $barang = $koneksi->query("SELECT * FROM barang");
                foreach ($barang as $brg) :
                ?>
                  <option value="<?= $brg['id'] ?>"><?= $brg['nama'] ?></option>
                <?php
                endforeach
                ?>
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
            <button class="btn btn-primary" name="btn_beli" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>