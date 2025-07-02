<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login - Sistem Arsip Digital</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">

              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login ke Sistem</h5>
                  <p class="text-center small">Masukkan username & password Anda</p>
                </div>

                <?php if (!empty($error)): ?>
                  <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form class="row g-3 needs-validation" novalidate method="post" action="<?= site_url('auth/login') ?>">

                  <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>

                </form>

              </div>
            </div>

            <div class="credits text-center">
              © <?= date('Y') ?> Sistem Arsip Digital
            </div>

          </div>
        </div>
      </div>
    </section>

  </div>
</main>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>
</html>
