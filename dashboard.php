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
              $query = mysqli_query($konek, "SELECT * FROM resep WHERE id_user = $id_user");
              while ($row = mysqli_fetch_array($query)) {
              ?>

                <section class="food_section layout_padding d-inline-flex p-2">
                  <div class="filters-content">
                    <div class="row grid">
                      <div class="col-sm-6 col-lg-12 all food ">
                        <div class="box">
                          <div class="img-box">
                            <img src="./img/resep/<?= $row['foto']; ?>" alt="" />
                          </div>
                          <div class="detail-box">
                            <h5 class="text-center"><?= $row['judul']; ?></h5>
                            <!-- btn -->
                            <div class="d-flex flex-column justify-content-center align-content-center gap-2">
                              <div class="d-flex justify-content-center px-3 pt-2 gap-2">
                                <a href="./editResep.php?id_resep=<?= $row['id_resep']; ?>">
                                  <button class="btn-manual">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                  </button>
                                </a>
                                <a href="./php/hapus.php?id_resep=<?= $row['id_resep']; ?>">
                                  <button class="btn-hapus">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                  </button>
                                </a>
                              </div>
                              <div class="d-flex justify-content-center px-3 gap-2">
                                <a href="detail.php?id_resep=<?= $row['id_resep'] ?>">
                                  <button class="btn-cek">
                                    <i class="bi bi-clipboard"></i>
                                    Cek Resep
                                  </button>
                                </a>
                              </div>

                              <!-- End - btn -->
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                </section>
              <?php } ?>

              <!-- END CONTAIN -->
            </div>
            <!-- END MAIN -->
          </div>
  </section>


</body>

</html>