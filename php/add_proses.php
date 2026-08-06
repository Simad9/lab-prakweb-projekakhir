<?php
session_start();
// menghubungkan dengan koneksi
include '../config/koneksi.php';

// Check connection
if ($konek->connect_error) {
  die("Connection failed: " . $konek->connect_error);
}

// Ambil id_user dari session
$id_user = $_SESSION["id_user"];

// menangkap data yang dikirim dari form
$judul = htmlspecialchars($_POST["judul"]);
$deskripsi = htmlspecialchars($_POST["deskripsi"]);
$bahan_bahan = $_POST["bahan_bahan"];
$cara_pembuatan = $_POST["cara_pembuatan"];

// ----- FOTO -------
$namaFile = $_FILES['foto']['name'];
$ukuranFile = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmpNama = $_FILES['foto']['tmp_name'];

// cek apakah tidak ada gambar yang diupload
if ($error === 4) {
  echo "<script> alert('pilih gambar terlebih dahulu!') </script>";
  return false;
}

// cek apakah yang diupload adalah gambar
$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
  echo "<script> alert('yang anda upload bukan gambar!') </script>";
  return false;
}

// cek jika ukurannya terlalu besar
if ($ukuranFile > 5000000) { //ukuran 5mb
  echo "<script> alert('ukuran terlalu besar!') </script>";
  return false;
}

// lolos pengecekan, gambar siap diupload
// generate nama gambar baru -> kalo namanya sama kan nanti gambarnya sama pas di output
$namaFileBaru = uniqid(); //generate nama baru
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;

move_uploaded_file($tmpNama, "../img/resep/" . $namaFileBaru);

// Bagian masuk ke dbnya
$query = "INSERT INTO `resep` (`id_resep`, `judul`, `deskripsi`, `bahan_bahan`, `cara_pembuatan`, `tgl_pembuatan`, `foto`, `id_user`) VALUES ('', '$judul', '$deskripsi', '$bahan_bahan', '$cara_pembuatan', current_timestamp(), '$namaFileBaru', '$id_user');";

$hasil = mysqli_query($konek, $query);

if ($hasil) {
  header("location:../dashboard.php");
  exit;
} else {
  echo "<script>alert('Gagal Update Profile')</script>";
}
