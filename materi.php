<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username   = $isLoggedIn ? htmlspecialchars($_SESSION['username']) : '';

// Halaman topik yang diminta
$topic = $_GET['topik'] ?? '';

$topics = [
  'vocabulary' => [
    'icon' => '🔤',
    'title' => 'Vocabulary',
    'color' => '#eff6ff',
    'accent' => '#2563eb',
    'badge' => '1.200+ Kata',
    'desc' => 'Pelajari ribuan kosakata bahasa Inggris dengan contoh kalimat dan latihan interaktif.',
    'intro' => 'Kosakata adalah fondasi utama dalam menguasai bahasa Inggris. Semakin banyak kosakata yang kamu kuasai, semakin mudah kamu memahami dan berkomunikasi.',
    'sections' => [
      ['sub' => 'A1 – Pemula', 'items' => [
        ['word' => 'Hello', 'arti' => 'Halo', 'contoh' => 'Hello, how are you?'],
        ['word' => 'Thank you', 'arti' => 'Terima kasih', 'contoh' => 'Thank you for your help!'],
        ['word' => 'Sorry', 'arti' => 'Maaf', 'contoh' => 'Sorry, I am late.'],
        ['word' => 'Please', 'arti' => 'Tolong', 'contoh' => 'Please sit down.'],
        ['word' => 'Yes / No', 'arti' => 'Ya / Tidak', 'contoh' => 'Yes, I understand. No, I don\'t.'],
        ['word' => 'Good', 'arti' => 'Baik / Bagus', 'contoh' => 'Good morning! Have a good day.'],
      ]],
      ['sub' => 'A2 – Dasar', 'items' => [
        ['word' => 'Wonderful', 'arti' => 'Luar biasa', 'contoh' => 'The view from here is wonderful.'],
        ['word' => 'Curious', 'arti' => 'Penasaran', 'contoh' => 'She is curious about everything.'],
        ['word' => 'Brave', 'arti' => 'Berani', 'contoh' => 'He was brave enough to speak in public.'],
        ['word' => 'Honest', 'arti' => 'Jujur', 'contoh' => 'Always be honest with your friends.'],
        ['word' => 'Friendly', 'arti' => 'Ramah', 'contoh' => 'Our teacher is very friendly.'],
        ['word' => 'Patient', 'arti' => 'Sabar', 'contoh' => 'Be patient; success takes time.'],
      ]],
      ['sub' => 'B1 – Menengah', 'items' => [
        ['word' => 'Perseverance', 'arti' => 'Ketekunan', 'contoh' => 'Perseverance is the key to success.'],
        ['word' => 'Eloquent', 'arti' => 'Fasih / Pandai bicara', 'contoh' => 'She gave an eloquent speech at the ceremony.'],
        ['word' => 'Ambitious', 'arti' => 'Ambisius', 'contoh' => 'He is ambitious and works very hard.'],
        ['word' => 'Resilient', 'arti' => 'Tangguh / Tahan banting', 'contoh' => 'Resilient people recover quickly from setbacks.'],
        ['word' => 'Diligent', 'arti' => 'Tekun / Rajin', 'contoh' => 'Diligent students always do their homework.'],
        ['word' => 'Empathy', 'arti' => 'Empati', 'contoh' => 'Empathy helps us understand others\' feelings.'],
      ]],
    ],
  ],
  'grammar' => [
    'icon' => '📝',
    'title' => 'Grammar',
    'color' => '#f0fdf4',
    'accent' => '#16a34a',
    'badge' => '80 Topik',
    'desc' => 'Kuasai tata bahasa mulai dari tenses, preposisi, hingga kalimat kompleks dengan penjelasan mudah.',
    'intro' => 'Grammar adalah aturan yang membentuk kalimat yang benar dan dapat dipahami. Memahami grammar akan membuatmu lebih percaya diri dalam menulis dan berbicara.',
    'sections' => [
      ['sub' => 'Tenses – Present', 'items' => [
        ['word' => 'Simple Present', 'arti' => 'Kebiasaan / fakta', 'contoh' => 'She drinks coffee every morning.'],
        ['word' => 'Present Continuous', 'arti' => 'Sedang terjadi', 'contoh' => 'He is reading a book right now.'],
        ['word' => 'Present Perfect', 'arti' => 'Sudah terjadi (efek kini)', 'contoh' => 'I have finished my homework.'],
      ]],
      ['sub' => 'Tenses – Past', 'items' => [
        ['word' => 'Simple Past', 'arti' => 'Sudah terjadi di masa lalu', 'contoh' => 'They visited Bali last year.'],
        ['word' => 'Past Continuous', 'arti' => 'Sedang terjadi di masa lalu', 'contoh' => 'She was sleeping when I called.'],
        ['word' => 'Past Perfect', 'arti' => 'Terjadi sebelum kejadian lain di masa lalu', 'contoh' => 'He had left before she arrived.'],
      ]],
      ['sub' => 'Articles & Prepositions', 'items' => [
        ['word' => 'a / an', 'arti' => 'Artikel tak tentu', 'contoh' => 'I saw a dog. She ate an apple.'],
        ['word' => 'the', 'arti' => 'Artikel tentu', 'contoh' => 'The sun rises in the east.'],
        ['word' => 'in / on / at', 'arti' => 'Preposisi tempat & waktu', 'contoh' => 'I am at school. The book is on the table.'],
        ['word' => 'for / since', 'arti' => 'Durasi vs titik waktu', 'contoh' => 'I have lived here for 5 years / since 2019.'],
      ]],
    ],
  ],
  'speaking' => [
    'icon' => '🎤',
    'title' => 'Speaking',
    'color' => '#fff7ed',
    'accent' => '#ea580c',
    'badge' => '200+ Dialog',
    'desc' => 'Latih kemampuan berbicara dengan simulasi percakapan nyata dan feedback langsung.',
    'intro' => 'Speaking practice adalah cara terbaik untuk menjadi lancar berbahasa Inggris. Berlatihlah dengan dialog nyata dan frasa umum sehari-hari.',
    'sections' => [
      ['sub' => 'Greetings & Small Talk', 'items' => [
        ['word' => 'How are you doing?', 'arti' => 'Apa kabar?', 'contoh' => '"How are you doing?" — "I\'m doing great, thanks!"'],
        ['word' => 'Nice to meet you!', 'arti' => 'Senang bertemu kamu!', 'contoh' => '"Nice to meet you!" — "Nice to meet you too!"'],
        ['word' => 'What do you do?', 'arti' => 'Apa pekerjaanmu?', 'contoh' => '"What do you do?" — "I\'m a student."'],
      ]],
      ['sub' => 'Asking for Help', 'items' => [
        ['word' => 'Could you help me?', 'arti' => 'Bisakah kamu membantuku?', 'contoh' => 'Excuse me, could you help me find this address?'],
        ['word' => 'I\'m not sure about...', 'arti' => 'Saya tidak yakin tentang...', 'contoh' => 'I\'m not sure about the answer. Can you explain?'],
        ['word' => 'Would you mind...?', 'arti' => 'Apakah kamu keberatan...?', 'contoh' => 'Would you mind repeating that, please?'],
      ]],
      ['sub' => 'Expressing Opinions', 'items' => [
        ['word' => 'In my opinion...', 'arti' => 'Menurut pendapat saya...', 'contoh' => 'In my opinion, reading is very important.'],
        ['word' => 'I think / I believe...', 'arti' => 'Saya pikir / percaya...', 'contoh' => 'I believe we can do better.'],
        ['word' => 'I agree / I disagree', 'arti' => 'Saya setuju / tidak setuju', 'contoh' => 'I totally agree with your point.'],
        ['word' => 'That\'s a good point.', 'arti' => 'Itu poin yang bagus.', 'contoh' => '"We should start early." — "That\'s a good point."'],
      ]],
    ],
  ],
  'listening' => [
    'icon' => '👂',
    'title' => 'Listening',
    'color' => '#fdf2f8',
    'accent' => '#9333ea',
    'badge' => '150 Audio',
    'desc' => 'Asah kemampuan mendengar dengan audio native speaker dari berbagai aksen dunia.',
    'intro' => 'Listening skill sangat penting untuk memahami percakapan asli bahasa Inggris. Latih telingamu dengan berbagai topik dan kecepatan bicara.',
    'sections' => [
      ['sub' => 'Tips Listening Efektif', 'items' => [
        ['word' => 'Listen for keywords', 'arti' => 'Fokus pada kata kunci', 'contoh' => 'Don\'t try to understand every word — focus on the main ideas.'],
        ['word' => 'Use context clues', 'arti' => 'Gunakan petunjuk konteks', 'contoh' => 'Even if you miss a word, the context helps you understand the meaning.'],
        ['word' => 'Practice shadowing', 'arti' => 'Latihan mengikuti ucapan', 'contoh' => 'Repeat what you hear immediately to improve pronunciation.'],
      ]],
      ['sub' => 'Common Listening Challenges', 'items' => [
        ['word' => 'Contractions', 'arti' => 'Singkatan ucapan', 'contoh' => '"I\'m gonna go" = "I am going to go"'],
        ['word' => 'Linking sounds', 'arti' => 'Bunyi yang tersambung', 'contoh' => '"Pick it up" sounds like "pick-it-up" spoken fast.'],
        ['word' => 'Reduced vowels', 'arti' => 'Vokal yang melemah', 'contoh' => '"for" sounds like "fer" in fast speech.'],
        ['word' => 'Intonation patterns', 'arti' => 'Pola intonasi', 'contoh' => 'Rising intonation often signals a question or uncertainty.'],
      ]],
    ],
  ],
  'writing' => [
    'icon' => '✍️',
    'title' => 'Writing',
    'color' => '#f0fdfa',
    'accent' => '#0d9488',
    'badge' => '60 Template',
    'desc' => 'Belajar menulis email, esai, dan surat resmi dengan template dan panduan lengkap.',
    'intro' => 'Writing skill membantu kamu mengekspresikan ide secara tertulis dengan jelas dan terstruktur. Mulai dari email informal hingga esai akademik.',
    'sections' => [
      ['sub' => 'Email Formal', 'items' => [
        ['word' => 'Subject line', 'arti' => 'Baris subjek', 'contoh' => 'Subject: Request for Meeting — Monday, June 5'],
        ['word' => 'Salutation', 'arti' => 'Salam pembuka', 'contoh' => 'Dear Mr. Smith, / Dear Hiring Manager,'],
        ['word' => 'Opening sentence', 'arti' => 'Kalimat pembuka', 'contoh' => 'I hope this email finds you well.'],
        ['word' => 'Closing', 'arti' => 'Penutup', 'contoh' => 'Best regards, / Sincerely, / Kind regards,'],
      ]],
      ['sub' => 'Esai Struktur', 'items' => [
        ['word' => 'Introduction', 'arti' => 'Pendahuluan', 'contoh' => 'Start with a hook, then state your thesis clearly.'],
        ['word' => 'Body Paragraph', 'arti' => 'Paragraf isi', 'contoh' => 'Each paragraph should have a topic sentence and supporting details.'],
        ['word' => 'Conclusion', 'arti' => 'Kesimpulan', 'contoh' => 'Restate your thesis and summarize the key points.'],
        ['word' => 'Transition words', 'arti' => 'Kata penghubung', 'contoh' => 'Furthermore, However, In addition, As a result, Therefore'],
      ]],
    ],
  ],
  'reading' => [
    'icon' => '📖',
    'title' => 'Reading',
    'color' => '#fafaf0',
    'accent' => '#854d0e',
    'badge' => '300+ Artikel',
    'desc' => 'Latihan membaca teks dari berbagai topik: berita, fiksi, sains, dan budaya populer.',
    'intro' => 'Reading comprehension melatih kemampuan memahami teks dan menemukan informasi penting. Semakin sering membaca, semakin kaya kosakata dan pemahamanmu.',
    'sections' => [
      ['sub' => 'Strategi Membaca', 'items' => [
        ['word' => 'Skimming', 'arti' => 'Membaca cepat untuk ide utama', 'contoh' => 'Read the title, headings, and first sentences of each paragraph.'],
        ['word' => 'Scanning', 'arti' => 'Mencari informasi spesifik', 'contoh' => 'Look for dates, names, or numbers without reading every word.'],
        ['word' => 'Inference', 'arti' => 'Menyimpulkan makna tersirat', 'contoh' => 'The author doesn\'t say it directly, but you can infer the meaning.'],
        ['word' => 'Main idea', 'arti' => 'Ide pokok paragraf', 'contoh' => 'Usually found in the topic sentence at the beginning of a paragraph.'],
      ]],
      ['sub' => 'Teks Pendek – Bacaan Latihan', 'items' => [
        ['word' => 'News article', 'arti' => 'Artikel berita', 'contoh' => '"Scientists have discovered a new species of fish in the deep ocean."'],
        ['word' => 'Short story', 'arti' => 'Cerita pendek', 'contoh' => '"Once upon a time, a young girl found a mysterious letter..."'],
        ['word' => 'Scientific text', 'arti' => 'Teks ilmiah', 'contoh' => '"Photosynthesis is the process by which plants convert sunlight into energy."'],
      ]],
    ],
  ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MySpeakora — Materi<?= $topic ? ' · ' . htmlspecialchars($topics[$topic]['title'] ?? '') : '' ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="./css/style.css"/>
  <style>
    /* ── GLOBAL ADDITIONS ── */
    #materi { padding-top: 110px; min-height: 100vh; }

    /* ── SEARCH BAR ── */
    .search-wrap {
      max-width: 560px;
      margin: 0 auto 40px;
      position: relative;
    }
    .search-wrap input {
      width: 100%;
      padding: 14px 52px 14px 18px;
      border-radius: 50px;
      border: 2px solid #e2e8f0;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: .95rem;
      background: #fff;
      color: #1e293b;
      outline: none;
      transition: border-color .2s, box-shadow .2s;
      box-sizing: border-box;
    }
    .search-wrap input:focus {
      border-color: var(--blue-500, #3b82f6);
      box-shadow: 0 0 0 3px rgba(59,130,246,.15);
    }
    .search-wrap .search-icon {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.1rem;
      pointer-events: none;
    }
    #noResult {
      text-align: center;
      color: #94a3b8;
      padding: 20px;
      display: none;
    }

    /* ── MATERI GRID ENHANCED ── */
    .materi-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; max-width: 1100px; margin: 0 auto; padding: 0 24px 60px; }
    .materi-card {
      background: #fff;
      border: 2px solid #e2e8f0;
      border-radius: 16px;
      padding: 28px;
      cursor: pointer;
      transition: transform .2s, box-shadow .2s, border-color .2s;
      text-decoration: none;
      color: inherit;
      display: block;
    }
    .materi-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 32px rgba(37,99,235,.12);
      border-color: var(--blue-400, #60a5fa);
    }
    .materi-card.hidden { display: none; }
    .materi-icon { font-size: 2.2rem; width: 60px; height: 60px; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; }
    .materi-card h3 { font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; color: #1e293b; }
    .materi-card p { font-size: .88rem; color: #64748b; line-height: 1.6; margin-bottom: 14px; }
    .materi-badge { background: #eff6ff; color: #2563eb; padding: 4px 12px; border-radius: 20px; font-size: .78rem; font-weight: 600; }
    .materi-card .arrow { float: right; font-size: 1.1rem; margin-top: -2px; opacity: .5; transition: opacity .2s, transform .2s; }
    .materi-card:hover .arrow { opacity: 1; transform: translateX(4px); }

    /* ── BREADCRUMB ── */
    .breadcrumb { max-width: 900px; margin: 0 auto 24px; padding: 0 24px; font-size: .85rem; color: #94a3b8; }
    .breadcrumb a { color: #2563eb; text-decoration: none; }
    .breadcrumb a:hover { text-decoration: underline; }

    /* ── TOPIC PAGE ── */
    .topic-hero {
      max-width: 900px;
      margin: 0 auto 40px;
      padding: 36px 32px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      gap: 24px;
    }
    .topic-hero-icon { font-size: 3rem; }
    .topic-hero h1 { font-size: 2rem; font-weight: 800; color: #1e293b; margin-bottom: 6px; }
    .topic-hero p { color: #64748b; font-size: .95rem; line-height: 1.6; }

    /* ── SEARCH WITHIN TOPIC ── */
    .topic-search-wrap {
      max-width: 900px;
      margin: 0 auto 32px;
      padding: 0 24px;
      position: relative;
    }
    .topic-search-wrap input {
      width: 100%;
      padding: 12px 46px 12px 16px;
      border-radius: 12px;
      border: 2px solid #e2e8f0;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: .92rem;
      background: #fff;
      outline: none;
      transition: border-color .2s, box-shadow .2s;
      box-sizing: border-box;
    }
    .topic-search-wrap input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,.15); }
    .topic-search-wrap .search-icon { position: absolute; right: 38px; top: 50%; transform: translateY(-50%); pointer-events: none; }

    /* ── SECTION CARD ── */
    .topic-section {
      max-width: 900px;
      margin: 0 auto 28px;
      padding: 0 24px;
    }
    .topic-section h3 {
      font-size: 1rem;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 14px;
      padding-left: 14px;
      border-left: 3px solid #2563eb;
    }
    .vocab-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 2px 12px rgba(0,0,0,.06);
    }
    .vocab-table thead th {
      background: #f8fafc;
      padding: 12px 16px;
      text-align: left;
      font-size: .8rem;
      font-weight: 700;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: .05em;
      border-bottom: 1px solid #e2e8f0;
    }
    .vocab-table tbody tr {
      border-bottom: 1px solid #f1f5f9;
      transition: background .15s;
    }
    .vocab-table tbody tr:last-child { border-bottom: none; }
    .vocab-table tbody tr:hover { background: #f8fafc; }
    .vocab-table td { padding: 13px 16px; font-size: .9rem; color: #334155; vertical-align: top; }
    .vocab-table td:first-child { font-weight: 700; color: #1e293b; width: 200px; }
    .vocab-table td .example { color: #94a3b8; font-style: italic; font-size: .83rem; margin-top: 3px; }
    .vocab-table tr.row-hidden { display: none; }

    .back-btn {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 10px 20px; border-radius: 50px;
      background: #eff6ff; color: #2563eb;
      font-weight: 600; font-size: .875rem;
      text-decoration: none; border: none; cursor: pointer;
      transition: background .2s;
      margin: 0 24px 24px;
    }
    .back-btn:hover { background: #dbeafe; }
    #topicNoResult { text-align:center; color:#94a3b8; padding:30px; display:none; }
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
    <li><a href="materi.php" class="active">📚 Materi</a></li>
    <li><a href="kamus.php">📖 Kamus</a></li>
  </ul>
</nav>

<?php if ($topic && isset($topics[$topic])): ?>
  <?php $t = $topics[$topic]; ?>
  <!-- ═══════ HALAMAN TOPIK ═══════ -->
  <section id="materi">
    <div class="breadcrumb">
      <a href="materi.php">📚 Materi</a> &rsaquo; <?= htmlspecialchars($t['title']) ?>
    </div>

    <a class="back-btn" href="materi.php">← Kembali ke Materi</a>

    <div class="topic-hero" style="background:<?= $t['color'] ?>; max-width:900px; margin:0 auto 36px; padding:36px 32px; border-radius:20px;">
      <div class="topic-hero-icon"><?= $t['icon'] ?></div>
      <div>
        <h1><?= htmlspecialchars($t['title']) ?></h1>
        <p><?= htmlspecialchars($t['intro']) ?></p>
        <span class="materi-badge"><?= $t['badge'] ?></span>
      </div>
    </div>

    <!-- Search dalam topik -->
    <div class="topic-search-wrap">
      <input type="text" id="topicSearchInput" placeholder="Cari materi dalam <?= htmlspecialchars($t['title']) ?>..." oninput="searchTopic()"/>
      <span class="search-icon">🔍</span>
    </div>

    <?php foreach ($t['sections'] as $si => $section): ?>
    <div class="topic-section" data-section="<?= $si ?>">
      <h3><?= htmlspecialchars($section['sub']) ?></h3>
      <table class="vocab-table">
        <thead>
          <tr>
            <th><?= $topic === 'grammar' || $topic === 'reading' || $topic === 'listening' ? 'Konsep' : 'Kata / Frasa' ?></th>
            <th>Arti / Keterangan</th>
            <th>Contoh</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($section['items'] as $item): ?>
          <tr>
            <td><?= htmlspecialchars($item['word']) ?></td>
            <td><?= htmlspecialchars($item['arti']) ?></td>
            <td><span class="example"><?= htmlspecialchars($item['contoh']) ?></span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php endforeach; ?>
    <div id="topicNoResult">Materi tidak ditemukan 😔</div>
  </section>

<?php else: ?>
  <!-- ═══════ HALAMAN DAFTAR MATERI ═══════ -->
  <section id="materi">
    <div class="section-tag">📚 Materi Lengkap</div>
    <h2 class="section-title">Semua yang Kamu Butuhkan<br>Ada di Sini</h2>
    <p class="section-sub">Dari level pemula hingga mahir, materi kami dirancang oleh ahli bahasa Inggris berpengalaman.</p>

    <!-- Search bar -->
    <div class="search-wrap">
      <input type="text" id="materiSearch" placeholder="Cari materi… (Vocabulary, Grammar, Speaking…)" oninput="filterMateri()"/>
      <span class="search-icon">🔍</span>
    </div>
    <p id="noResult">Materi tidak ditemukan 😔</p>

    <div class="materi-grid">
      <?php foreach ($topics as $key => $t): ?>
      <a class="materi-card" href="materi.php?topik=<?= $key ?>" data-name="<?= strtolower($t['title']) ?> <?= strtolower($t['desc']) ?>">
        <div class="materi-icon" style="background:<?= $t['color'] ?>"><?= $t['icon'] ?></div>
        <h3><?= htmlspecialchars($t['title']) ?></h3>
        <p><?= htmlspecialchars($t['desc']) ?></p>
        <span class="materi-badge"><?= $t['badge'] ?></span>
        <span class="arrow">→</span>
      </a>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>

<?php if (!$isLoggedIn): ?>
<!-- ═══════ MODAL LOGIN ═══════ -->
<div class="modal-overlay" id="loginModal" onclick="closeOnBg(event,'loginModal')">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('loginModal')">✕</button>
    <h2>Selamat Datang 👋</h2>
    <p>Masuk ke akun MySpeakora kamu</p>
    <form method="POST" action="login.php">
      <div class="form-group"><label>Username</label><input type="text" name="username" placeholder="Username kamu" required/></div>
      <div class="form-group"><label>Password</label><input type="password" name="password" placeholder="••••••••" required/></div>
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
      <div class="form-group"><label>Username</label><input type="text" name="username" placeholder="Username kamu" required/></div>
      <div class="form-group"><label>Email</label><input type="email" name="email" placeholder="email@kamu.com" required/></div>
      <div class="form-group"><label>Password</label><input type="password" name="password" placeholder="Min. 8 karakter" required/></div>
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
      <li><a href="kuis.php">Kuis</a></li>
      <li><a href="kamus.php">Kamus</a></li>
    </ul></div>
    <div class="footer-col"><h4>Perusahaan</h4><ul>
      <li><a href="#">Tentang Kami</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Karir</a></li>
    </ul></div>
    <div class="footer-col"><h4>Bantuan</h4><ul>
      <li><a href="#">FAQ</a></li>
      <li><a href="#">Kontak</a></li>
      <li><a href="#">Kebijakan Privasi</a></li>
    </ul></div>
  </div>
  <div class="footer-bottom">
    <p>© 2025 MySpeakora. Dibuat dengan ❤️ untuk pelajar Indonesia.</p>
    <p>📧 hello@MySpeakora.id</p>
  </div>
</footer>

<script src="script.js"></script>
<script>
// ── FILTER MATERI CARDS ──
function filterMateri() {
  const q = document.getElementById('materiSearch').value.toLowerCase();
  const cards = document.querySelectorAll('.materi-card');
  let found = 0;
  cards.forEach(c => {
    const match = c.dataset.name.includes(q);
    c.classList.toggle('hidden', !match);
    if (match) found++;
  });
  document.getElementById('noResult').style.display = found === 0 ? 'block' : 'none';
}

// ── SEARCH DALAM TOPIK ──
function searchTopic() {
  const q = document.getElementById('topicSearchInput')?.value.toLowerCase() ?? '';
  const rows = document.querySelectorAll('.vocab-table tbody tr');
  const sections = document.querySelectorAll('.topic-section');
  let totalVisible = 0;

  sections.forEach(sec => {
    let secVisible = 0;
    sec.querySelectorAll('tbody tr').forEach(row => {
      const text = row.textContent.toLowerCase();
      const show = !q || text.includes(q);
      row.classList.toggle('row-hidden', !show);
      if (show) secVisible++;
    });
    sec.style.display = secVisible === 0 && q ? 'none' : '';
    totalVisible += secVisible;
  });

  const noRes = document.getElementById('topicNoResult');
  if (noRes) noRes.style.display = (totalVisible === 0 && q) ? 'block' : 'none';
}
</script>
</body>
</html>
