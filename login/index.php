<?php
session_start();

// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "datasiswa");

if (isset($_POST['submit'])) {
    // PROSES CEK LOGIN
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM tabelsiswa WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        echo "<script>alert('Login Berhasil!'); window.location='../crud2026 new/index.php';</script>";
    } else {
        echo "<script>alert('Username atau Password SALAH!'); window.location='index.php';</script>";
    }
} else {
    // JIKA TIDAK ADA DATA DIKIRIM, PANGGIL TAMPILAN HTML
    include 'index.html';
}
?>