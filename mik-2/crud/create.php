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
   <!-- memasukkan elemen navbar -->
   <?php require_once 'navbar.php' ?>

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