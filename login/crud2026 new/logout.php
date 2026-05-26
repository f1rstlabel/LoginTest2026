<?php
session_start();
session_unset(); // Bersihkan semua data
session_destroy(); // Hancurkan sesi login
?>

<script>
    alert('Log Out Berhasil!');
    // Menggunakan .replace agar halaman utama tadi "dihapus" dari memori browser
    // Jadi kalau di-back, browser tidak tahu jalan pulangnya
    window.location.replace('../login/index.php');
</script>