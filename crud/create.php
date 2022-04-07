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
      <a class="navbar-brand" href="#">Application</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="create.php">Create Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->

  <!-- form -->
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
                <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Ddescription" required></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" required>
              </div>
              <div class="form-group mb-3">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter Product Stock" required>
              </div>
              <button class="btn btn-primary btn-sm" name="submit">Submit</button>
              <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end form -->

  <!-- Script Bootstrap -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html>