<?php
session_start();
include './config/koneksi.php';
?>
<?php require './php/session.php' ?>
<?php require './component/head-data.php' ?>

<title>Dashboard</title>
</head>

<body>

  <section class="d-flex h-100dvh ">
    <!-- NAVBAR -->
    <div class="kiri col-3 bg-grey d-flex flex-column justify-content-center position-fixed h-100">
      <a href="homepage.php">
        <h1 class="text-center text-putih mt-5 mb-4">Dapur Kita</h1>
      </a>
      <div class="p-2 mt-2 d-flex flex-column justify-content-between h-100">

        <div class="tempat-nav-item d-flex flex-column gap-1">
          <a class="text-decoration-none" href="dashboard.php">
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation  px-3 cursor-pointer active">
              <i class="bi bi-grid fs-3"></i>
              <h4>Resep Saya</h4>
            </div>
          </a>
          <a class="text-decoration-none" href="tambah.php">
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation px-3 cursor-pointer">
              <i class="bi bi-plus-lg fs-3"></i>
              <h4>Tambah Resep</h4>
            </div>
          </a>
          <a class="text-decoration-none" href="editProfile.php">
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation px-3 cursor-pointe">
              <i class="bi bi-person-fill fs-3"></i>
              <h4>Edit Profile</h4>
            </div>
          </a>
        </div>

        <a class="text-decoration-none" href="login.php">
          <div class="d-flex justify-content-center align-items-end gap-2 item-navigation">
            <i class="bi bi-box-arrow-in-right fs-3 "></i>
            <h4>Keluar</h4>

            <?php require './component/dashProfile.php' ?>

            <!-- MAIN -->
            <div class="wadah kotakv3 shadow ">
              <div class="mx-2 mt-2">
                <h2>Resep Saya</h2>
                <div class="garis"></div>
              </div>

              <!-- CONTAIN -->
              <?php
              $id_user = $_SESSION["id_user"];
              $query = mysqli_query($konek, "SELECT * FROM resep WHERE id_user = $id_user ORDER BY tgl_pembuatan DESC");
              $jumlahResep = mysqli_num_rows($query);
              ?>

              <div class="mx-2 my-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                  <p class="m-0 text-grey2">Kamu punya <strong><?= $jumlahResep ?></strong> resep</p>
                  <a href="tambah.php" class="btn-pill btn-pill-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Resep
                  </a>
                </div>

                <?php if ($jumlahResep === 0) { ?>
                  <div class="empty-state">
                    <i class="bi bi-journal-plus"></i>
                    <h4>Belum ada resep</h4>
                    <p>Mulai bagikan resep pertamamu ke Dapur Kita.</p>
                    <a href="tambah.php" class="btn-pill">
                      <i class="bi bi-plus-lg"></i> Tambah Resep
                    </a>
                  </div>
                <?php } ?>

                <?php while ($row = mysqli_fetch_array($query)) { ?>
                  <div class="resep-saya">
                    <img src="./img/resep/<?= $row['foto']; ?>" alt="<?= $row['judul']; ?>" class="resep-saya-img" />
                    <div class="resep-saya-info">
                      <h5 class="mb-1"><?= $row['judul']; ?></h5>
                      <p class="text-grey2 mb-1"><i class="bi bi-calendar3 me-1"></i><?= date('d M Y', strtotime($row['tgl_pembuatan'])); ?></p>
                      <p class="truncate-line-clamp-2 mb-0"><?= $row['deskripsi']; ?></p>
                    </div>
                    <div class="resep-saya-aksi">
                      <a href="detail.php?id_resep=<?= $row['id_resep'] ?>" class="btn-manual btn-kecil">
                        <i class="bi bi-clipboard"></i> Cek
                      </a>
                      <a href="./editResep.php?id_resep=<?= $row['id_resep']; ?>" class="btn-cek btn-kecil">
                        <i class="bi bi-pencil-square"></i> Edit
                      </a>
                      <a href="./php/hapus.php?id_resep=<?= $row['id_resep']; ?>" class="btn-hapus btn-kecil" onclick="return confirm('Yakin ingin menghapus resep ini?')">
                        <i class="bi bi-trash"></i> Hapus
                      </a>
                    </div>
                  </div>
                <?php } ?>
              </div>

              <!-- END CONTAIN -->
            </div>
            <!-- END MAIN -->
          </div>
  </section>


</body>

</html>