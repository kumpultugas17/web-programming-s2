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
      <a class="navbar-brand" href="#">Navbar</a>
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

  <?php
  require 'conn.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $koneksi->query("SELECT * FROM products WHERE id='$id'");
    $result = mysqli_fetch_assoc($query);
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h3 class="text-center mb-3 display-6 fw-bold">Detail Product</h3>
            <table class="table border-light">
              <tr class="border-top border-light">
                <td style="width: 150px;">Product Name</td>
                <td style="width: 50px;">:</td>
                <td><input type="text" name="product" class="form-control" value="<?= $result['name']; ?>" disabled></td>
              </tr>
              <tr>
                <td>Description</td>
                <td>:</td>
                <td><input type="text" name="product" class="form-control" value="<?= $result['description']; ?>" disabled></td>
              </tr>
              <tr>
                <td>Price</td>
                <td>:</td>
                <td><input type="text" name="product" class="form-control" value="<?= $result['price']; ?>" disabled></td>
              </tr>
              <tr>
                <td>Stock</td>
                <td>:</td>
                <td><input type="text" name="product" class="form-control" value="<?= $result['stock']; ?>" disabled></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><a href="product.php" class="btn btn-secondary btn-sm">Back</a></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script Bootstrap -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html>