<?php
session_start();

// Ambil token setelah berhasil di-redirect dari Keycloak
$code = $_GET['code'];

// Mendapatkan token dari Keycloak menggunakan code
$token = getTokenFromKeycloak($code);

// Proses token (sesuaikan dengan kebutuhan)
$userInfo = processToken($token);

// Simpan informasi pengguna dalam session
$_SESSION['username'] = $userInfo['username'];

// Redirect ke halaman setelah login berhasil
header("Location: /home");
exit;
// ...

// Fungsi untuk mendapatkan token dari Keycloak
function getTokenFromKeycloak($code) {
    // Proses untuk mendapatkan token dari Keycloak
    // ...

    // Contoh sederhana, Anda dapat menggunakan library HTTP Client atau Curl
    $response = http_client_request("http://localhost:8080/auth/realms/testingphp/protocol/openid-connect/token", [
        'grant_type'    => 'authorization_code',
        'client_id'     => 'phps',
        'client_secret' => 'OmvIKxcH5ig2DphGH4eefSNuQX8S2GUX',
        'redirect_uri'  => 'http://localhost:8090/login',
        'code'          => $code,
    ]);

    return json_decode($response, true)['access_token'];
}

// Fungsi untuk memproses token
function processToken($token) {
    // Proses untuk mendapatkan informasi pengguna dari token
    // ...

    // Contoh sederhana, Anda dapat menggunakan library JWT
    $decodedToken = jwt_decode($token);

    return [
        'userId'   => $decodedToken['sub'],
        'username' => $decodedToken['preferred_username'],
        // Tambahkan informasi pengguna lainnya sesuai kebutuhan
    ];
}
?>