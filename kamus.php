<?php
session_start();
require_once 'koneksi.php';

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

if (!$isLoggedIn) {
    header("Location: index.php?login_required=1");
    exit();
}

$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MySpeakora — Kamus</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css"/>
  <style>
  </style>
</head>
<body>
 
<?php include 'navbar.php'; ?>

 
<!-- ═══════ KAMUS ═══════ -->
<section id="kamus">
  <div class="container">
  <div class="section-tag">📖 Kamus Digital</div>
  <h2 class="section-title">Kamus Inggris-Indonesia<br>Terlengkap</h2>
  <p class="section-sub">Cari arti kata dengan cepat, lengkap dengan contoh kalimat, sinonim, dan pelafalan.</p>
 
  <div class="kamus-box">
    <div class="kamus-search">
      <input
        type="text"
        id="kamusInput"
        placeholder="Ketik kata dalam bahasa Inggris..."
        onkeyup="searchKamus()"
      />
      <button onclick="searchKamus()">🔍 Cari</button>
    </div>
   <div class="kamus-results" id="kamusResults">
</div>
    </div>
</section>
<?php
$query = mysqli_query($conn, "SELECT * FROM kamus ORDER BY kata_inggris ASC");

while($row = mysqli_fetch_assoc($query)):
?>

<div class="kamus-item">
  <div>
    <div class="k-word"><?= htmlspecialchars($row['kata_inggris']) ?></div>

    <div class="k-phonetic">
      <?= htmlspecialchars($row['fonetik']) ?>
    </div>

    <div class="k-meaning">
      <?= htmlspecialchars($row['arti_indonesia']) ?>
    </div>
  </div>
</div>

<?php endwhile; ?>

</div>
 
<!-- ═══════ MODAL LOGIN ═══════ -->
<div class="modal-overlay" id="loginModal" onclick="closeOnBg(event,'loginModal')">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('loginModal')">✕</button>
    <h2>Selamat Datang 👋</h2>
    <p>Masuk ke akun MySpeakora kamu</p>
    <div class="form-group"><label>Email</label><input type="email" placeholder="email@kamu.com" /></div>
    <div class="form-group"><label>Password</label><input type="password" placeholder="••••••••" /></div>
    <button class="btn-form">Masuk →</button>
    <div class="modal-switch">Belum punya akun? <a onclick="switchModal('loginModal','registerModal')">Daftar sekarang</a></div>
  </div>
</div>
 
<!-- ═══════ MODAL REGISTER ═══════ -->
<div class="modal-overlay" id="registerModal" onclick="closeOnBg(event,'registerModal')">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('registerModal')">✕</button>
    <h2>Buat Akun Gratis 🚀</h2>
    <p>Bergabung dengan 50.000+ pelajar aktif</p>
    <div class="form-group"><label>Nama Lengkap</label><input type="text" placeholder="Nama kamu" /></div>
    <div class="form-group"><label>Email</label><input type="email" placeholder="email@kamu.com" /></div>
    <div class="form-group"><label>Password</label><input type="password" placeholder="Min. 8 karakter" /></div>
    <button class="btn-form">Daftar Gratis →</button>
    <div class="modal-switch">Sudah punya akun? <a onclick="switchModal('registerModal','loginModal')">Masuk di sini</a></div>
  </div>
</div>
 
<!-- ═══════ FOOTER ═══════ -->
<footer>
  <div class="footer-top">
    <div class="footer-brand">
      <div class="nav-logo" style="margin-bottom:8px">
        <div class="nav-logo-icon">Ms</div>
        <span class="nav-logo-text" style="color:white">My<span>Speakora</span></span>
      </div>
      <p>Platform belajar bahasa Inggris online terbaik untuk pelajar Indonesia. Gratis, lengkap, dan menyenangkan.</p>
    </div>
    <div class="footer-col"><h4>Fitur</h4><ul>
      <li><a href="materi.html">Materi</a></li>
      <li><a href="kuis.html">Kuis</a></li>
      <li><a href="kamus.html">Kamus</a></li>
      <li><a href="#">Leaderboard</a></li>
    </ul></div>
    <div class="footer-col"><h4>Perusahaan</h4><ul>
      <li><a href="#">Tentang Kami</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Karir</a></li>
      <li><a href="#">Press Kit</a></li>
    </ul></div>
    <div class="footer-col"><h4>Bantuan</h4><ul>
      <li><a href="#">FAQ</a></li>
      <li><a href="#">Kontak</a></li>
      <li><a href="#">Kebijakan Privasi</a></li>
      <li><a href="#">Syarat & Ketentuan</a></li>
    </ul></div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 MySpeakora. Dibuat dengan ❤️ untuk pelajar Indonesia.</p>
    <p>📧 hello@MySpeakora.id</p>
  </div>
</footer>
 
<script src="script.js"></script>
</body>
</html>