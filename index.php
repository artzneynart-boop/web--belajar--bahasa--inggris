<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MySpeakora — Beranda</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
 
<!-- ═══════ NAVBAR ═══════ -->
<nav id="navbar">
  <a class="nav-logo" href="index.php">
    <div class="nav-logo-icon">Ms</div>
    <span class="nav-logo-text">My<span>Speakora</span></span>
  </a>
  <ul class="nav-links">
    <li><a href="index.php"   class="active">🏠 Home</a></li>
    <li><a href="materi.php">📚 Materi</a></li>
    <li><a href="kuis.php">🧠 Kuis</a></li>
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
 
<!-- ═══════ HERO ═══════ -->
<section class="hero" id="home">
  <div class="hero-content">
    <div class="hero-badge"><span class="dot"></span>Platform Belajar #1 Indonesia</div>
    <h1>Kuasai Bahasa Inggris dengan <em>Cara Mudah & Menyenangkan</em></h1>
    <p class="hero-sub">Belajar vocabulary, grammar, speaking, dan listening dengan metode interaktif yang terbukti efektif. Mulai gratis, tanpa batas waktu!</p>
    <div class="hero-cta">
      <a href="materi.html" class="btn-primary">🚀 Mulai Belajar Gratis</a>
      <a href="kuis.html"   class="btn-secondary">🎯 Coba Kuis</a>
    </div>
    <div class="hero-stats">
      <div class="stat-item"><div class="stat-num">50K+</div><div class="stat-label">Pelajar Aktif</div></div>
      <div class="stat-item"><div class="stat-num">500+</div><div class="stat-label">Materi Pelajaran</div></div>
      <div class="stat-item"><div class="stat-num">98%</div><div class="stat-label">Tingkat Kepuasan</div></div>
    </div>
  </div>
 
  <div class="hero-visual">
    <div class="hero-card-main">
      <div class="lesson-header">
        <div class="lesson-icon">📖</div>
        <div>
          <h4>Word of the Day</h4>
          <p>Vocabulary Builder</p>
        </div>
      </div>
      <div class="word-of-day">
        <div class="wod-label">✨ Today's Word</div>
        <div class="wod-word">Perseverance</div>
        <div class="wod-phonetic">/ˌpɜːr.sɪˈvɪr.əns/</div>
        <div class="wod-meaning">🇮🇩 Ketekunan; kemampuan untuk terus berusaha meskipun ada kesulitan.</div>
      </div>
      <div class="progress-section">
        <label><span>Progress Hari Ini</span><span>68%</span></label>
        <div class="progress-bar"><div class="progress-fill"></div></div>
      </div>
    </div>
    <div class="floating-card fc-1">
      <div class="fc-icon" style="background:var(--blue-50)">🔥</div>
      7 Day Streak!
    </div>
    <div class="floating-card fc-2">
      <div class="fc-icon" style="background:var(--blue-50)">⭐</div>
      +150 XP Earned
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
 
<div class="modal-overlay" id="registerModal" onclick="closeOnBg(event,'registerModal')">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('registerModal')">✕</button>
    <h2>Buat Akun Gratis 🚀</h2>
    <p>Bergabung dengan 50.000+ pelajar aktif</p>

    <!-- ✅ Tambah form tag -->
    <form method="POST" action="simpan_user.php">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <!-- ✅ Tambah name="username" -->
        <input type="text" name="username" placeholder="username" />
      </div>
      <div class="form-group">
        <label>Email</label>
        <!-- ✅ Tambah name="email" -->
        <input type="email" name="email" placeholder="email@kamu.com" />
      </div>
      <div class="form-group">
        <label>Password</label>
        <!-- ✅ Tambah name="password" -->
        <input type="password" name="password" placeholder="Min. 8 karakter" />
      </div>
      <!-- ✅ Ganti button jadi type="submit" -->
      <button type="submit" class="btn-form">Daftar Gratis →</button>
    </form>

    <div class="modal-switch">Sudah punya akun? <a onclick="switchModal('registerModal','loginModal')">Masuk di sini</a></div>
  </div>
</div>
 

<section class="faq" id="faq">

  <h2 class="faq-title">QUESTION</h2>

  <div class="faq-container">
<div class="faq-item">
  <button class="faq-question">
    Why should you choose Speakora?
    <span>+</span>
  </button>
  <div class="faq-answer">
    <p>
      Speakora provides interactive English learning materials,
      modern design, beginner-friendly lessons, and an enjoyable
      learning experience for all users.
    </p>
  </div>
</div>

<div class="faq-item">
  <button class="faq-question">
    What makes our platform different?
    <span>+</span>
  </button>
  <div class="faq-answer">
    <p>
      Our platform combines vocabulary, speaking practice,
      grammar learning, and simple explanations in one place
      to make learning English easier and faster.
    </p>
  </div>
</div>

<div class="faq-item">
  <button class="faq-question">
    Is this website suitable for beginners?
    <span>+</span>
  </button>
  <div class="faq-answer">
    <p>
      Yes! Speakora is designed for beginners with simple lessons,
      easy navigation, and step-by-step learning materials.
    </p>
  </div>
</div>

<div class="faq-item">
  <button class="faq-question">
    Can I learn English anywhere and anytime?
    <span>+</span>
  </button>
  <div class="faq-answer">
    <p>
      Absolutely. Speakora can be accessed anytime through your
      smartphone or computer, making learning flexible and convenient.
    </p>
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