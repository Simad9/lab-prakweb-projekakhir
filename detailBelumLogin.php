<?php
// session_start();
include './config/koneksi.php';
?>
<?php require './component/head-data.php' ?>

<title>Detail</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar bg-grey py-2 px-5 shadow-lg d-flex align-items-center">
    <h1 class="my-2 text-putih fs-2">Dapur Kita</h1>
    <div class="d-flex gap-4">
      <a class="text-decoration-none text-light nav-item" href="index.php">Home</a>
      <a class="text-decoration-none text-light nav-item" href="menu.php">Resep</a>
      <a class="text-decoration-none text-light nav-item" href="about.php">Tentang Kami</a>
    </div>

    <div class="user_option">
      <form class="form-inline">
        <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
      <a href="login.php" class="order_online"> Login </a>
    </div>
    <?php require './component/detailContentTwo.php' ?>
    <?php require './component/footer-data.php' ?>