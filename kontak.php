<?php
session_start();
require_once 'koneksi.php';

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username   = $_SESSION['username'] ?? '';

$currentPage = 'kontak.php';

// ── Proses form kontak (sederhana, tanpa kirim email — bisa dikembangkan nanti) ──
$kontak_sukses = '';
$kontak_error  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = trim($_POST['nama'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subjek  = trim($_POST['subjek'] ?? '');
    $pesan   = trim($_POST['pesan'] ?? '');

    if (empty($nama) || empty($email) || empty($subjek) || empty($pesan)) {
        $kontak_error = "Semua field wajib diisi ya 🙏";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $kontak_error = "Format email tidak valid.";
    } else {
        // TODO: simpan ke tabel pesan_kontak atau kirim email notifikasi
        $kontak_sukses = "Pesan kamu berhasil terkirim! Tim kami akan membalas secepatnya 🚀";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MySpeakora — Kontak</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/kontak.css" />
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- ═══════ HERO KONTAK ═══════ -->
<div class="kontak-hero">
  <div class="kontak-hero-inner">
    <div class="section-tag">💬 Hubungi Kami</div>
    <h1>Ada Pertanyaan? <em>Kami Siap Membantu</em></h1>
    <p>Punya pertanyaan seputar materi, kendala akun, atau ide kolaborasi? Tim MySpeakora dengan senang hati akan membalas pesanmu.</p>

    <div class="kontak-quick">
      <a class="kontak-quick-btn kontak-quick-wa" href="https://wa.me/6283140217517?text=Halo%20MySpeakora%2C%20saya%20ingin%20bertanya..." target="_blank" rel="noopener">
        <span class="kontak-quick-icon">💬</span> Chat via WhatsApp
      </a>
      <a class="kontak-quick-btn kontak-quick-email" href="mailto:hello@MySpeakora.id?subject=Pertanyaan%20dari%20Website">
        <span class="kontak-quick-icon">📧</span> Kirim Email
      </a>
    </div>
  </div>
</div>

<div class="kontak-wrapper">

  <!-- ── Kolom Info ── -->
  <div class="kontak-info-col">

    <a class="kontak-info-card is-link" href="mailto:hello@MySpeakora.id?subject=Pertanyaan%20dari%20Website">
      <div class="kontak-info-icon">📧</div>
      <div>
        <h4>Email</h4>
        <div class="kontak-info-value">hello@MySpeakora.id</div>
        <div class="kontak-info-sub">Klik untuk kirim email langsung</div>
      </div>
    </a>

    <a class="kontak-info-card is-link" href="https://wa.me/6283140217517?text=Halo%20MySpeakora%2C%20saya%20ingin%20bertanya..." target="_blank" rel="noopener">
      <div class="kontak-info-icon" style="background:#dcfce7;">
        📱
        <span class="kontak-online-dot"></span>
      </div>
      <div>
        <h4>WhatsApp <span class="kontak-tag-online">● Online</span></h4>
        <div class="kontak-info-value">+62 831-4021-7517</div>
        <div class="kontak-info-sub">Klik untuk chat langsung</div>
      </div>
    </a>

    <a class="kontak-info-card is-link" href="https://maps.app.goo.gl/qmswBf11dXq8Ws1L7" target="_blank" rel="noopener">
      <div class="kontak-info-icon" style="background:#fdf2f8;">📍</div>
      <div>
        <h4>Lokasi</h4>
        <div class="kontak-info-value">Lihat di Google Maps</div>
        <div class="kontak-info-sub">Klik untuk buka peta</div>
      </div>
    </a>

    <div class="kontak-info-card">
      <div class="kontak-info-icon" style="background:#fff7ed;">🕒</div>
      <div>
        <h4>Jam Operasional</h4>
        <p>Senin – Jumat, 09.00 – 17.00 WITA</p>
      </div>
    </div>

  </div>

  <!-- ── Form Kontak ── -->
  <div class="kontak-form-card">
    <h3>Kirim Pesan ✉️</h3>
    <p>Isi formulir di bawah ini, kami akan membalas dalam 1–2 hari kerja.</p>

    <?php if ($kontak_sukses): ?>
      <div class="kontak-alert kontak-alert-success"><span>✅</span><span><?= htmlspecialchars($kontak_sukses) ?></span></div>
    <?php endif; ?>
    <?php if ($kontak_error): ?>
      <div class="kontak-alert kontak-alert-error"><span>⚠️</span><span><?= htmlspecialchars($kontak_error) ?></span></div>
    <?php endif; ?>

    <form method="POST" action="kontak.php">
      <div class="kontak-row">
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" placeholder="Nama kamu"
                 value="<?= htmlspecialchars($_POST['nama'] ?? ($isLoggedIn ? $username : '')) ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="email@kamu.com"
                 value="<?= htmlspecialchars($_POST['email'] ?? ($_SESSION['email'] ?? '')) ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label for="subjek">Subjek</label>
        <input type="text" id="subjek" name="subjek" placeholder="Contoh: Kendala login akun"
               value="<?= htmlspecialchars($_POST['subjek'] ?? '') ?>" required>
      </div>

      <div class="form-group">
        <label for="pesan">Pesan</label>
        <textarea id="pesan" name="pesan" placeholder="Tulis pesan kamu di sini..." required><?= htmlspecialchars($_POST['pesan'] ?? '') ?></textarea>
      </div>

      <button type="submit" class="kontak-btn-submit">Kirim Pesan →</button>
    </form>
  </div>

</div>

<!-- ═══════ MAP ═══════ -->
<div class="kontak-map">
  <div class="kontak-map-box">
    <iframe
      src="https://www.google.com/maps?q=MySpeakora&output=embed"
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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

<!-- ═══════ FLOATING WHATSAPP BUTTON ═══════ -->
<a class="kontak-float-wa" href="https://wa.me/6283140217517?text=Halo%20MySpeakora%2C%20saya%20ingin%20bertanya..." target="_blank" rel="noopener" title="Chat via WhatsApp">💬</a>

<script src="script.js"></script>
</body>
</html>