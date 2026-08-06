</head>

<body class="bg-login">
  <div class="d-flex flex-wrap justify-content-center min-vh-100 py-4 px-2">
    <div class="col-12 col-lg-7 d-flex flex-column justify-content-center align-items-center text-light mb-4 mb-lg-0">
      <div class="text-center">
        <h2 class="m-1">Selamat datang kembali di</h2>
        <h2 class="fs-1 fw-bold">Dapur <span class="text-warning">Kita</span></h2>
        <p class="opacity-75">Menjelajahi Rasa, Membagikan Kreativitas.</p>
        <a href="index.php" class="btn-pill mt-2">
          <i class="bi bi-house-door"></i> Kembali ke Beranda
        </a>
      </div>
    </div>
    <div class="col-12 col-lg-5 d-flex flex-column justify-content-center align-items-center">
      <div class="card-login">
        <?php
        if (isset($_GET["pesan"])) {
          $notif = [
            'berhasil' => ['Akun berhasil terdaftar, silakan masuk.', 'success'],
            'gagal' => ['Username atau password salah.', 'danger'],
            'keluar' => ['Anda berhasil keluar.', 'info'],
            'terdaftar' => ['Username sudah terdaftar, gunakan username lain.', 'warning'],
            'belum' => ['Silakan login terlebih dahulu.', 'warning'],
          ];
          if (isset($notif[$_GET["pesan"]])) {
            [$pesanText, $jenis] = $notif[$_GET["pesan"]];
            echo '<div class="alert alert-' . $jenis . ' alert-dismissible fade show py-2 small" role="alert">
              ' . $pesanText . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        }
        ?>
