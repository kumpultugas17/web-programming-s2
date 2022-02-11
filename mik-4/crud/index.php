<?php
session_start();

if ($_SESSION['username'] == "") {
    header('Location: login.php?msg=login');
}
?>
<!-- di atas adalah perintah untuk mengembalikan ke halaman login jika belum ada aktifitas login -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- Dependencies sweet alert -->
    <script src="../bootstrap/js/jquery-3.4.1.slim.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/sweetalert.min.js"></script>

</head>

<body>
    <!-- memasukkan elemen file navbar.php -->
    <?php require_once 'navbar.php'; ?>


    <!-- main -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark align-middle">
                        <div class="card text-left">
                            <div class="card-header">
                                Dashboard
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Hallo, Admin <?php echo $_SESSION['name']; ?> !</h5>
                                <p class="card-text">Selamat datang di Halaman Admin! </p>
                                <p class="card-text">Anda dapat mengelola data di halaman ini. </p>

                            </div>
                            <div class="card-footer text-muted text-center">
                                <p class="mt-5 mb-3 text-muted"> MIK 4 ELTIBIZ &copy; 2022 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- JavaScript -->
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

<!-- alert jika login sukses -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'login') : ?>
    <script>
        swal({
            title: "Good Job!",
            text: "Login Berhasil!",
            icon: "success",
            button: false,
            timer: 2000
        });
    </script>
<?php endif; ?>
<!-- akhir alert login sukses -->

</html>