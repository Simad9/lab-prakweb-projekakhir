<?php
// Mempermudah kalo nanti udah di hosting
$host = "localhost";
$user = "root";
$password = "";
$nama_database = "projek_akhir_prak_web";
// Konek ke database
$konek = new mysqli($host, $user, $password, $nama_database);
// jika connection nya error
if ($konek->connect_error) {
  // jika terjadi error, matikan proses dengan die() atau exit();
  die('Maaf konek gagal: ' . $konek->connect_error);
}
