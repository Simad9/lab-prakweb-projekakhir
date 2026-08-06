<?php
// session_start();
include './config/koneksi.php';
?>
<?php require './component/head-data.php' ?>

<title>Detail</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-grey py-2 px-4 shadow-lg">
    <a class="navbar-brand fw-bold text-putih fs-3" href="index.php">Dapur <span class="text-warning">Kita</span></a>
    <div class="ms-auto d-flex align-items-center gap-4">
      <div class="d-none d-lg-flex gap-4">
        <a class="text-decoration-none text-light nav-item" href="index.php">Home</a>
        <a class="text-decoration-none text-light nav-item" href="menu.php">Resep</a>
        <a class="text-decoration-none text-light nav-item" href="about.php">Tentang Kami</a>
      </div>
      <a href="login.php" class="btn-pill btn-pill-sm">Login</a>
    </div>
  </nav>

  <?php require './component/detailContentTwo.php' ?>
  <?php require './component/footer-data.php' ?>