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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
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
                        <a class="nav-link" href="form_barang.php">Tambah Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_barang.php">Data Barang</a>
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