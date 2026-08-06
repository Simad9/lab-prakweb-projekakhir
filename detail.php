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
  <nav class="navbar bg-grey py-2 px-5 shadow-lg d-flex align-items-center">
    <h1 class="my-2 text-putih fs-2">Dapur Kita</h1>
    <div class="d-flex gap-4">
      <a class="text-decoration-none text-light nav-item" href="homepage.php">Home</a>
      <a class="text-decoration-none text-light nav-item" href="menuSudahLogin.php">Resep</a>
      <a class="text-decoration-none text-light nav-item" href="aboutSudahLogin.php">Tentang Kami</a>
    </div>
    <div class="d-flex justify-content-center align-items-center gap-3">
      <i class="bi bi-search fs-5 text-putih"></i>
      <a href="dashboard.php">
        <img src="img/profile/<?= $_SESSION['profilePicture'] ?>" alt="" class="profilePicture">
      </a>
    </div>


    <?php require './component/detailContent.php' ?>
    <?php require './component/footer-data.php' ?>