<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Create Beli</title>
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
            <form action="insertbeli.php" method="post">
              <div class="form-group mb-2">
                <label for="name">Barang ID</label>
                <input type="text" class="form-control" name="barang_id" id="barang_id" placeholder="Enter Barang ID" required>
              </div>
              <div class="form-group mb-2">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Enter Jumlah" required>
              </div>
              <div class="form-group mb-2">
                <label for="tgl">Tanggal Beli</label>
                <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Enter Tanggal Beli" required>
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