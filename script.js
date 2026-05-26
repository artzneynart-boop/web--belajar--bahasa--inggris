// ── NAVBAR ACTIVE LINK ──
function setActive(el) {
  document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
  el.classList.add('active');
}

// ── MODAL ──
function openModal(type) {
  document.getElementById(type + 'Modal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeModal(id) {
  document.getElementById(id).classList.remove('open');
  document.body.style.overflow = '';
}

function closeOnBg(e, id) {
  if (e.target.id === id) closeModal(id);
}

function switchModal(closeId, openId) {
  closeModal(closeId);
  setTimeout(() => openModal(openId.replace('Modal', '')), 200);
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    closeModal('loginModal');
    closeModal('registerModal');
  }
});

// ── NAVBAR SCROLL EFFECT ──
window.addEventListener('scroll', () => {
  const nav = document.getElementById('navbar');
  if (nav) {
    nav.style.boxShadow = window.scrollY > 20
      ? '0 4px 24px rgba(37,99,235,.12)'
      : '0 2px 20px rgba(37,99,235,.07)';
  }
});

// ── HAMBURGER MENU ──
function toggleMenu() {
  alert('Menu mobile akan ditampilkan di sini.');
}

// ── SMOOTH SCROLL ──
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
});

// ── KUIS: SELECT OPTION ──
function selectOpt(el, type) {
  document.querySelectorAll('.kuis-opt').forEach(o => o.style.background = '');
  if (type === 'correct') {
    el.style.background = 'rgba(74,222,128,.25)';
  } else {
    el.style.background = 'rgba(248,113,113,.2)';
    document.querySelectorAll('.kuis-opt')[1].style.background = 'rgba(74,222,128,.25)';
  }
}

// ── KAMUS: DATA & SEARCH ──
const dict = [
  { word: 'Beautiful',     phonetic: '/ˈbjuː.tɪ.fəl/',        meaning: 'Indah; cantik; memiliki kecantikan yang luar biasa',                       type: 'Adjective' },
  { word: 'Knowledge',     phonetic: '/ˈnɒl.ɪdʒ/',             meaning: 'Pengetahuan; pemahaman tentang suatu hal',                                  type: 'Noun'      },
  { word: 'Determine',     phonetic: '/dɪˈtɜː.mɪn/',           meaning: 'Menentukan; memutuskan dengan tegas',                                       type: 'Verb'      },
  { word: 'Ambitious',     phonetic: '/æmˈbɪʃ.əs/',            meaning: 'Ambisius; memiliki keinginan kuat untuk sukses',                            type: 'Adjective' },
  { word: 'Eloquent',      phonetic: '/ˈel.ə.kwənt/',          meaning: 'Fasih; mampu berbicara dengan jelas dan persuasif',                         type: 'Adjective' },
  { word: 'Achievement',   phonetic: '/əˈtʃiːv.mənt/',         meaning: 'Pencapaian; sesuatu yang berhasil diraih',                                  type: 'Noun'      },
  { word: 'Communicate',   phonetic: '/kəˈmjuː.nɪ.keɪt/',     meaning: 'Berkomunikasi; menyampaikan informasi atau perasaan',                       type: 'Verb'      },
  { word: 'Perseverance',  phonetic: '/ˌpɜːr.sɪˈvɪr.əns/',    meaning: 'Ketekunan; kemampuan untuk terus berusaha meski ada kesulitan',             type: 'Noun'      },
];

function searchKamus() {
  const input = document.getElementById('kamusInput');
  const res   = document.getElementById('kamusResults');
  if (!input || !res) return;

  const q = input.value.toLowerCase().trim();
  const filtered = q ? dict.filter(d => d.word.toLowerCase().includes(q)) : dict;

  if (filtered.length === 0) {
    res.innerHTML = '<div style="padding:30px;text-align:center;color:var(--gray-400)">Kata tidak ditemukan 😔</div>';
    return;
  }

  res.innerHTML = filtered.map(d => `
    <div class="kamus-item">
      <div>
        <div class="k-word">${d.word}</div>
        <div class="k-phonetic">${d.phonetic}</div>
        <div class="k-meaning">${d.meaning}</div>
      </div>
      <span class="k-type">${d.type}</span>
    </div>
  `).join('');
}
const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach((item) => {
  const question = item.querySelector(".faq-question");

  question.addEventListener("click", () => {
    item.classList.toggle("active");
  });
});