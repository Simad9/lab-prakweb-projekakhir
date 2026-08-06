<?php
session_start();
// menghubungkan dengan koneksi
include '../config/koneksi.php';

// Ambil id_user dari session
$id_user = $_SESSION["id_user"];

// menangkap data yang dikirim dari form
$namaLengkap = htmlspecialchars($_POST["namaLengkap"]);
$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);
$headline = htmlspecialchars($_POST["headline"]);

// ----- FOTO -------
$namaFile = $_FILES['profilePicture']['name'];
$ukuranFile = $_FILES['profilePicture']['size'];
$error = $_FILES['profilePicture']['error'];
$tmpNama = $_FILES['profilePicture']['tmp_name'];

// cek apakah tidak ada gambar yang diupload
if ($error === 4) {
  echo "<script> alert('pilih gambar terlebih dahulu!') </script>";
  return false;
}

// cek apakah yang diupload adalah gambar
$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
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

move_uploaded_file($tmpNama, "../img/profile/" . $namaFileBaru);


// Bagian masuk ke dbnya
$query = "UPDATE users SET `username`='$username', `email`='$email',  `headline`='$headline', `profilePicture`='$namaFileBaru', `namaLengkap`='$namaLengkap' WHERE id_user = $id_user;";

$hasil = mysqli_query($konek, $query);

if ($hasil) {
  // The query executed successfully
  $_SESSION['username'] = $username;  // Update session username with the new value
  $_SESSION['profilePicture'] = $namaFileBaru;
  header("location:../dashboard.php");
  exit;
} else {
  echo "<script>alert('Gagal Update Profile')</script>";
}

