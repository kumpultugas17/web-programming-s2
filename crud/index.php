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
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Application</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">Create Product</a>
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
  <!-- main -->
  <main class="bg-light py-5 shadow-sm">
    <div class="px-4 py-5 text-center">
      <img class="d-block mx-auto mb-4 rounded-circle" src="img/user.jpg" alt="" width="120" height="120">
      <h6 class="display-6 fw-bold">M IQBAL ADENAN</h6>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Web Programming | Manajemen Informatika Komputer</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-outline-primary btn-lg px-4 gap-3 shadow-sm">Primary button</button>
        </div>
      </div>
    </div>
  </main>
  <!-- end main -->

  <!-- Script Bootstrap -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html>