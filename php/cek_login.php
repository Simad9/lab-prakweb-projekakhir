<?php
session_start();
// menghubungkan dengan koneksi
include '../config/koneksi.php';


// menangkap data yang dikirim dari form
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST['password']);

$query = "SELECT * FROM `users` WHERE username='$username';";

$hasil = mysqli_query($konek, $query);
$dataAdmin = mysqli_fetch_array($hasil);


if (mysqli_num_rows($hasil) === 1) {
    if (password_verify($password, $dataAdmin["password"])) {
        $_SESSION['username'] = $dataAdmin['username'];
        $_SESSION['id_user'] = $dataAdmin['id_user'];
        $_SESSION['profilePicture'] = $dataAdmin['profilePicture']; //nanti pelajari lagi isinya apa
        header("location:../homepage.php");
        exit;
    };
} else {
    header("location:../login.php?pesan=gagal");
}
