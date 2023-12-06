<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Halaman utama
    include 'login.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_login_with_keycloak'])) {
    // Redirect ke halaman login Keycloak
    header("Location: http://localhost:8080/auth/realms/testingphp/protocol/openid-connect/auth?client_id=phps&redirect_uri=http://localhost:8090/login&response_type=code&scope=openid");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['code'])) {
    // Ambil token setelah berhasil di-redirect dari Keycloak
    $code = $_GET['code'];

    // Proses token (sesuaikan dengan kebutuhan)
    // ...

    // Redirect ke halaman setelah login berhasil
    header("Location: /home");
    exit;
} else {
    // Halaman default (misalnya 404)
    http_response_code(404);
    echo 'Not Found';
}
?>

<?php

// ... (kode lainnya)

// Logout dari Keycloak (opsional)
if (isset($_POST['logout'])) {
    $keycloak->logout();
    // Hapus informasi pengguna dari session
    unset($_SESSION['username']);
    // Redirect ke halaman setelah logout berhasil
    header("Location: /");
    exit;
}