<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- style -->
  <style>
    * {
      font-family: 'Quicksand';
    }
  </style>
</head>

<body class="bg-dark text-light">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: purple;">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">NAVBAR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Administrator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Users</a>
          </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                M. Iqbal Adenan
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li>
                  <hr class="m-0">
                </li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- endNavbar -->

  <!-- Main -->
  <div class="container py-5">
    <p class="display-5 fw-bold">SELAMAT DATANG, ...</p>
    <p class="display-6">Latihan Login Multi User</p>
    <p class="fs-5">Anda Login Sebagai <span class="fw-bold">Administrator</span></p>
  </div>
  <!-- endMain -->

  <!-- script -->
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>