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
  <main>
    <div class="d-flex justify-content-center pt-5">
      <div class="card border-0 shadow-sm rounded-0 mt-5" style="width: 400px;">
        <div class="card-header border-0 bg-primary bg-gradient">
          <h4 class="fw-bold text-center text-light mt-2">Please Sign In</h4>
        </div>
        <div class="card-body p-4">
          <form action="action_login.php" method="post">
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
              <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="pw" placeholder="Password" required>
              <label for="pw">Password</label>
            </div>
            <div class="d-grid gap-2">
              <a class="btn btn-primary" name="login" type="submit">Login</a>
            </div>
            <hr>
            <div class="text-center">
              <a href="register.php">Register</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Script Bootstrap -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>

</html>