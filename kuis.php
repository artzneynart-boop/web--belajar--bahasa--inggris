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
  <title>MySpeakora — Kuis</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css"/>
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    #kuis { padding-top: 110px; min-height: 100vh; }

    /* ── COMPACT QUIZ OPTIONS ── */
    .ki-opts { display: flex; flex-direction: column; gap: 6px; }
    .ki-opt {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 12px;
      border-radius: 8px;
      border: 0.5px solid #e5e7eb;
      background: #fff;
      cursor: pointer;
      transition: background 0.15s, border-color 0.15s;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      color: #1f2937;
      text-align: left;
      width: 100%;
    }
    .ki-opt:hover:not(.ki-disabled) { background: #f9fafb; }
    .ki-opt.ki-correct { border-color: #1D9E75 !important; background: #E1F5EE !important; }
    .ki-opt.ki-wrong   { border-color: #dc2626 !important; background: #fef2f2 !important; }
    .ki-opt.ki-disabled { cursor: default; }
    .ki-opt-letter {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: #f3f4f6;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 600;
      color: #6b7280;
      flex-shrink: 0;
    }
    .ki-opt.ki-correct .ki-opt-letter { background: #1D9E75; color: #fff; }
    .ki-opt.ki-wrong   .ki-opt-letter { background: #dc2626; color: #fff; }
    .ki-opt-text { font-size: 14px; }

    /* ── COMPACT QUESTION CARD ── */
    .ki-card { padding: 14px 16px; margin-bottom: 12px; }
    .ki-qnum { font-size: 11px; color: #9ca3af; margin-bottom: 6px; }
    .ki-qtext { font-size: 15px; font-weight: 500; line-height: 1.4; }
  </style>
</head>
<body>
 
<?php include 'navbar.php'; ?>
 
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

<!-- ═══════ KUIS INTERAKTIF (TAMBAHAN) ═══════ -->
<section id="kuis-interaktif" style="padding-top:32px; padding-bottom:40px;">
  <div class="section-tag" style="font-size:.75rem; padding:4px 12px; margin-bottom:10px;">🎯 Mulai Berlatih</div>
  <h2 class="section-title" style="font-size:1.4rem; margin-bottom:6px;">Kuis Lengkap — 10 Soal</h2>
  <p class="section-sub" style="font-size:.85rem; margin-bottom:20px;">Jawab 10 soal bertingkat dari Pemula hingga Mahir. Ada timer, feedback, dan skor akhir!</p>

  <div class="ki-wrapper">
    <!-- QUIZ SECTION -->
    <div id="ki-quiz">
      <div class="ki-topbar">
        <div class="ki-progress-bg" style="height:6px; border-radius:3px; margin-bottom:10px;"><div class="ki-progress-fill" id="ki-progress-fill"></div></div>
        <div class="ki-meta" style="font-size:.8rem;">
          <span id="ki-counter" style="font-size:.8rem;">Soal 1 dari 10</span>
          <span class="ki-badge" id="ki-level" style="font-size:.75rem; padding:3px 10px;">Pemula</span>
          <span class="ki-timer" id="ki-timer" style="font-size:.8rem; padding:3px 10px;">⏱ 30</span>
        </div>
      </div>

      <div class="ki-card">
        <div class="ki-qnum" id="ki-qnum">Soal 1</div>
        <div class="ki-qtext" id="ki-qtext"></div>
      </div>

      <div class="ki-opts" id="ki-opts"></div>

      <div class="ki-feedback" id="ki-feedback"></div>

      <div style="display:flex;justify-content:flex-end;">
        <button class="ki-btn-next" id="ki-btn-next" disabled onclick="kiNext()">Lanjut →</button>
      </div>
    </div>

    <!-- SCORE SECTION -->
    <div id="ki-score" class="ki-hidden">
      <div class="ki-score-inner">
        <div class="ki-score-circle">
          <span class="ki-score-num" id="ki-score-num">0</span>
          <span class="ki-score-of">dari 10</span>
        </div>
        <div class="ki-score-title" id="ki-score-title">Bagus sekali!</div>
        <div class="ki-score-sub" id="ki-score-sub">Kamu sudah menyelesaikan kuis ini.</div>
        <div class="ki-score-stats">
          <div class="ki-score-stat">
            <div class="ki-score-val" style="color:#16a34a" id="ki-stat-benar">0</div>
            <div class="ki-score-lbl">Benar</div>
          </div>
          <div class="ki-score-stat">
            <div class="ki-score-val" style="color:#dc2626" id="ki-stat-salah">0</div>
            <div class="ki-score-lbl">Salah</div>
          </div>
          <div class="ki-score-stat">
            <div class="ki-score-val" id="ki-stat-pct">0%</div>
            <div class="ki-score-lbl">Skor</div>
          </div>
        </div>
        <button class="btn-primary" onclick="kiRestart()">Ulangi Kuis ↺</button>
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
      <li><a href="kuis.html">Kamus</a></li>
      <li><a href="kamus.html">Kuis</a></li>
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

<!-- ═══════ KUIS INTERAKTIF SCRIPT (TAMBAHAN) ═══════ -->
<script>
(function() {
  const kiQuestions = [
    {
      text: 'She ___ to the market every Sunday with her family.',
      opts: ['go','goes','going','gone'],
      answer: 1, level: 'Pemula',
      fb: { y: 'Benar! Untuk subjek orang ketiga tunggal (she/he/it), kata kerja ditambah akhiran -s/-es.', n: 'Salah. Karena subjeknya "she" (orang ketiga tunggal), gunakan "goes".' }
    },
    {
      text: 'They ___ playing football when it started to rain.',
      opts: ['was','are','were','is'],
      answer: 2, level: 'Pemula',
      fb: { y: 'Benar! "They" adalah subjek jamak sehingga menggunakan "were" dalam Past Continuous Tense.', n: 'Salah. Subjek "they" jamak, gunakan "were" untuk Past Continuous Tense.' }
    },
    {
      text: 'I have ___ my homework before dinner.',
      opts: ['finish','finished','finishing','finishes'],
      answer: 1, level: 'Pemula',
      fb: { y: 'Benar! Setelah "have/has/had" dalam Present Perfect, gunakan Past Participle (V3).', n: 'Salah. Present Perfect Tense = have + V3, jadi gunakan "finished".' }
    },
    {
      text: 'The report ___ by the manager before the deadline.',
      opts: ['submitted','was submitted','submitting','has submit'],
      answer: 1, level: 'Menengah',
      fb: { y: 'Benar! Ini kalimat pasif (Passive Voice): was/were + Past Participle.', n: 'Salah. Kalimat ini butuh Passive Voice: "was submitted" (was + V3).' }
    },
    {
      text: 'If I ___ you, I would apologize to her immediately.',
      opts: ['am','was','were','be'],
      answer: 2, level: 'Menengah',
      fb: { y: 'Benar! Dalam Conditional Type 2, gunakan "were" untuk semua subjek termasuk I.', n: 'Salah. Conditional Type 2 (situasi tidak nyata) menggunakan "were" untuk semua subjek.' }
    },
    {
      text: 'She suggested ___ the meeting to next Monday.',
      opts: ['to postpone','postponing','postpone','postponed'],
      answer: 1, level: 'Menengah',
      fb: { y: 'Benar! Kata kerja "suggest" diikuti gerund (V-ing), bukan infinitive.', n: 'Salah. "Suggest" selalu diikuti gerund (-ing): "postponing".' }
    },
    {
      text: 'By the time she arrived, the guests ___.',
      opts: ['had already left','already left','have already left','already leaving'],
      answer: 0, level: 'Menengah',
      fb: { y: 'Benar! Satu kejadian selesai sebelum kejadian lain di masa lalu → Past Perfect: had + V3.', n: 'Salah. Gunakan Past Perfect "had already left" untuk aksi yang selesai sebelum kejadian lain di masa lalu.' }
    },
    {
      text: 'The more you practice, ___ you become.',
      opts: ['the more fluent','more fluent','most fluent','the most fluent'],
      answer: 0, level: 'Mahir',
      fb: { y: 'Benar! Pola "The more..., the + comparative" digunakan untuk double comparison.', n: 'Salah. Gunakan pola "The more..., the + comparative adjective" → "the more fluent".' }
    },
    {
      text: 'He denied ___ the confidential files from the server.',
      opts: ['to steal','steal','having stolen','stolen'],
      answer: 2, level: 'Mahir',
      fb: { y: 'Benar! Setelah "deny" untuk aksi masa lalu, gunakan "having + V3".', n: 'Salah. Setelah "deny" untuk aksi masa lalu, gunakan "having + past participle" → "having stolen".' }
    },
    {
      text: 'Not only ___ the exam, but she also received a scholarship.',
      opts: ['she passed','did she pass','she did pass','passed she'],
      answer: 1, level: 'Mahir',
      fb: { y: 'Benar! Setelah "Not only" di awal kalimat, terjadi subject-auxiliary inversion: did + subjek + verb.', n: 'Salah. Setelah "Not only" di awal kalimat, gunakan inverted word order: "did she pass".' }
    }
  ];

  let kiCurrent = 0, kiScore = 0, kiBenar = 0, kiSalah = 0;
  let kiAnswered = false, kiTimerVal = 30, kiTimerInt = null;

  function kiStartTimer() {
    clearInterval(kiTimerInt);
    kiTimerVal = 30;
    kiUpdateTimer();
    kiTimerInt = setInterval(function() {
      kiTimerVal--;
      kiUpdateTimer();
      if (kiTimerVal <= 0) { clearInterval(kiTimerInt); if (!kiAnswered) kiTimeOut(); }
    }, 1000);
  }

  function kiUpdateTimer() {
    var el = document.getElementById('ki-timer');
    if (!el) return;
    el.textContent = '⏱ ' + kiTimerVal;
    el.className = kiTimerVal <= 10 ? 'ki-timer urgent' : 'ki-timer';
  }

  function kiTimeOut() {
    kiAnswered = true; kiSalah++;
    document.querySelectorAll('.ki-opt').forEach(function(o) { o.classList.add('ki-disabled'); });
    document.querySelectorAll('.ki-opt')[kiQuestions[kiCurrent].answer].classList.add('ki-correct');
    kiShowFeedback(false, true);
    document.getElementById('ki-btn-next').disabled = false;
  }

  function kiLoad(idx) {
    kiAnswered = false;
    var q = kiQuestions[idx];
    var pct = Math.round((idx + 1) / 10 * 100);
    document.getElementById('ki-progress-fill').style.width = pct + '%';
    document.getElementById('ki-counter').textContent = 'Soal ' + (idx + 1) + ' dari 10';
    document.getElementById('ki-qnum').textContent = 'Soal ' + (idx + 1);
    document.getElementById('ki-level').textContent = q.level;
    document.getElementById('ki-qtext').textContent = q.text;
    var grid = document.getElementById('ki-opts');
    grid.innerHTML = '';
    var letters = ['A','B','C','D'];
    q.opts.forEach(function(opt, i) {
      var btn = document.createElement('button');
      btn.className = 'ki-opt';
      btn.innerHTML = '<span class="ki-opt-letter">' + letters[i] + '</span><span class="ki-opt-text">' + opt + '</span>';
      btn.onclick = function() { kiSelect(i); };
      btn.style.cssText = '';
      grid.appendChild(btn);
    });
    var fb = document.getElementById('ki-feedback');
    fb.className = 'ki-feedback';
    fb.textContent = '';
    document.getElementById('ki-btn-next').disabled = true;
    kiStartTimer();
  }

  function kiSelect(i) {
    if (kiAnswered) return;
    kiAnswered = true;
    clearInterval(kiTimerInt);
    var q = kiQuestions[kiCurrent];
    var opts = document.querySelectorAll('.ki-opt');
    opts.forEach(function(o) { o.classList.add('ki-disabled'); });
    if (i === q.answer) {
      opts[i].classList.add('ki-correct');
      kiScore++; kiBenar++;
      kiShowFeedback(true, false);
    } else {
      opts[i].classList.add('ki-wrong');
      opts[q.answer].classList.add('ki-correct');
      kiSalah++;
      kiShowFeedback(false, false);
    }
    document.getElementById('ki-btn-next').disabled = false;
  }

  function kiShowFeedback(isCorrect, isTimeout) {
    var box = document.getElementById('ki-feedback');
    var q = kiQuestions[kiCurrent];
    if (isTimeout) {
      box.className = 'ki-feedback ki-fb-wrong';
      box.textContent = '⏰ Waktu habis! ' + q.fb.n;
    } else if (isCorrect) {
      box.className = 'ki-feedback ki-fb-correct';
      box.textContent = '✓ ' + q.fb.y;
    } else {
      box.className = 'ki-feedback ki-fb-wrong';
      box.textContent = '✗ ' + q.fb.n;
    }
  }

  window.kiNext = function() {
    kiCurrent++;
    if (kiCurrent >= 10) { kiShowScore(); } else { kiLoad(kiCurrent); }
  };

  function kiShowScore() {
    clearInterval(kiTimerInt);
    document.getElementById('ki-quiz').style.display = 'none';
    document.getElementById('ki-score').classList.remove('ki-hidden');
    document.getElementById('ki-score-num').textContent = kiScore;
    document.getElementById('ki-stat-benar').textContent = kiBenar;
    document.getElementById('ki-stat-salah').textContent = kiSalah;
    document.getElementById('ki-stat-pct').textContent = Math.round(kiScore / 10 * 100) + '%';
    var pct = kiScore / 10 * 100;
    var title, sub;
    if      (pct >= 90) { title = 'Luar Biasa! 🏆'; sub  = 'Kamu menguasai materi ini dengan sangat baik!'; }
    else if (pct >= 70) { title = 'Bagus Sekali! 🎉'; sub = 'Kamu sudah paham sebagian besar materi ini.'; }
    else if (pct >= 50) { title = 'Cukup Baik! 💪'; sub  = 'Masih ada yang perlu diperbaiki. Coba lagi!'; }
    else                { title = 'Tetap Semangat! 📚'; sub = 'Pelajari lagi materinya, kamu pasti bisa lebih baik!'; }
    document.getElementById('ki-score-title').textContent = title;
    document.getElementById('ki-score-sub').textContent = sub;
  }

  window.kiRestart = function() {
    kiCurrent = 0; kiScore = 0; kiBenar = 0; kiSalah = 0;
    document.getElementById('ki-quiz').style.display = 'block';
    document.getElementById('ki-score').classList.add('ki-hidden');
    kiLoad(0);
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() { kiLoad(0); });
  } else {
    kiLoad(0);
  }
})();

<script src="https://unpkg.com/feather-icons"></script>
<script>
  feather.replace();
</script>

</body>
</html>