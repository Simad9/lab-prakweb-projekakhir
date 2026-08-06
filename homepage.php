<?php
session_start();
include './config/koneksi.php';
?>
<?php require './php/session.php' ?>
<?php require './component/head-data.php' ?>

<!-- SUDAH LOGIN -->
<title>Dapur Kita | Homepage</title>
<?php require './component/homeMainTop.php' ?>
<a class="nav-link" href="homepage.php">Home </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="menuSudahLogin.php">Resep</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="aboutSudahLogin.php">Tentang Kami</a>
</li>
</ul>

<div class="user_option">
  <form class="form-inline">
    <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>
  </form>
  <a href="dashboard.php"> <img src="./img/profile/<?= $_SESSION['profilePicture'] ?>" class="profilePicture"> </a>

  <?php require './component/homeMainMid.php' ?>
  <div class="row">
    <!-- CARD -->
    <?php
    $query = mysqli_query($konek, "SELECT * FROM resep");
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <div class="col-sm-6 col-lg-4">

        <div class="box">
          <div>
            <div class="img-box">
              <img src="./img/resep/<?= $row['foto'] ?>" alt="" />
            </div>
            <div class="detail-box">
              <h5 class="text-center"><?= $row['judul'] ?></h5>

              <div class="truncate-line-clamp">
                <p><?= $row['deskripsi'] ?></p>
              </div>

              <div class="btn-box">
                <a href="detail.php?id_resep=<?= $row['id_resep'] ?>" class="btn1"> Lanjut Baca </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    <?php } ?>
  </div>

  <div class="text-center btn-box">
    <a href="menuSudahLogin.php">Lihat Lainnya</a>
  </div>


  <?php require './component/homeMainBot.php' ?>
  <?php require './component/footer-data.php' ?>