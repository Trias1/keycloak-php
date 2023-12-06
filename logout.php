<?php
session_start();

// Hapus informasi pengguna dari session saat logout
unset($_SESSION['username']);

// Redirect ke halaman setelah logout berhasil
header("Location: /");
exit;
