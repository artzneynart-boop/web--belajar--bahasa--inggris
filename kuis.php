<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MySpeakora — Kuis</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css"/>
  <style>
    #kuis { padding-top: 110px; min-height: 100vh; }
  </style>
</head>
<body>
 
<!-- ═══════ NAVBAR ═══════ -->
<nav id="navbar">
  <a class="nav-logo" href="index.php">
    <div class="nav-logo-icon">Ms</div>
    <span class="nav-logo-text">My<span>Speakora</span></span>
  </a>
  <ul class="nav-links">
    <li><a href="index.php">🏠 Home</a></li>
    <li><a href="materi.php">📚 Materi</a></li>
    <li><a href="kuis.php" class="active">🧠 Kuis</a></li>
    <li><a href="kamus.php">📖 Kamus</a></li>
  </ul>
  <div class="nav-auth">
    <a class="btn-login"    onclick="openModal('login')">Login</a>
    <a class="btn-register" onclick="openModal('register')">Register</a>
  </div>
  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>
 
<!-- ═══════ KUIS ═══════ -->
<section id="kuis">
  <div class="section-tag">🧠 Uji Kemampuan</div>
  <h2 class="section-title">Kuis Interaktif yang Seru</h2>
  <p class="section-sub">Tes pemahamanmu dengan kuis yang mengadaptasi tingkat kesulitan sesuai kemampuanmu.</p>
 
  <div class="kuis-container">
    <div class="kuis-preview">
      <h3>Contoh Soal Kuis</h3>
      <p>Pilih jawaban yang benar untuk melengkapi kalimat berikut:</p>
      <div style="background:rgba(255,255,255,.15);border-radius:10px;padding:16px;margin-bottom:18px;font-weight:600;font-size:.9rem;">
        "She ___ to the market every Sunday with her family."
      </div>
      <div class="kuis-options">
        <div class="kuis-opt" onclick="selectOpt(this,'wrong')"><span class="kuis-opt-letter">A</span> go</div>
        <div class="kuis-opt correct" onclick="selectOpt(this,'correct')"><span class="kuis-opt-letter">B</span> goes ✓</div>
        <div class="kuis-opt" onclick="selectOpt(this,'wrong')"><span class="kuis-opt-letter">C</span> going</div>
        <div class="kuis-opt" onclick="selectOpt(this,'wrong')"><span class="kuis-opt-letter">D</span> gone</div>
      </div>
      <button class="btn-primary" style="width:100%;justify-content:center" onclick="openModal('register')">Mulai Kuis Lengkap 🎯</button>
    </div>
 
    <div class="kuis-info">
      <div class="kuis-stat-card">
        <div class="kuis-stat-icon">🏆</div>
        <div>
          <div class="kuis-stat-num">25+</div>
          <div class="kuis-stat-label">Kategori Kuis Tersedia</div>
        </div>
      </div>
      <div class="kuis-stat-card">
        <div class="kuis-stat-icon">📊</div>
        <div>
          <div class="kuis-stat-num">Adaptif</div>
          <div class="kuis-stat-label">Tingkat kesulitan menyesuaikan kemampuanmu</div>
        </div>
      </div>
      <div class="kuis-stat-card">
        <div class="kuis-stat-icon">🎖️</div>
        <div>
          <div class="kuis-stat-num">Leaderboard</div>
          <div class="kuis-stat-label">Bersaing dengan ribuan pelajar lain</div>
        </div>
      </div>
      <div class="kuis-stat-card">
        <div class="kuis-stat-icon">📱</div>
        <div>
          <div class="kuis-stat-num">Offline</div>
          <div class="kuis-stat-label">Bisa dikerjakan tanpa koneksi internet</div>
        </div>
      </div>
    </div>
  </div>
</section>
 
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
    <p>© 2025 MySpeakora. Dibuat dengan ❤️ untuk pelajar Indonesia.</p>
    <p>📧 hello@MySpeakora.id</p>
  </div>
</footer>
 
<script src="script.js"></script>
</body>
</html>