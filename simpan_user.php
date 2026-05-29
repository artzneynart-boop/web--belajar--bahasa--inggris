<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email']    ?? '');
$password =       $_POST['password'] ?? '';

// Validasi input tidak boleh kosong
if (empty($username) || empty($email) || empty($password)) {
    echo "<script>alert('Semua field harus diisi!'); history.back();</script>";
    exit;
}

// Validasi panjang password
if (strlen($password) < 8) {
    echo "<script>alert('Password minimal 8 karakter!'); history.back();</script>";
    exit;
}

// Cek apakah username atau email sudah ada
$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ? OR email = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Username atau email sudah digunakan!'); history.back();</script>";
    exit;
}
mysqli_stmt_close($stmt);

// Hash password sebelum disimpan
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database dengan prepared statement (aman dari SQL injection)
$stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    // Redirect ke index.php dengan pesan sukses
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "'); history.back();</script>";
}
?>