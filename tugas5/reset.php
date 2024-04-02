<?php
session_start(); // Mulai sesi
session_unset(); // Hapus semua data sesi
session_destroy(); // Hapus sesi
header("Location: objMahasiswa.php"); // Redirect kembali ke halaman utama
exit();
?>
