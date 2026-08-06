<?php
include '../config/koneksi.php';

// Ngambil data
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$password2 = htmlspecialchars($_POST["password2"]);

// cek username sudah ada atau belum
$result = mysqli_query($konek, "SELECT username FROM users WHERE username = '$username'");
if (mysqli_fetch_assoc($result)) {
  header('location:../login.php?pesan=terdaftar');
}

// cek konfimrasi password
if ($password !== $password2) {
  header('location:../login.php?pesan=gagal');
}

// enskripsi password
$password = password_hash($password, PASSWORD_DEFAULT);
// tambah userbaru ke database
$query = "INSERT INTO `users` (`id_user`, `username`, `email`, `password`) VALUES (NULL, '$username', NULL, '$password');";
$data = mysqli_query($konek, $query);
// Kirim ke login
if ($data == true) {
  header('location:../login.php?pesan=berhasil');
} else {
  header('location:../login.php?pesan=gagal');
}
