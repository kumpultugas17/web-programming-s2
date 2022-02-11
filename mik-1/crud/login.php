<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bts5/css/bootstrap.min.css">

  <!-- Dependencies sweet alert -->
  <script src="../bts5/js/jquery-3.4.1.slim.min.js"></script>
  <script src="../bts5/js/popper.min.js"></script>
  <script src="../bts5/js/sweetalert.min.js"></script>

</head>

<body>
  <main>
    <div class="d-flex justify-content-center pt-5">
      <div class="card border-0 shadow-sm rounded-0 mt-5" style="width: 400px;">

        <div class="card-header border-0 bg-info bg-gradient">
          <h4 class="fw-bold text-center text-light mt-2">
            Halaman Login
          </h4>
        </div>
        <div class="card-body p-4">
          <form action="login_action.php" method="post">
            <div class="form-floating mb-3">
              <input type="text" name="username" class="form-control" id="username" placeholder="username" required>
              <label for="username">Your Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              <label for="password">Your Password</label>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-block btn-info">
                Sign in
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- JavaScript -->
  <script src="../bts5/js/bootstrap.bundle.min.js"></script>

</body>

<!-- alert jika login gagal -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'gagal') : ?>
  <script>
    swal({
      title: "Failed!",
      text: "Login Gagal!",
      icon: "error",
      button: false,
      timer: 2000
    });
  </script>
<?php endif; ?>
<!-- akhir alert login gagal -->

<!-- alert jika logout -->
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'logout') : ?>
  <script>
    swal({
      title: "Success!",
      text: "Logout Berhasil!",
      icon: "success",
      button: false,
      timer: 2000
    });
  </script>
<?php endif; ?>
<!-- akhir alert logout -->
</html>