<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container" style="margin-top:100px">

    <h1>⚙️ Pengaturan</h1>

    <div class="card">
        <h3>🎨 Tampilan</h3>
        <p>Dark Mode (Segera Hadir)</p>
    </div>

    <div class="card">
        <h3>🌐 Bahasa</h3>
        <p>Indonesia (Aktif)</p>
    </div>

    <div class="card">
        <h3>🔐 Keamanan</h3>
        <a href="edit_profil.php">Ubah Password</a>
    </div>

</div>

</body>
</html>