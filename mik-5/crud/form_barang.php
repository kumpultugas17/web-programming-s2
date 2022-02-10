<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets-5.1.3/css/bootstrap.min.css">
</head>

<body>
    <?php
    // untuk memasukkan elemen dari file navbar
    require_once 'navbar.php';
    ?>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card rounded-0">
                    <div class="card-header bg-dark text-light">
                        <span class="fs-5">FORM INPUT BARANG</span>
                        <a href="data_barang.php" class="btn-close btn-outline-light float-end"></a>
                    </div>
                    <div class="card-body">
                        <form action="insert.php" method="POST">
                            <div class="form-group mb-2">
                                <label for="nama">Nama Barang</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Barang" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="5" placeholder="Tambahkan Deskripsi disini" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Tentukan Harga disini" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok Barang" required>
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