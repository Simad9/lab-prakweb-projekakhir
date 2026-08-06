<?php
session_start();

$id_resep = $_GET["id_resep"];

include './config/koneksi.php';

$query = "SELECT * FROM `resep` WHERE id_resep ='$id_resep';";

$hasil = mysqli_query($konek, $query);
$data = mysqli_fetch_array($hasil);

?>
<?php require './php/session.php' ?>
<?php require './component/head-data.php' ?>

<title>Edit Resep</title>
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
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation px-3 cursor-pointer active">
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
            <div class="d-flex justify-content-start align-items-end gap-2 item-navigation px-3 cursor-pointer">
              <i class="bi bi-person-fill fs-3"></i>
              <h4>Edit Profile</h4>
            </div>
          </a>
        </div>

        <a class="text-decoration-none" href="login.php">
          <div class="d-flex justify-content-center align-items-end gap-2 item-navigation">
            <i class="bi bi-box-arrow-in-right fs-3"></i>
            <h4>Keluar</h4>

            <?php require './component/dashProfile.php' ?>
            <!-- MAIN -->
            <div class="wadah kotakv3 shadow">
              <div class="mx-2 mt-2">
                <h2>Edit Resep</h2>
                <div class="garis"></div>
              </div>

              <!-- CONTAIN -->
              <form action="./php/update.php" method="post" enctype="multipart/form-data" class="mx-2 my-3">
                <div class="upload-box">
                  <img src="./img/resep/<?= $data['foto'] ?>" id="imageView" class="gambar-resep-prev upload-preview" alt="Preview gambar" />
                  <div class="upload-info">
                    <label for="file-upload" class="btn-pill cursor-pointer mb-2">
                      <i class="bi bi-image"></i> Pilih Gambar
                    </label>
                    <p class="text-grey2 mb-0 small">PNG, JPG, atau WebP. Ukuran maksimal 5MB. Kosongkan jika tidak ingin mengganti.</p>
                  </div>
                  <input id="file-upload" name="foto" type="file" accept="image/*" onchange="loadFile(event)" hidden />
                </div>

                <input type="hidden" name="gambarLama" value="<?= $data['foto'] ?>">
                <input type="hidden" name="id_resep" value="<?= $data['id_resep'] ?>">

                <div class="row mt-4">
                  <div class="col-12">
                    <label for="judul" class="form-label-custom">Judul Makanan</label>
                    <input type="text" id="judul" name="judul" value="<?= $data['judul'] ?>" class="form-control" placeholder="Judul Makanan" />
                  </div>

                  <div class="col-12 mt-3">
                    <label for="deskripsi" class="form-label-custom">Deskripsi Singkat</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi singkat" style="height: 100px; resize: none"><?= $data['deskripsi'] ?></textarea>
                  </div>

                  <div class="col-12 mt-3">
                    <label class="form-label-custom">Bahan-bahan</label>
                    <textarea name="bahan_bahan" id="editor" class="form-control" placeholder="Bahan-bahan"><?= $data['bahan_bahan'] ?></textarea>
                  </div>

                  <div class="col-12 mt-3">
                    <label class="form-label-custom">Cara Pembuatan</label>
                    <textarea name="cara_pembuatan" id="editor" class="form-control" placeholder="Cara pembuatan"><?= $data['cara_pembuatan'] ?></textarea>
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