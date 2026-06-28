<?php
session_start();

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username   = $_SESSION['username'] ?? '';

$currentPage = 'tentang.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MySpeakora — Tentang Kami</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/tentang.css" />
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- ═══════ HERO TENTANG ═══════ -->
<div class="tentang-hero">
  <div class="tentang-hero-inner">
    <div class="section-tag">🚀 Tentang Kami</div>
    <h1>Membantu Indonesia <em>Lancar Berbahasa Inggris</em></h1>
    <p>MySpeakora lahir dari keyakinan sederhana: setiap orang berhak belajar bahasa Inggris dengan cara yang mudah, menyenangkan, dan tanpa biaya mahal.</p>

    <div class="tentang-stats">
      <div class="tentang-stat-item">
        <div class="tentang-stat-num">50K+</div>
        <div class="tentang-stat-label">Pelajar Aktif</div>
      </div>
      <div class="tentang-stat-item">
        <div class="tentang-stat-num">500+</div>
        <div class="tentang-stat-label">Materi Pelajaran</div>
      </div>
      <div class="tentang-stat-item">
        <div class="tentang-stat-num">98%</div>
        <div class="tentang-stat-label">Tingkat Kepuasan</div>
      </div>
      <div class="tentang-stat-item">
        <div class="tentang-stat-num">100%</div>
        <div class="tentang-stat-label">Gratis Selamanya</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════ CERITA KAMI ═══════ -->
<section class="tentang-section">
  <div class="tentang-story">
    <div class="tentang-story-text">
      <h3>Cerita di Balik MySpeakora 📖</h3>
      <p>Semua dimulai dari satu masalah yang sering kami temui: banyak orang Indonesia ingin menguasai bahasa Inggris, tapi terbentur biaya kursus yang mahal dan materi yang membingungkan.</p>
      <p>Dari situ, kami membangun MySpeakora — platform belajar bahasa Inggris yang dirancang khusus untuk pelajar Indonesia, dari level pemula hingga mahir, lengkap dengan kamus, kuis interaktif, dan materi terstruktur.</p>
      <p>Hingga hari ini, kami terus berkembang bersama puluhan ribu pelajar yang percaya bahwa belajar bahasa Inggris itu bisa mudah dan menyenangkan.</p>
    </div>
    <div class="tentang-story-visual">
      <div class="tentang-quote-mark">"</div>
      <h4>Misi Kami</h4>
      <p>Membuat pendidikan bahasa Inggris berkualitas dapat diakses oleh siapa saja, di mana saja, tanpa hambatan biaya maupun jarak.</p>
    </div>
  </div>
</section>

<!-- ═══════ NILAI YANG KAMI PEGANG ═══════ -->
<section class="tentang-section" style="padding-top:0;">
  <div class="tentang-section-head">
    <div class="section-tag">💡 Nilai Kami</div>
    <h2>Apa yang Kami Percaya</h2>
    <p>Tiga nilai ini menjadi pondasi setiap keputusan yang kami buat di MySpeakora.</p>
  </div>

  <div class="tentang-values-grid">
    <div class="tentang-value-card">
      <div class="tentang-value-icon" style="background:#eff6ff;">🎯</div>
      <h4>Mudah Dipahami</h4>
      <p>Materi disusun bertahap dari dasar hingga mahir, dengan bahasa yang sederhana dan contoh nyata sehari-hari.</p>
    </div>
    <div class="tentang-value-card">
      <div class="tentang-value-icon" style="background:#f0fdf4;">🌱</div>
      <h4>Gratis & Terbuka</h4>
      <p>Kami percaya pendidikan tidak seharusnya dibatasi biaya. Semua materi inti dapat diakses tanpa berbayar.</p>
    </div>
    <div class="tentang-value-card">
      <div class="tentang-value-icon" style="background:#fdf2f8;">❤️</div>
      <h4>Berpusat pada Pelajar</h4>
      <p>Setiap fitur kami bangun berdasarkan masukan langsung dari pelajar, agar benar-benar menjawab kebutuhan mereka.</p>
    </div>
  </div>
</section>

<!-- ═══════ TIM KAMI ═══════ -->
<section class="tentang-section" style="padding-top:0;">
  <div class="tentang-section-head">
    <div class="section-tag">👥 Tim Kami</div>
    <h2>Orang-Orang di Balik MySpeakora</h2>
    <p>Tim kecil dengan semangat besar untuk membuat belajar bahasa Inggris terasa lebih mudah bagi semua orang.</p>
  </div>

  <div class="tentang-team-grid">
    <div class="tentang-team-card">
      <div class="tentang-team-avatar">A</div>
      <h4>Nurul Hakiki</h4>
    </div>
    <div class="tentang-team-card">
      <div class="tentang-team-avatar">R</div>
      <h4>M.Juniar Alfarizi</h4>
    </div>
    <div class="tentang-team-card">
      <div class="tentang-team-avatar">D</div>
      <h4>M.Hidayaturrahman</h4>
    </div>
    <div class="tentang-team-card">
      <div class="tentang-team-avatar">S</div>
      <h4>Agara</h4>
    </div>
  </div>
</section>

<!-- ═══════ CTA PENUTUP ═══════ -->
<div class="tentang-cta">
  <div class="tentang-cta-box">
    <h3>Siap Mulai Belajar Bersama Kami? 🚀</h3>
    <p>Gabung dengan 50.000+ pelajar yang sudah merasakan cara belajar bahasa Inggris yang lebih mudah dan menyenangkan.</p>
    <div class="tentang-cta-btns">
      <?php if ($isLoggedIn): ?>
        <a class="tentang-cta-btn tentang-cta-btn-primary" href="materi.php">📚 Mulai Belajar</a>
      <?php else: ?>
        <a class="tentang-cta-btn tentang-cta-btn-primary" href="index.php">🚀 Daftar Gratis</a>
      <?php endif; ?>
      <a class="tentang-cta-btn tentang-cta-btn-secondary" href="kontak.php">💬 Hubungi Kami</a>
    </div>
  </div>
</div>

<?php if (!$isLoggedIn): ?>
<!-- ═══════ MODAL LOGIN ═══════ -->
<div class="modal-overlay" id="loginModal" onclick="closeOnBg(event,'loginModal')">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('loginModal')">✕</button>
    <h2>Selamat Datang 👋</h2>
    <p>Masuk ke akun MySpeakora kamu</p>
    <form method="POST" action="login.php">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username kamu" required />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="••••••••" required />
      </div>
      <button type="submit" class="btn-form">Masuk →</button>
    </form>
    <div class="modal-switch">Belum punya akun? <a onclick="switchModal('loginModal','registerModal')">Daftar sekarang</a></div>
  </div>
</div>

<!-- ═══════ MODAL REGISTER ═══════ -->
<div class="modal-overlay" id="registerModal" onclick="closeOnBg(event,'registerModal')">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('registerModal')">✕</button>
    <h2>Buat Akun Gratis 🚀</h2>
    <p>Bergabung dengan 50.000+ pelajar aktif</p>
    <form method="POST" action="simpan_user.php">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username kamu" required />
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="email@kamu.com" required />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Min. 8 karakter" required />
      </div>
      <button type="submit" class="btn-form">Daftar Gratis →</button>
    </form>
    <div class="modal-switch">Sudah punya akun? <a onclick="switchModal('registerModal','loginModal')">Masuk di sini</a></div>
  </div>
</div>
<?php endif; ?>

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
      <li><a href="materi.php">Materi</a></li>
      <li><a href="kuis.php">Kamus</a></li>
      <li><a href="kamus.php">Kuis</a></li>
      <li><a href="#">Leaderboard</a></li>
    </ul></div>
    <div class="footer-col"><h4>Perusahaan</h4><ul>
      <li><a href="tentang.php">Tentang Kami</a></li>
     <li><a href="https://maps.app.goo.gl/qmswBf11dXq8Ws1L7" target="_blank">location</a></li>
    </ul></div>
    <div class="footer-col"><h4>Bantuan</h4><ul>
      <li><a href="kontak.php">Kontak</a></li>
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