<?php
session_start();
require_once 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$pesan_sukses = '';
$pesan_error  = '';

// Tangkap pesan error dari proses hapus akun (jika ada)
if (isset($_SESSION['hapus_akun_error'])) {
    $pesan_error = $_SESSION['hapus_akun_error'];
    unset($_SESSION['hapus_akun_error']);
}

// Ambil data user saat ini
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// ── PROSES FORM ──────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_depan  = trim($_POST['nama_depan']);
    $nama_belakang = trim($_POST['nama_belakang']);
    $username    = trim($_POST['username']);
    $email       = trim($_POST['email']);
    $password_lama   = $_POST['password_lama'];
    $password_baru   = $_POST['password_baru'];
    $konfirmasi_pw   = $_POST['konfirmasi_password'];

    // Validasi field wajib
    if (empty($nama_depan) || empty($username) || empty($email)) {
        $pesan_error = "Nama depan, username, dan email wajib diisi.";
    }
    // Cek username unik (selain milik sendiri)
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan_error = "Format email tidak valid.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
        $stmt->bind_param("si", $username, $user_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $pesan_error = "Username sudah digunakan orang lain.";
        }
        $stmt->close();
    }

    // Cek email unik
    if (empty($pesan_error)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $user_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $pesan_error = "Email sudah digunakan akun lain.";
        }
        $stmt->close();
    }

    // Proses ganti password (opsional)
    $hash_baru = $user['password']; // default tetap sama
    if (empty($pesan_error) && !empty($password_baru)) {
        if (!password_verify($password_lama, $user['password'])) {
            $pesan_error = "Password lama tidak sesuai.";
        } elseif (strlen($password_baru) < 8) {
            $pesan_error = "Password baru minimal 8 karakter.";
        } elseif ($password_baru !== $konfirmasi_pw) {
            $pesan_error = "Konfirmasi password baru tidak cocok.";
        } else {
            $hash_baru = password_hash($password_baru, PASSWORD_DEFAULT);
        }
    }

    // ── Upload foto profil (opsional) ──
    $foto = $user['foto']; // tetap foto lama
    if (empty($pesan_error) && isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ekstensi_ok = ['image/jpeg', 'image/png', 'image/gif'];
        $mime = mime_content_type($_FILES['foto']['tmp_name']);
        if (!in_array($mime, $ekstensi_ok)) {
            $pesan_error = "Format foto tidak didukung (gunakan jpg, png, atau gif).";
        } elseif ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
            $pesan_error = "Ukuran foto maksimal 2 MB.";
        } else {
            $ext    = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nama   = 'user_' . $user_id . '_' . time() . '.' . $ext;
            $tujuan = 'asset/foto_profil/' . $nama;

            if (!is_dir('asset/foto_profil')) {
                mkdir('asset/foto_profil', 0755, true);
            }

            // Hapus foto lama jika ada & bukan default
            if (!empty($user['foto']) && file_exists($user['foto']) && $user['foto'] !== 'asset/foto_profil/default.png') {
                unlink($user['foto']);
            }

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {
                $foto = $tujuan;
            } else {
                $pesan_error = "Gagal mengupload foto.";
            }
        }
    }

    // ── Simpan ke database ──
    if (empty($pesan_error)) {
        $stmt = $conn->prepare("
            UPDATE users
            SET nama_depan = ?, nama_belakang = ?, username = ?, email = ?, password = ?, foto = ?
            WHERE id = ?
        ");
        $stmt->bind_param("ssssssi", $nama_depan, $nama_belakang, $username, $email, $hash_baru, $foto, $user_id);

        if ($stmt->execute()) {
            // Perbarui session
            $_SESSION['username'] = $username;
            $_SESSION['nama']     = $nama_depan . ' ' . $nama_belakang;
            $_SESSION['foto'] = $foto;

            // Reload data user terbaru
            $user['nama_depan']   = $nama_depan;
            $user['nama_belakang'] = $nama_belakang;
            $user['username']     = $username;
            $user['email']        = $email;
            $user['foto']         = $foto;

            $pesan_sukses = "Profil berhasil diperbarui!";
        } else {
            $pesan_error = "Terjadi kesalahan saat menyimpan. Coba lagi.";
        }
        $stmt->close();
    }
}

// Helper: inisial nama
function inisial($nama_depan, $nama_belakang) {
    $a = mb_strtoupper(mb_substr($nama_depan,  0, 1));
    $b = mb_strtoupper(mb_substr($nama_belakang, 0, 1));
    return $a . $b;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* ── Layout ── */
      .ep-wrapper {
    max-width: 680px;
    margin: 85px auto 2rem auto;
    padding: 0 1rem;
}

        .ep-page-header {
            margin-bottom: 1.5rem;
        }
        .ep-page-header h1 {
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0 0 .25rem;
        }
        .ep-page-header p {
            color: #6b7280;
            margin: 0;
            font-size: .9rem;
        }

        /* ── Cards ── */
        .ep-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.25rem;
        }
        .ep-card-title {
            font-size: .75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #9ca3af;
            margin-bottom: 1rem;
            padding-bottom: .75rem;
            border-bottom: 1px solid #f3f4f6;
        }

        /* ── Avatar ── */
        .ep-avatar-row {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }
        .ep-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }
        .ep-avatar-initials {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #ede9fe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: #5b21b6;
            flex-shrink: 0;
        }
        .ep-avatar-meta {
            flex: 1;
        }
        .ep-avatar-meta strong {
            display: block;
            font-size: 1rem;
            margin-bottom: .2rem;
        }
        .ep-avatar-meta small {
            color: #9ca3af;
            font-size: .8rem;
        }
        .ep-btn-photo {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: .5rem;
            padding: 6px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: transparent;
            font-size: .85rem;
            cursor: pointer;
            transition: background .15s;
        }
        .ep-btn-photo:hover { background: #f9fafb; }

        /* ── Form ── */
        .ep-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        @media (max-width: 520px) {
            .ep-form-grid { grid-template-columns: 1fr; }
        }
        .ep-form-group {
            display: flex;
            flex-direction: column;
            gap: .35rem;
        }
        .ep-form-group.full { grid-column: 1 / -1; }
        .ep-form-group label {
            font-size: .85rem;
            color: #374151;
            font-weight: 500;
        }
        .ep-form-group input {
            height: 40px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0 .75rem;
            font-size: .9rem;
            transition: border-color .15s, box-shadow .15s;
            outline: none;
            width: 100%;
        }
        .ep-form-group input:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124,58,237,.12);
        }
        .ep-hint {
            font-size: .78rem;
            color: #9ca3af;
        }
        .ep-input-icon {
            position: relative;
        }
        .ep-input-icon input {
            padding-right: 2.5rem;
        }
        .ep-input-icon .toggle-pw {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #9ca3af;
            padding: 0;
            font-size: 1rem;
            line-height: 1;
        }

        /* ── Alert ── */
        .ep-alert {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .75rem 1rem;
            border-radius: 8px;
            font-size: .875rem;
            margin-bottom: 1.25rem;
        }
        .ep-alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
        }
        .ep-alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }

        /* ── Actions ── */
        .ep-actions {
            display: flex;
            justify-content: flex-end;
            gap: .75rem;
        }
        .ep-btn-cancel {
            padding: 9px 20px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: transparent;
            font-size: .9rem;
            cursor: pointer;
            text-decoration: none;
            color: #374151;
        }
        .ep-btn-save {
            padding: 9px 22px;
            border: none;
            border-radius: 8px;
            background: #5b21b6;
            color: #fff;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .15s;
        }
        .ep-btn-save:hover { background: #4c1d95; }

        /* ── Zona Bahaya ── */
        .ep-card-danger {
             border-color: #e5e7eb;
              margin-top: 1.5rem;
    }
     
        .ep-card-title-danger {
            color: #dc2626;
        }
        .ep-danger-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .ep-danger-text strong {
            display: block;
            font-size: .9rem;
            margin-bottom: .2rem;
            color: #1f2937;
        }
        .ep-danger-text p {
            font-size: .82rem;
            color: #9ca3af;
            margin: 0;
        }
        .ep-btn-delete {
            padding: 9px 20px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            background: #fef2f2;
            color: #dc2626;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            transition: background .15s;
        }
        .ep-btn-delete:hover { background: #fee2e2; }

        /* ── Modal Konfirmasi Hapus ── */
        .ep-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            align-items: center;
            justify-content: center;
            z-index: 999;
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
        .ep-modal-box h3 {
            margin: 0 0 .5rem;
            font-size: 1.05rem;
            color: #dc2626;
        }
        .ep-modal-box p {
            font-size: .85rem;
            color: #6b7280;
            margin: 0 0 1rem;
            line-height: 1.5;
        }
        .ep-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: .6rem;
            margin-top: 1.25rem;
        }
        .ep-btn-cancel-modal {
            padding: 9px 18px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: transparent;
            font-size: .88rem;
            cursor: pointer;
            color: #374151;
        }
        .ep-btn-confirm-delete {
            padding: 9px 18px;
            border: none;
            border-radius: 8px;
            background: #dc2626;
            color: #fff;
            font-size: .88rem;
            font-weight: 600;
            cursor: pointer;
        }
        .ep-btn-confirm-delete:hover { background: #b91c1c; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="ep-wrapper">

    <!-- Header -->
    <div class="ep-page-header">
        <h1>✏️ Edit Profil</h1>
        <p>Perbarui informasi akun kamu</p>
    </div>

    <!-- Alert sukses / error -->
    <?php if ($pesan_sukses): ?>
        <div class="ep-alert ep-alert-success">
            ✅ <?= htmlspecialchars($pesan_sukses) ?>
        </div>
    <?php endif; ?>
    <?php if ($pesan_error): ?>
        <div class="ep-alert ep-alert-error">
            ⚠️ <?= htmlspecialchars($pesan_error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" novalidate>

        <!-- ── Foto profil ── -->
        <div class="ep-card">
            <div class="ep-card-title">Foto profil</div>
            <div class="ep-avatar-row">
                <?php if (!empty($user['foto']) && file_exists($user['foto'])): ?>
                    <img src="<?= htmlspecialchars($user['foto']) ?>"
                         alt="Foto profil" class="ep-avatar" id="preview-foto">
                <?php else: ?>
                    <div class="ep-avatar-initials" id="preview-initials">
                        <?= inisial($user['nama_depan'] ?? '', $user['nama_belakang'] ?? '') ?>
                    </div>
                <?php endif; ?>

                <div class="ep-avatar-meta">
                    <strong><?= htmlspecialchars(($user['nama_depan'] ?? '') . ' ' . ($user['nama_belakang'] ?? '')) ?></strong>
                    <small>Format: jpg, png, gif — maks. 2 MB</small><br>
                    <label class="ep-btn-photo" for="input-foto">
                        📤 Ganti foto
                    </label>
                    <input type="file" id="input-foto" name="foto"
                           accept="image/jpeg,image/png,image/gif"
                           style="display:none">
                </div>
            </div>
        </div>

        <!-- ── Informasi pribadi ── -->
        <div class="ep-card">
            <div class="ep-card-title">Informasi pribadi</div>
            <div class="ep-form-grid">
                <div class="ep-form-group">
                    <label for="nama_depan">Nama depan <span style="color:#ef4444">*</span></label>
                    <input type="text" id="nama_depan" name="nama_depan"
                           value="<?= htmlspecialchars($user['nama_depan'] ?? '') ?>"
                           required>
                </div>
                <div class="ep-form-group">
                    <label for="nama_belakang">Nama belakang</label>
                    <input type="text" id="nama_belakang" name="nama_belakang"
                           value="<?= htmlspecialchars($user['nama_belakang'] ?? '') ?>">
                </div>
                <div class="ep-form-group full">
                    <label for="username">Username <span style="color:#ef4444">*</span></label>
                    <input type="text" id="username" name="username"
                           value="<?= htmlspecialchars($user['username'] ?? '') ?>"
                           required autocomplete="username">
                    <span class="ep-hint">Digunakan untuk login. Harus unik dan tanpa spasi.</span>
                </div>
                <div class="ep-form-group full">
                    <label for="email">Email <span style="color:#ef4444">*</span></label>
                    <input type="email" id="email" name="email"
                           value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                           required autocomplete="email">
                </div>
            </div>
        </div>

        <!-- ── Ganti password ── -->
        <div class="ep-card">
            <div class="ep-card-title">Ganti password</div>
            <div class="ep-form-grid">
                <div class="ep-form-group full">
                    <label for="password_lama">Password lama</label>
                    <div class="ep-input-icon">
                        <input type="password" id="password_lama" name="password_lama"
                               placeholder="Masukkan password saat ini"
                               autocomplete="current-password">
                        <button type="button" class="toggle-pw" data-target="password_lama" aria-label="Tampilkan password">👁</button>
                    </div>
                </div>
                <div class="ep-form-group">
                    <label for="password_baru">Password baru</label>
                    <div class="ep-input-icon">
                        <input type="password" id="password_baru" name="password_baru"
                               placeholder="Min. 8 karakter"
                               autocomplete="new-password">
                        <button type="button" class="toggle-pw" data-target="password_baru" aria-label="Tampilkan password">👁</button>
                    </div>
                </div>
                <div class="ep-form-group">
                    <label for="konfirmasi_password">Konfirmasi password baru</label>
                    <div class="ep-input-icon">
                        <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                               placeholder="Ulangi password baru"
                               autocomplete="new-password">
                        <button type="button" class="toggle-pw" data-target="konfirmasi_password" aria-label="Tampilkan password">👁</button>
                    </div>
                </div>
                <div class="ep-form-group full">
                    <span class="ep-hint">Kosongkan ketiga field ini jika tidak ingin mengganti password.</span>
                </div>
            </div>
        </div>

        <!-- ── Tombol aksi ── -->
        <div class="ep-actions">
            <a href="index.php" class="ep-btn-cancel">Batal</a>
            <button type="submit" class="ep-btn-save">💾 Simpan perubahan</button>
        </div>

    </form>

    <!-- ──  Hapus Akun ── -->
    <div class="ep-card ep-card-danger">
        <div class="ep-card-title ep-card-title-danger"></div>
        <div class="ep-danger-row">
            <div class="ep-danger-text">
                <strong>Hapus Akun</strong>
                <p>Akun dan semua data kamu akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <button type="button" class="ep-btn-delete" onclick="openDeleteModal()">🗑️ Hapus Akun</button>
        </div>
    </div>
</div>

<!-- ── Modal Konfirmasi Hapus Akun ── -->
<div class="ep-modal-overlay" id="deleteModal">
    <div class="ep-modal-box">
        <h3>⚠️ Hapus Akun Permanen</h3>
        <p>Tindakan ini tidak dapat dibatalkan. Semua data akunmu (profil, foto, dan riwayat) akan dihapus selamanya. Masukkan password kamu untuk konfirmasi.</p>
        <form method="POST" action="hapus_akun.php">
            <div class="ep-form-group">
                <label for="password_konfirmasi">Password</label>
                <input type="password" id="password_konfirmasi" name="password_konfirmasi" placeholder="Masukkan password kamu" required>
            </div>
            <div class="ep-modal-actions">
                <button type="button" class="ep-btn-cancel-modal" onclick="closeDeleteModal()">Batal</button>
                <button type="submit" class="ep-btn-confirm-delete">Ya, Hapus Akun Saya</button>
            </div>
        </form>
    </div>
</div>

<script>
// Preview foto sebelum upload
document.getElementById('input-foto').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        // Cek apakah sudah ada elemen <img> atau inisial
        let img = document.getElementById('preview-foto');
        const inisial = document.getElementById('preview-initials');

        if (!img) {
            img = document.createElement('img');
            img.id = 'preview-foto';
            img.alt = 'Foto profil';
            img.className = 'ep-avatar';
            if (inisial) inisial.replaceWith(img);
        }
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
});

// Toggle show/hide password
document.querySelectorAll('.toggle-pw').forEach(btn => {
    btn.addEventListener('click', function () {
        const input = document.getElementById(this.dataset.target);
        if (!input) return;
        input.type = input.type === 'password' ? 'text' : 'password';
        this.textContent = input.type === 'password' ? '👁' : '🙈';
    });
});

// ── Modal Hapus Akun ──
function openDeleteModal() {
    document.getElementById('deleteModal').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('open');
    document.body.style.overflow = '';
}
document.getElementById('deleteModal').addEventListener('click', function (e) {
    if (e.target === this) closeDeleteModal();
});
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeDeleteModal();
});
</script>

</body>
</html>