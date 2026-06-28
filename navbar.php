<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username   = $isLoggedIn ? htmlspecialchars($_SESSION['username'] ?? '') : '';
$foto       = $isLoggedIn ? ($_SESSION['foto'] ?? '') : '';
$email      = $isLoggedIn ? htmlspecialchars($_SESSION['email'] ?? '') : '';
$namaDepan  = $isLoggedIn ? htmlspecialchars($_SESSION['nama_depan'] ?? '') : '';
$namaLengkap = trim($namaDepan . ' ' . htmlspecialchars($_SESSION['nama_belakang'] ?? ''));
if (!$namaLengkap) $namaLengkap = $username;

// Inisial untuk avatar teks
$inisial = $isLoggedIn ? mb_strtoupper(mb_substr($_SESSION['nama_depan'] ?? $username, 0, 1)) : '';

// Halaman aktif saat ini
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<style>
/* ── Profile Dropdown ── */
.profile-dropdown-wrap {
    position: relative;
    display: inline-flex;
    align-items: center;
}
.profile-dropdown-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    border: none;
    background: none;
    padding: 4px 10px 4px 4px;
    border-radius: 50px;
    transition: background .15s;
    font-family: inherit;
}
.profile-dropdown-trigger:hover { background: rgba(37,99,235,.07); }
.profile-dropdown-trigger img.pd-photo {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #e5e7eb;
    flex-shrink: 0;
}
.pd-initials-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #ede9fe;
    color: #5b21b6;
    font-weight: 700;
    font-size: .85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #e5e7eb;
    flex-shrink: 0;
}
.pd-trigger-name {
    font-size: .85rem;
    font-weight: 600;
    color: #1f2937;
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.pd-chevron {
    font-size: .6rem;
    color: #9ca3af;
    transition: transform .2s;
    line-height: 1;
}
.profile-dropdown-wrap.open .pd-chevron { transform: rotate(180deg); }

/* Dropdown menu */
.pd-menu {
    display: none;
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    box-shadow: 0 10px 40px rgba(0,0,0,.12);
    min-width: 220px;
    z-index: 9999;
    overflow: hidden;
    animation: pdSlideIn .15s ease;
}
@keyframes pdSlideIn {
    from { opacity: 0; transform: translateY(-8px); }
    to   { opacity: 1; transform: translateY(0); }
}
.profile-dropdown-wrap.open .pd-menu { display: block; }

/* Header */
.pd-menu-header {
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .9rem 1rem;
    border-bottom: 1px solid #f3f4f6;
}
.pd-menu-header .pd-avatar-lg {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}
.pd-menu-header .pd-initials-lg {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #ede9fe;
    color: #5b21b6;
    font-weight: 700;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.pd-menu-header .pd-info .pd-fullname {
    font-size: .88rem;
    font-weight: 600;
    color: #111827;
    line-height: 1.2;
}
.pd-menu-header .pd-info .pd-email-text {
    font-size: .75rem;
    color: #9ca3af;
    margin-top: 2px;
}

/* Menu items */
.pd-link {
    display: flex;
    align-items: center;
    gap: .65rem;
    padding: .55rem 1rem;
    font-size: .875rem;
    color: #374151;
    text-decoration: none;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    font-family: inherit;
    transition: background .1s;
}
.pd-link:hover { background: #f9fafb; }
.pd-link.pd-active { background: #f5f3ff; color: #5b21b6; font-weight: 600; }
.pd-link .pd-icon { font-size: .95rem; width: 20px; text-align: center; flex-shrink: 0; }
.pd-divider { height: 1px; background: #f3f4f6; margin: .3rem 0; }
.pd-link.pd-danger { color: #dc2626; }
.pd-link.pd-danger:hover { background: #fef2f2; }
</style>

<nav id="navbar">
  <a class="nav-logo" href="index.php">
    <div class="nav-logo-icon">Ms</div>
    <span class="nav-logo-text">My<span>Speakora</span></span>
  </a>

<ul class="nav-links">
    <li>
        <a href="index.php" <?= $currentPage==='index.php' ? 'class="active"' : '' ?>>
            <i data-feather="home"></i>
            Home
        </a>
    </li>

    <?php if ($isLoggedIn): ?>
    <li>
        <a href="materi.php" <?= $currentPage==='materi.php' ? 'class="active"' : '' ?>>
            <i data-feather="book-open"></i>
            Materi
        </a>
    </li>

    <li>
        <a href="kamus.php" <?= $currentPage==='kamus.php' ? 'class="active"' : '' ?>>
            <i data-feather="book"></i>
            Kamus
        </a>
    </li>

    <li>
        <a href="kuis.php" <?= $currentPage==='kuis.php' ? 'class="active"' : '' ?>>
            <i data-feather="award"></i>
            Kuis
        </a>
    </li>
    <?php endif; ?>
</ul>
  <div class="nav-auth">
    <?php if ($isLoggedIn): ?>

      <!-- ── PROFILE DROPDOWN ── -->
      <div class="profile-dropdown-wrap" id="pdWrap">
        <button class="profile-dropdown-trigger" onclick="togglePd(event)" aria-haspopup="true" aria-expanded="false">
          <?php if (!empty($foto) && file_exists($foto)): ?>
            <img class="pd-photo" src="<?= htmlspecialchars($foto) ?>" alt="Foto Profil">
          <?php else: ?>
            <div class="pd-initials-circle"><?= $inisial ?></div>
          <?php endif; ?>
          <span class="pd-trigger-name"><?= $username ?></span>
          <span class="pd-chevron">▼</span>
        </button>

        <div class="pd-menu" role="menu">
          <!-- Header info -->
          <div class="pd-menu-header">
            <?php if (!empty($foto) && file_exists($foto)): ?>
              <img class="pd-avatar-lg" src="<?= htmlspecialchars($foto) ?>" alt="">
            <?php else: ?>
              <div class="pd-initials-lg"><?= $inisial ?></div>
            <?php endif; ?>
            <div class="pd-info">
              <div class="pd-fullname"><?= $namaLengkap ?></div>
              <?php if ($email): ?>
                <div class="pd-email-text"><?= $email ?></div>
              <?php endif; ?>
            </div>
          </div>

         <!-- Navigasi -->
<a class="pd-link <?= $currentPage==='edit_profil.php'?'pd-active':'' ?>" href="edit_profil.php" role="menuitem">
    <i data-feather="edit-2" class="pd-icon"></i>
    <span>Edit Profil</span>
</a>

<a class="pd-link <?= $currentPage==='materi.php'?'pd-active':'' ?>" href="materi.php" role="menuitem">
    <i data-feather="book-open" class="pd-icon"></i>
    <span>Materi</span>
</a>

<a class="pd-link <?= $currentPage==='kamus.php'?'pd-active':'' ?>" href="kamus.php" role="menuitem">
    <i data-feather="book" class="pd-icon"></i>
    <span>Kamus</span>
</a>

<a class="pd-link <?= $currentPage==='kuis.php'?'pd-active':'' ?>" href="kuis.php" role="menuitem">
    <i data-feather="award" class="pd-icon"></i>
    <span>Kuis</span>
</a>

<a class="pd-link <?= $currentPage==='pengaturan.php'?'pd-active':'' ?>" href="pengaturan.php" role="menuitem">
    <i data-feather="settings" class="pd-icon"></i>
    <span>Pengaturan</span>
</a>

<div class="pd-divider"></div>

<!-- Logout -->
<a class="pd-link pd-danger" href="logout.php" role="menuitem">
    <i data-feather="log-out" class="pd-icon"></i>
    <span>Logout</span>
</a>
    <?php else: ?>
      <a class="btn-login"    onclick="openModal('login')">Login</a>
      <a class="btn-register" onclick="openModal('register')">Register</a>
    <?php endif; ?>
  </div>

  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>

<script>
function togglePd(e) {
    e.stopPropagation();
    const w = document.getElementById('pdWrap');
    if (!w) return;
    const open = w.classList.toggle('open');
    w.querySelector('.profile-dropdown-trigger').setAttribute('aria-expanded', open);
}
document.addEventListener('click', function(e) {
    const w = document.getElementById('pdWrap');
    if (w && !w.contains(e.target)) {
        w.classList.remove('open');
        const btn = w.querySelector('.profile-dropdown-trigger');
        if (btn) btn.setAttribute('aria-expanded', 'false');
    }
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const w = document.getElementById('pdWrap');
        if (w) w.classList.remove('open');
    }
});
</script>