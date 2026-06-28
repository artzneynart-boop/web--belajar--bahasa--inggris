<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$currentPage = 'pengaturan.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySpeakora — Pengaturan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .pg-wrapper {
            max-width: 620px;
            margin: 100px auto 3rem auto;
            padding: 0 1.25rem;
        }
        .pg-header {
            margin-bottom: 1.75rem;
        }
        .pg-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 .25rem;
        }
        .pg-header p {
            color: #6b7280;
            font-size: .9rem;
            margin: 0;
        }

        /* ── Section card ── */
        .pg-section {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 1.1rem;
        }
        .pg-section-title {
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: .75rem 1.1rem;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #9ca3af;
            border-bottom: 1px solid #f3f4f6;
            background: #fafafa;
        }
        .pg-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .85rem 1.1rem;
            border-bottom: 1px solid #f9fafb;
            gap: 1rem;
            transition: background .1s;
        }
        .pg-row:last-child { border-bottom: none; }
        .pg-row:hover { background: #f9fafb; }
        .pg-row-left {
            display: flex;
            align-items: center;
            gap: .65rem;
        }
        .pg-row-icon {
            font-size: 1.05rem;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .pg-row-text .pg-row-label {
            font-size: .875rem;
            font-weight: 500;
            color: #1f2937;
            line-height: 1.2;
        }
        .pg-row-text .pg-row-sub {
            font-size: .75rem;
            color: #9ca3af;
            margin-top: 1px;
        }
        .pg-row-right {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-shrink: 0;
        }

        /* Badge */
        .pg-badge {
            font-size: .7rem;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 20px;
        }
        .pg-badge-active { background: #dcfce7; color: #15803d; }
        .pg-badge-soon   { background: #f3f4f6; color: #9ca3af; }

        /* Active indicator dot */
        .pg-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #2563eb;
            flex-shrink: 0;
        }

        /* Chevron */
        .pg-chevron { color: #d1d5db; font-size: .8rem; }

        /* Link rows */
        .pg-row-link {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
        .pg-row-link:hover .pg-row-label { color: #2563eb; }

        /* Danger row */
        .pg-row-danger .pg-row-label { color: #dc2626; }
        .pg-row-danger .pg-row-icon  { background: #fef2f2; }
        .pg-row-danger:hover          { background: #fef2f2 !important; }

        /* Versi info */
        .pg-version-badge {
            font-size: .8rem;
            font-weight: 600;
            color: #374151;
            background: #f3f4f6;
            padding: 3px 10px;
            border-radius: 20px;
        }

        /* Modal konfirmasi hapus akun */
        .ep-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 1rem;
        }
        .ep-modal-overlay.open { display: flex; }
        .ep-modal-box {
            background: #fff;
            border-radius: 14px;
            padding: 1.75rem;
            max-width: 400px;
            width: 100%;
        }
        .ep-modal-box h3 { margin: 0 0 .5rem; font-size: 1.05rem; color: #dc2626; }
        .ep-modal-box p  { font-size: .85rem; color: #6b7280; margin: 0 0 1rem; line-height: 1.5; }
        .ep-form-group { display: flex; flex-direction: column; gap: .35rem; margin-bottom: 1rem; }
        .ep-form-group label { font-size: .85rem; font-weight: 500; color: #374151; }
        .ep-form-group input {
            height: 40px; border: 1px solid #d1d5db; border-radius: 8px;
            padding: 0 .75rem; font-size: .9rem; outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .ep-form-group input:focus { border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,.12); }
        .ep-modal-actions { display: flex; justify-content: flex-end; gap: .6rem; }
        .ep-btn-cancel-modal {
            padding: 9px 18px; border: 1px solid #d1d5db; border-radius: 8px;
            background: transparent; font-size: .88rem; cursor: pointer; color: #374151;
        }
        .ep-btn-confirm-delete {
            padding: 9px 18px; border: none; border-radius: 8px;
            background: #dc2626; color: #fff; font-size: .88rem;
            font-weight: 600; cursor: pointer;
        }
        .ep-btn-confirm-delete:hover { background: #b91c1c; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="pg-wrapper">

    <div class="pg-header">
       <h1><i data-feather="settings"></i> Pengaturan</h1>
        <p>Kelola preferensi dan keamanan akun kamu</p>
    </div>

    <!-- ── 🎨 Tema ── -->
    <div class="pg-section">
       <div class="pg-section-title">
    <i data-feather="droplet"></i>
    Tema
</div>
        <div class="pg-row">
            <div class="pg-row-left">
               <div class="pg-row-icon">
    <i data-feather="sun"></i>
</div>
                <div class="pg-row-text">
                    <div class="pg-row-label">Light Mode</div>
                    <div class="pg-row-sub">Tampilan terang (aktif)</div>
                </div>
            </div>
            <div class="pg-row-right">
                <div class="pg-dot"></div>
                <span class="pg-badge pg-badge-active">Aktif</span>
            </div>
        </div>

        <div class="pg-row">
            <div class="pg-row-left">
              <div class="pg-row-icon">
    <i data-feather="moon"></i>
</div>
                <div class="pg-row-text">
                    <div class="pg-row-label">Dark Mode</div>
                    <div class="pg-row-sub">Tampilan gelap</div>
                </div>
            </div>
            <div class="pg-row-right">
                <span class="pg-badge pg-badge-soon">Segera Hadir</span>
            </div>
        </div>
    </div>

    <!-- ── 🌐 Bahasa ── -->
    <div class="pg-section">
    <div class="pg-section-title">
    <i data-feather="globe"></i>
    Bahasa
</div>

        <div class="pg-row">
            <div class="pg-row-left">
             <div class="pg-row-icon">
    <i data-feather="flag"></i>
</div>
                <div class="pg-row-text">
                    <div class="pg-row-label">Indonesia</div>
                    <div class="pg-row-sub">Bahasa antarmuka saat ini</div>
                </div>
            </div>
            <div class="pg-row-right">
                <div class="pg-dot"></div>
                <span class="pg-badge pg-badge-active">Aktif</span>
            </div>
        </div>

        <div class="pg-row">
            <div class="pg-row-left">
              <div class="pg-row-icon">
    <i data-feather="globe"></i>
</div>
                <div class="pg-row-text">
                    <div class="pg-row-label">English</div>
                    <div class="pg-row-sub">Switch to English interface</div>
                </div>
            </div>
            <div class="pg-row-right">
                <span class="pg-badge pg-badge-soon">Segera Hadir</span>
            </div>
        </div>
    </div>

    <!-- ── 🔐 Keamanan ── -->
    <div class="pg-section">
    <div class="pg-section-title">
    <i data-feather="shield"></i>
    Keamanan
</div>

        <a class="pg-row pg-row-link" href="edit_profil.php">
            <div class="pg-row-left">
               <div class="pg-row-icon">
    <i data-feather="key"></i>
</div>
                <div class="pg-row-text">
                    <div class="pg-row-label">Ubah Password</div>
                    <div class="pg-row-sub">Perbarui password akun kamu</div>
                </div>
            </div>
            <div class="pg-row-right">
                <span class="pg-chevron">›</span>
            </div>
        </a>

        <div class="pg-row pg-row-danger" onclick="openDeleteModal()" style="cursor:pointer;">
            <div class="pg-row-left">
              <div class="pg-row-icon">
    <i data-feather="trash-2"></i>
</div>
                <div class="pg-row-text">
                    <div class="pg-row-label">Hapus Akun</div>
                    <div class="pg-row-sub" style="color:#fca5a5;">Tindakan ini tidak dapat dibatalkan</div>
                </div>
            </div>
            <div class="pg-row-right">
                <span class="pg-chevron">›</span>
            </div>
        </div>
    </div>

    <!-- ── ℹ️ Tentang ── -->
    <div class="pg-section">
     <div class="pg-section-title">
    <i data-feather="info"></i>
    Tentang
</div>
        <div class="pg-row">
            <div class="pg-row-left">
                <div class="pg-row-icon" style="background:#eff6ff;">
                    <div style="font-size:.7rem;font-weight:800;color:#2563eb;line-height:1;">Ms</div>
                </div>
                <div class="pg-row-text">
                    <div class="pg-row-label">MySpeakora</div>
                    <div class="pg-row-sub">Platform belajar bahasa Inggris</div>
                </div>
            </div>
            <div class="pg-row-right">
                <span class="pg-version-badge">v1.0.0</span>
            </div>
        </div>
    </div>

</div><!-- /pg-wrapper -->

<!-- ── Modal Konfirmasi Hapus Akun ── -->
<div class="ep-modal-overlay" id="deleteModal">
    <div class="ep-modal-box">
        <h3>
    <i data-feather="alert-triangle"></i>
    Hapus Akun Permanen
</h3>
        <p>Tindakan ini tidak dapat dibatalkan. Semua data akunmu akan dihapus selamanya. Masukkan password kamu untuk konfirmasi.</p>
        <form method="POST" action="hapus_akun.php">
            <div class="ep-form-group">
                <label for="password_konfirmasi">Password</label>
                <input type="password" id="password_konfirmasi" name="password_konfirmasi"
                       placeholder="Masukkan password kamu" required>
            </div>
            <div class="ep-modal-actions">
                <button type="button" class="ep-btn-cancel-modal" onclick="closeDeleteModal()">Batal</button>
                <button type="submit" class="ep-btn-confirm-delete">Ya, Hapus Akun Saya</button>
            </div>
        </form>
    </div>
</div>

<script src="script.js"></script>
<script>
feather.replace();
</script>
<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('open');
    document.body.style.overflow = '';
}
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeDeleteModal();
});
</script>
</body>
</html>