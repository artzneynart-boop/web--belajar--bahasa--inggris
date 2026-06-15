<?php
session_start();
require_once 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Hanya proses jika request POST (mencegah hapus via link langsung/CSRF sederhana)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: edit_profil.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Verifikasi password sebelum menghapus akun (keamanan tambahan)
$password_konfirmasi = $_POST['password_konfirmasi'] ?? '';

$stmt = $conn->prepare("SELECT password, foto FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$user) {
    header("Location: logout.php");
    exit();
}

if (empty($password_konfirmasi) || !password_verify($password_konfirmasi, $user['password'])) {
    $_SESSION['hapus_akun_error'] = "Password salah. Akun tidak dihapus.";
    header("Location: edit_profil.php");
    exit();
}

// Hapus foto profil jika bukan default
if (!empty($user['foto']) && file_exists($user['foto']) && basename($user['foto']) !== 'default.png') {
    unlink($user['foto']);
}

// Hapus data user dari database
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    $stmt->close();
    // Hancurkan session dan arahkan ke halaman utama
    session_unset();
    session_destroy();

    session_start();
    $_SESSION['akun_terhapus'] = "Akun kamu berhasil dihapus. Sampai jumpa lagi! 👋";
    header("Location: index.php");
    exit();
} else {
    $stmt->close();
    $_SESSION['hapus_akun_error'] = "Terjadi kesalahan saat menghapus akun. Coba lagi.";
    header("Location: edit_profil.php");
    exit();
}
?>