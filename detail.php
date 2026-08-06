<?php
session_start();
include './config/koneksi.php';
?>
<?php require './php/session.php' ?>
<?php require './component/head-data.php' ?>

<title>Detail</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-grey py-2 px-4 shadow-lg">
    <a class="navbar-brand fw-bold text-putih fs-3" href="homepage.php">Dapur <span class="text-warning">Kita</span></a>
    <div class="ms-auto d-flex align-items-center gap-4">
      <div class="d-none d-lg-flex gap-4">
        <a class="text-decoration-none text-light nav-item" href="homepage.php">Home</a>
        <a class="text-decoration-none text-light nav-item" href="menuSudahLogin.php">Resep</a>
        <a class="text-decoration-none text-light nav-item" href="aboutSudahLogin.php">Tentang Kami</a>
      </div>
      <a href="dashboard.php" class="d-flex align-items-center gap-2 text-decoration-none">
        <img src="img/profile/<?= $_SESSION['profilePicture'] ?>" alt="" class="profilePicture">
        <span class="text-putih d-none d-md-inline"><?= $_SESSION['username'] ?></span>
      </a>
    </div>
  </nav>

  <?php require './component/detailContent.php' ?>
  <?php require './component/footer-data.php' ?>