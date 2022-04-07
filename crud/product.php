<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Data</title>

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">

  <!-- Style -->
  <style>
    * {
      font-family: 'Quicksand';
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Application</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">Create Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="product.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->

  <!-- container -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card rounded-1">
          <div class="card-header bg-dark text-light">
            <span class="fs-5">Product</span>
            <a href="create.php" class="btn btn-sm btn-primary rounded-1 float-end">Add New</a>
          </div>
          <div class="card-body">
            <!-- alert/pesan -->
            <?php if (isset($_GET['success-insert'])) { ?>
              <div class="alert alert-success" role="alert">
                Data added <span class="alert-link">successfully</span>.
              </div>
            <?php } ?>
            <?php if (isset($_GET['success-update'])) { ?>
              <div class="alert alert-success" role="alert">
                Data has been <span class="alert-link">changed</span> successfully.
              </div>
            <?php } ?>
            <?php if (isset($_GET['success-delete'])) { ?>
              <div class="alert alert-danger" role="alert">
                Data <span class="alert-link">deleted</span> successfully.
              </div>
            <?php } ?>
            <!-- end alert -->

            <!-- table -->
            <table class="table table-striped table-responsive border-light">
              <thead>
                <tr>
                  <th style="width: 2rem;" class="text-center">#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th class="text-center">Stock</th>
                  <th style="width: 12rem;" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php require 'conn.php';
                $jumlahPerpage = 10;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $jumlahPerpage) - $jumlahPerpage : 0;
                $result = $koneksi->query("SELECT * FROM products");
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $jumlahPerpage);
                $sql = $koneksi->query("SELECT * FROM products LIMIT $mulai, $jumlahPerpage");
                $no = 1;
                ?>
                <!-- foreach -->
                <?php foreach ($sql as $row) { ?>
                  <tr style="height: 60px;" class="align-middle">
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td class="text-center"><?= $row['stock'] ?></td>
                    <td class="text-center">
                      <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info rounded-1">Read</a>
                      <button type="button" class="btn btn-sm btn-warning rounded-1" data-bs-toggle="modal" data-bs-target="#editProduct<?= $row['id']; ?>">Edit</button>
                      <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger rounded-1">Delete</a>
                    </td>
                  </tr>

                  <!-- modal -->
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
                  <!-- end modal -->
                <?php } ?>
                <!-- end foreach -->

              </tbody>
            </table>
            <!-- end table -->

            <!-- page/halaman -->
            <nav aria-label="Page navigation example">
              <ul class="pagination float-end">
                <li class="page-item <?= $page == 1  ? 'disabled' : '' ?>">
                  <a class="page-link" href="product.php?page=<?= $page - 1; ?>">Previous</a>
                </li>
                <?php
                for ($i = 1; $i <= $pages; $i++) :
                  if ($i != $page) {
                ?>
                    <li class="page-item"><a class="page-link" href="product.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                  <?php
                  } else {
                  ?>
                    <li class="page-item"><a class="page-link" href="product.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php
                  }
                endfor
                ?>
                <li class="page-item <?= $page == $pages ? 'disabled' : '' ?>"><a class="page-link" href="product.php?page=<?= $page + 1; ?>">Next</a></li>
              </ul>
            </nav>
            <!-- end page/halaman -->

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end container -->

  <!-- Script Bootstrap -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html>