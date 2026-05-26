<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MySpeakora — Kamus</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css"/>
  <style>
    #kamus { padding-top: 110px; min-height: 100vh; }
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
    <li><a href="kuis.php">🧠 Kuis</a></li>
    <li><a href="kamus.php" class="active">📖 Kamus</a></li>
  </ul>
  <div class="nav-auth">
    <a class="btn-login"    onclick="openModal('login')">Login</a>
    <a class="btn-register" onclick="openModal('register')">Register</a>
  </div>
  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>
 
<!-- ═══════ KAMUS ═══════ -->
<section id="kamus">
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
      <div class="kamus-item">
        <div>
          <div class="k-word">Beautiful</div>
          <div class="k-phonetic">/ˈbjuː.tɪ.fəl/</div>
          <div class="k-meaning">Indah; cantik; memiliki kecantikan yang luar biasa</div>
        </div>
        <span class="k-type">Adjective</span>
      </div>
      <div class="kamus-item">
        <div>
          <div class="k-word">Knowledge</div>
          <div class="k-phonetic">/ˈnɒl.ɪdʒ/</div>
          <div class="k-meaning">Pengetahuan; pemahaman tentang suatu hal</div>
        </div>
        <span class="k-type">Noun</span>
      </div>
      <div class="kamus-item">
        <div>
          <div class="k-word">Determine</div>
          <div class="k-phonetic">/dɪˈtɜː.mɪn/</div>
          <div class="k-meaning">Menentukan; memutuskan dengan tegas</div>
        </div>
        <span class="k-type">Verb</span>
      </div>
      <div class="kamus-item">
        <div>
          <div class="k-word">Ambitious</div>
          <div class="k-phonetic">/æmˈbɪʃ.əs/</div>
          <div class="k-meaning">Ambisius; memiliki keinginan kuat untuk sukses</div>
        </div>
        <span class="k-type">Adjective</span>
      </div>
      <div class="kamus-item">
        <div>
          <div class="k-word">Eloquent</div>
          <div class="k-phonetic">/ˈel.ə.kwənt/</div>
          <div class="k-meaning">Fasih; mampu berbicara dengan jelas dan persuasif</div>
        </div>
        <span class="k-type">Adjective</span>
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