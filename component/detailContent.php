 </nav>
 <!-- END NAVBAR -->

 <!-- Main Section -->
 <?php
  $id_resep = $_GET["id_resep"];

  $query = "SELECT * FROM users u, resep r WHERE u.id_user = r.id_user AND r.id_resep = $id_resep";

  $hasil = mysqli_query($konek, $query);

  if (mysqli_num_rows($hasil) === 0) {
    echo '<div class="container py-5 text-center">
      <i class="bi bi-exclamation-triangle" style="font-size: 3rem; color: var(--kuning);"></i>
      <h3 class="mt-3 fw-bold">Data tidak ditemukan</h3>
      <a href="menuSudahLogin.php" class="btn-pill mt-3">Kembali ke Resep</a>
    </div>';
    die;
  }
  $data = mysqli_fetch_array($hasil);
  $penulis = trim($data['namaLengkap']) !== '' ? trim($data['namaLengkap']) : $data['username'];
  ?>

 <section class="container py-4">
   <a href="menuSudahLogin.php" class="text-decoration-none text-grey2 d-inline-flex align-items-center gap-2 mb-3">
     <i class="bi bi-arrow-left"></i> Kembali ke Resep
   </a>

   <!-- HERO -->
   <div class="detail-hero rounded-4 shadow-lg">
     <img src="./img/resep/<?= $data['foto'] ?>" alt="Foto Resep" class="detail-hero-img">
     <div class="detail-hero-overlay">
       <span class="badge-pill">Resep</span>
       <h1 class="fw-bold mb-2"><?= $data['judul'] ?></h1>
       <div class="d-flex align-items-center gap-3 flex-wrap">
         <span><i class="bi bi-person-circle me-1"></i><?= $penulis ?></span>
         <span><i class="bi bi-calendar3 me-1"></i><?= date('d F Y', strtotime($data['tgl_pembuatan'])) ?></span>
       </div>
     </div>
   </div>

   <!-- DESKRIPSI -->
   <div class="kotak shadow mt-4">
     <h2 class="fs-3 section-title"><i class="bi bi-card-text"></i> Deskripsi</h2>
     <div class="garis"></div>
     <p class="m-0"><?= $data['deskripsi'] ?></p>
   </div>

   <!-- BAHAN-BAHAN -->
   <div class="kotak shadow mt-4">
     <h2 class="fs-3 section-title"><i class="bi bi-basket"></i> Bahan-bahan</h2>
     <div class="garis"></div>
     <?= $data['bahan_bahan'] ?>
   </div>

   <!-- CARA PEMBUATAN -->
   <div class="kotak shadow mt-4">
     <h2 class="fs-3 section-title"><i class="bi bi-list-ol"></i> Cara Pembuatan</h2>
     <div class="garis"></div>
     <?= $data['cara_pembuatan'] ?>
   </div>

   <!-- DITULIS OLEH -->
   <div class="kotak shadow mt-4">
     <h2 class="fs-3 section-title"><i class="bi bi-person-heart"></i> Ditulis Oleh</h2>
     <div class="garis"></div>
     <div class="d-flex gap-3 align-items-center mb-3">
       <img src="img/profile/<?= $data['profilePicture'] ?>" alt="" class="profileDitulis">
       <div>
         <h6 class="fs-5 mb-0 fw-bold"><?= $penulis ?></h6>
         <p class="m-0 text-grey2">pada <?= date('d F Y', strtotime($data['tgl_pembuatan'])) ?></p>
       </div>
     </div>
     <p class="my-0"><?= $data['headline'] ?></p>
   </div>

   <!-- RESEP LAIN -->
   <div class="kotak shadow mt-4">
     <h2 class="fs-3 section-title"><i class="bi bi-book"></i> Resep lain dari penulis</h2>
     <div class="garis"></div>
     <div class="d-flex flex-wrap gap-3 mt-3">
       <?php
        $id_user = $data['id_user'];
        $query = "SELECT id_resep, foto, judul FROM resep WHERE id_user = $id_user";
        $hasil = mysqli_query($konek, $query);
        while ($resep = mysqli_fetch_array($hasil)) :
        ?>
         <a href="detail.php?id_resep=<?= $resep['id_resep'] ?>" class="resep-lain">
           <img src="img/resep/<?= $resep['foto'] ?>" alt="" class="gambar-card">
           <p class="mb-0 mt-2 text-center text-putih"><?= $resep['judul'] ?></p>
         </a>
       <?php endwhile; ?>
     </div>
   </div>
 </section>
