<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
  <section class="">
    <div class="vh-100 px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              The best offer <br />
              <span class="text-primary">for your business</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Eveniet, itaque accusantium odio, soluta, corrupti aliquam
              quibusdam tempora at cupiditate quis eum maiores libero
              veritatis? Dicta facilis sint aliquid ipsum atque?
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card border-0 border-top border-4 border-primary rounded rounded-3 shadow">
              <div class="card-body py-5 px-md-5">
                <form>
                  <!-- Nama Lengkap input -->
                  <div class="form-floating mb-4">
                    <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" id="nama_lengkap" class="form-control" />
                    <label for="nama_lengkap">Nama Lengkap</label>
                  </div>

                  <!-- Tempat lahir input -->
                  <div class="form-floating mb-4">
                    <input type="text" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" class="form-control" />
                    <label for="tempat_lahir">Tempat Lahir</label>
                  </div>

                  <!-- Tanggal lahir input -->
                  <div class="form-floating mb-4">
                    <input type="date" placeholder="Tanggal" name="tanggal_lahir" id="tanggal_lahir" class="form-control" />
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                  </div>

                  <!-- Alamat input -->
                  <div class="form-floating mb-4">
                    <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" id="alamat" style="height: 100px;"></textarea>
                    <label for="alamat">Alamat</label>
                  </div>

                  <!-- Telepon input -->
                  <div class="form-floating mb-4">
                    <input type="number" name="telp" placeholder="Telepon" id="telp" class="form-control" />
                    <label for="telp">Telepon</label>
                  </div>

                  <!-- Email input -->
                  <div class="form-floating mb-4">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" />
                    <label for="email">Email address</label>
                  </div>

                  <!-- Submit button -->
                  <div class="d-flex justify-content-center">
                    <button type="submit" name="btn_registrasi" class="btn btn-primary">
                      Sign up
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- script -->
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>