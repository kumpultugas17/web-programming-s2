<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORM PEMBELIAN</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bts5/css/bootstrap.min.css">
</head>

<body>
  <!-- memasukkan elemen dari navbar.php -->
  <?php require_once 'navbar.php'; ?>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card rounded-0">
          <div class="card-header bg-dark text-light">
            <span class="fs-5">FORM INPUT PEMBELIAN</span>
            <a href="barang.php" class="btn-close btn-outline-light float-end"></a>
          </div>
          <div class="card-body">
            <form action="insertbeli.php" method="POST">
              <div class="form-group mb-2">
                <label for="barang_id">Barang ID</label>
                <select name="barang_id" id="barang_id" class="form-select">
                  <option selected disabled>Pilih Nama Barang</option>
                  <?php
                  require 'koneksi.php';
                  $barang = $koneksi->query("SELECT * FROM barang");
                  foreach ($barang as $brg) :
                  ?>
                    <option value="<?= $brg['id']; ?>"><?= $brg['nama']; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Tentukan Jumlah" required>
              </div>
              <div class="form-group mb-2">
                <label for="tgl">Tanggal</label>
                <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Tentukan tgl disini" required>
              </div>

              <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
              <button type="reset" class="btn btn-sm btn-secondary">Batal</button>
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