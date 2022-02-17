<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Product</title>
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
            <span class="fs-5 fw-bold">Data Products</span>
            <a href="create.php" class="btn btn-sm btn-outline-primary mb-1 float-end rounded-1">Add New</a>
          </div>
          <div class="card-body">
            <table class="table table-striped border-light">
              <thead>
                <tr class="align-middle">
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Stock</th>
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
                $result = $koneksi->query("SELECT * FROM products");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                //
                $query = $koneksi->query("SELECT * FROM products LIMIT $mulai,
                 $jumlahPerpage");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle" style="height: 4rem;">
                    <td><?= $no++; ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['stock'] == 0 ? "<span class='badge bg-danger'>0</span>" : $row['stock']; ?></td>
                    <!-- tombol read edit delete -->
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-info rounded-1" data-bs-toggle="modal" data-bs-target="#readProduct<?= $row['id']; ?>">Read</button>

                      <!-- tombol edit -->
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editProduct<?= $row['id']; ?>">Edit</button>
                      <!-- batas tombol edit -->
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $row['id']; ?>">Delete</button>
                    </td>
                    <!-- batas tombol -->
                  </tr>
                  <!-- modal untuk hapus -->
                  <div class="modal fade" id="deleteProduct<?= $row['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Detele Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="delete.php" method="POST">
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <div class="modal-body">
                            <?php
                            $id = $row['id'];
                            $q = $koneksi->query("SELECT name FROM products WHERE id = '$id'");
                            $data = mysqli_fetch_assoc($q);
                            ?>
                            <p class="text-center fs-5">Data Product <?= $data['name']; ?> akan dihapus ? </p>
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
                  <div class="modal fade" id="editProduct<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="update.php" method="post">
                          <?php
                          $id = $row['id'];
                          $query = $koneksi->query("SELECT * FROM products WHERE id='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id" value="<?= $result['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="name">Product Name</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" value="<?= $result['name']; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                              <label for="description">Description</label>
                              <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Ddescription" required><?= $result['description']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="price">Price</label>
                              <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" value="<?= $result['price']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                              <label for="stock">Stock</label>
                              <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter Product Stock" value="<?= $result['stock']; ?>" required>
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
                  <div class="modal fade" id="readProduct<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form action="" method="">
                          <?php
                          $id = $row['id'];
                          $query = $koneksi->query("SELECT * FROM products WHERE id='$id'");
                          $result = mysqli_fetch_assoc($query);
                          ?>
                          <input type="hidden" name="id" value="<?= $result['id']; ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Detail Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-2">
                              <label for="name">Product Name</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" value="<?= $result['name']; ?>" disabled>
                            </div>
                            <div class="form-group mb-2">
                              <label for="description">Description</label>
                              <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Ddescription" disabled><?= $result['description']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                              <label for="price">Price</label>
                              <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" value="<?= $result['price']; ?>" disabled>
                            </div>
                            <div class="form-group mb-3">
                              <label for="stock">Stock</label>
                              <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter Product Stock" value="<?= $result['stock']; ?>" disabled>
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
                      <a href="product.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                  <?php
                  } else {
                  ?>
                    <li class="page-item">
                      <a href="product.php?page=<?= $i; ?>" class="page-link">
                        <?= $i; ?>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>">
                  <a class="page-link" href="product.php?page=<?= $page + 1; ?>">
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
<!-- pesan insert -->
<?php if (isset($_GET['success-insert'])) { ?>
  <script>
    swal({
      title: "SUKSES!",
      text: "Data baru berhasil ditambahkan!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>
<!-- pesan update -->
<?php if (isset($_GET['success-update'])) { ?>
  <script>
    swal({
      title: "UPDATE!",
      text: "Data berhasil diupdate!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>
<!-- pesan delete -->
<?php if (isset($_GET['success-delete'])) { ?>
  <script>
    swal({
      title: "DELETE!",
      text: "Data berhasil dihapus!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php } ?>

</html>