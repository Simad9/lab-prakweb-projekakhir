<?php
session_start();
?>
<?php require './php/session.php' ?>
<?php require './component/head-data.php' ?>

<title>Edit Profile</title>
</head>

<body>

  <section class="d-flex h-100dvh">
    <!-- NAVBAR -->
    <div class="kiri col-3 bg-grey d-flex flex-column justify-content-center position-fixed h-100">
      <a href="homepage.php">
        <h1 class="text-center text-putih mt-5 mb-4">Dapur Kita</h1>
      </a>
      <div class="p-2 mt-2 d-flex flex-column justify-content-between h-100">

        <div class="tempat-nav-item d-flex flex-column gap-1">
          <a class="text-decoration-none" href="dashboard.php">
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation px-3 cursor-pointe">
              <i class="bi bi-grid fs-3"></i>
              <h4>Resep Saya</h4>
            </div>
          </a>
          <a class="text-decoration-none" href="tambah.php">
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation  px-3 cursor-pointer">
              <i class="bi bi-plus-lg fs-3"></i>
              <h4>Tambah Resep</h4>
            </div>
          </a>
          <a class="text-decoration-none" href="editProfile.php">
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation active px-3 cursor-pointe">
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
            <div class="wadah kotakv3 shadow">
              <div class="mx-2 mt-2">
                <h2>Edit Profile</h2>
                <div class="garis"></div>
              </div>

              <!-- CONTAIN -->
              <?php
              include './config/koneksi.php';
              $id_user = $_SESSION['id_user'];
              $hasil = mysqli_query($konek, "SELECT * FROM users WHERE id_user =  $id_user");
              $data = mysqli_fetch_array($hasil);
              ?>

              <form action="./php/editProfile.php" method="post" enctype="multipart/form-data" class="mx-2 my-3">
                <div class="upload-box">
                  <img src="./img/profile/<?= $_SESSION['profilePicture'] ?>" id="imageView" class="progilePictureView rounded-circle" alt="Foto Profile" />
                  <div class="upload-info">
                    <label for="file-upload" class="btn-pill cursor-pointer mb-2">
                      <i class="bi bi-image"></i> Ganti Foto
                    </label>
                    <p class="text-grey2 mb-0 small">Gambar profil sebaiknya memiliki rasio 1:1 dan ukuran maksimal 5MB.</p>
                  </div>
                  <input id="file-upload" type="file" name="profilePicture" accept="image/*" onchange="loadFile(event)" hidden required />
                </div>

                <div class="row mt-4">
                  <div class="col-md-6">
                    <label class="form-label-custom">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="namaLengkap" value="<?= $data['namaLengkap'] ?>" required />
                  </div>
                  <div class="col-md-6 mt-3 mt-md-0">
                    <label class="form-label-custom">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $data['username'] ?>" />
                  </div>
                  <div class="col-md-6 mt-3">
                    <label class="form-label-custom">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $data['email'] ?>" />
                  </div>
                  <div class="col-md-6 mt-3">
                    <label class="form-label-custom">Headline</label>
                    <input type="text" class="form-control" placeholder="Contoh : Mahasiswa yang suka memasak" name="headline" value="<?= $data['headline'] ?>" required />
                  </div>
                </div>

                <div class="d-flex justify-content-center gap-2 mt-4">
                  <a href="dashboard.php" class="btn-cek btn-pill-sm">Batal</a>
                  <button type="submit" class="btn-pill">
                    <i class="bi bi-check2-circle"></i> Simpan
                  </button>
                </div>
              </form>
              <!-- END CONTAIN -->


            </div>
            <!-- END MAIN -->
          </div>
  </section>

  <script src="js/previewImg.js"></script>
</body>

</html>