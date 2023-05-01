<?php
// Mulai sesi PHP
session_start();

// Hapus semua variabel sesi
session_unset();

// Hapus cookie sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Alihkan pengguna ke halaman login
header("Location: login.php");
exit();
?>
