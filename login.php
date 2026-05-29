<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password =       $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "<script>alert('Username dan password harus diisi!'); history.back();</script>";
    exit;
}

// Prepared statement — aman dari SQL injection
$stmt = mysqli_prepare($conn, "SELECT id, username, password FROM users WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data   = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if ($data && password_verify($password, $data['password'])) {
    // Login sukses — simpan session
    $_SESSION['user_id']  = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['loggedin'] = true;

    header("Location: index.php");
    exit;
} else {
    echo "<script>alert('Username atau password salah!'); history.back();</script>";
    exit;
}
?>