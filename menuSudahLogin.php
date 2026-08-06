<?php
session_start();
include './config/koneksi.php';
?>
<?php require './php/session.php' ?>
<?php require './component/head-data.php' ?>
<?php require './component/menuTop.php' ?>
<!-- SUDAH LOGIN -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mx-auto">
    <li class="nav-item">
      <a class="nav-link" href="homepage.php">Home </a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="menuSudahLogin.php">Resep <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="aboutSudahLogin.php">Tentang Kami</span>
      </a>
    </li>
  </ul>

            <div class="user_option">
              <form class="form-inline">
                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>

              <a href="dashboard.php"> <img src="./img/profile/<?= $_SESSION['profilePicture'] ?>" class="profilePicture"> </a>

            </div>

          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section layout_padding">

    <div class="container">

      <div class="heading_container heading_center">
        <h2>Resep - resep</h2>
        <p class="heading_sub">Temukan inspirasi masakan dari para penulis Dapur Kita dan coba di dapurmu sendiri.</p>
      </div>

      <div class="search-wrap">
        <i class="bi bi-search"></i>
        <input type="text" id="cariResep" class="search-input" placeholder="Cari resep..." />
      </div>

      <div class="row mt-5">
        <!-- CARD -->
        <?php
        $query = mysqli_query($konek, "SELECT r.*, u.username, u.namaLengkap FROM resep r JOIN users u ON u.id_user = r.id_user ORDER BY r.tgl_pembuatan DESC");
        $jumlahResep = mysqli_num_rows($query);
        while ($row = mysqli_fetch_array($query)) {
          $penulis = trim($row['namaLengkap']) !== '' ? trim($row['namaLengkap']) : $row['username'];
        ?>
          <div class="col-sm-6 col-lg-4 card-resep" data-cari="<?= strtolower($row['judul'] . ' ' . $row['deskripsi']) ?>">

            <div class="box resep-card-hover">
              <div class="img-box">
                <img src="./img/resep/<?= $row['foto'] ?>" alt="<?= $row['judul'] ?>" />
              </div>
              <div class="detail-box">
                <h5><?= $row['judul'] ?></h5>

                <div class="penulis">
                  <i class="bi bi-person-circle"></i>
                  <span><?= $penulis ?></span>
                  <span class="dot">•</span>
                  <span><?= date('d M Y', strtotime($row['tgl_pembuatan'])) ?></span>
                </div>

                <div class="truncate-line-clamp">
                  <p><?= $row['deskripsi'] ?></p>
                </div>

                <a href="detail.php?id_resep=<?= $row['id_resep'] ?>" class="btn-pill">
                  Lanjut Baca <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>

          </div>
        <?php } ?>

        <?php if ($jumlahResep === 0) { ?>
          <div class="empty-state">
            <i class="bi bi-journal-x"></i>
            <h4>Belum ada resep</h4>
            <p>Resep akan muncul di sini setelah penulis menambahkannya.</p>
          </div>
        <?php } ?>
      </div>

  </div>
</section>
<!-- end food section -->

<script>
  const cariResep = document.getElementById('cariResep');
  cariResep.addEventListener('input', function () {
    const kata = cariResep.value.toLowerCase();
    document.querySelectorAll('.card-resep').forEach(function (card) {
      card.style.display = card.dataset.cari.includes(kata) ? '' : 'none';
    });
  });
</script>

<?php require './component/footer-data.php' ?>