<?php
session_start();
include '../config/koneksi.php';

$id_resep = htmlspecialchars($_POST["id_resep"]);
$judul = htmlspecialchars($_POST["judul"]);
$deskripsi = htmlspecialchars($_POST["deskripsi"]);
$bahan_bahan = $_POST["bahan_bahan"];
$cara_pembuatan = $_POST["cara_pembuatan"];
$id_user = htmlspecialchars($_SESSION['id_user']);

$gambarLama = htmlspecialchars($_POST["gambarLama"]);
// cek apakah user pilih gambar baru atau tidak
$gambar = $_FILES['foto']['name'] != '' ? upload() : $gambarLama;

// UPDATE GAMBAR
function upload()
{
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
  return $namaFileBaru;
}

// QUERY UPDATE
$query = "UPDATE resep SET id_resep='$id_resep', judul='$judul', deskripsi='$deskripsi', bahan_bahan='$bahan_bahan', cara_pembuatan='$cara_pembuatan', foto='$gambar', id_user='$id_user' WHERE id_resep = $id_resep;";


$cek = mysqli_query($konek, $query);
if ($cek) {
  header('location:../dashboard.php');
} else {
  header('location:../dashboard.php?notif="tidak_terhapus"');
}
