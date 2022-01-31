<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Create</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bts5/css/bootstrap.min.css">

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
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="create.php">Create Product</a>
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
        <div class="card rounded-0">
          <div class="card-header bg-dark text-light">
            <span class="fs-5">Create Product</span>
            <a href="product.php" class="btn-close btn-outline-light float-end"></a>
          </div>
          <div class="card-body">
            <form action="insert.php" method="post">
              <div class="form-group mb-2">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" required>
              </div>
              <div class="form-group mb-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Description" required></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" required>
              </div>
              <div class="form-group mb-2">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter Product Stock" required>
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- endContent -->

  <!-- JavaScript -->
  <script src="../bts5/js/bootstrap.bundle.min.js"></script>
</body>

</html>