<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Product</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets-5.1.3/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
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
        <div class="card border-light shadow-sm rounded-1">
          <div class="card-header bg-dark text-light">
            <span class="fs-5 fw-bold">Data Products</span>
            <a href="" class="btn btn-sm btn-outline-primary mb-1 float-end rounded-1">Add New</a>
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
                $query = $koneksi->query("SELECT * FROM products");
                $no = 1;
                foreach ($query as $row) {
                ?>
                  <tr class="align-middle"  style="height: 4rem;">
                    <td><?= $no++; ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-sm btn-info">Read</a>
                      <a href="" class="btn btn-sm btn-warning">Edit</a>
                      <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->

  <!-- JavaScript -->
  <script src="../assets-5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>