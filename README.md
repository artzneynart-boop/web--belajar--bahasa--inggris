THIS IS ABOUT OUR WEBSITE 
REACT.JS

1.	PENGERTIAN REACT.JS 


•	Apa itu react js

React JS adalah front-end JavaScript library yang bersifat open-source. Selain berjalan dengan bantuan NodeJS, React JS juga dirancang sebagai UI untuk aplikasi JavaScript. React JS sendiri dibuat oleh Facebook, yang memiliki tugas untuk mendesain tampilan dan alur logika aplikasi web.
React JS dapat digunakan untuk pemula, maupun sekelas perusahaan. Selain itu, React JS juga digunakan oleh beberapa aplikasi terkenal yang sering kita jumpai, di antaranya Facebook, WhatsApp, Netflix, Instagram, Airbnb, Dropbox, eBay dan masih banyak lagi.

•	Fungsi react.js

React JS berperan sebagai UI yang mengatur desain dan alur logika dengan mudah, untuk nantinya dapat diaplikasikan pada tampilan desktop maupun mobile view. 
Berjalan dalam runtime Node JS, React JS tentunya merupakan aplikasi berbasis JavaScript yang kompatibel dengan berbagai sistem operasi, seperti Windows, MacOS, hingga Linux, sehingga mempermudah dalam penggunaannya.

•	Kenapa react js dipakai

Performa Cepat dengan Virtual DOM 
Pembaruan tampilan (DOM) asli pada halaman web konvensional sering kali lambat dan memakan memori. React mengatasi masalah ini dengan menciptakan Virtual DOM (salinan ringan di memori). Ketika ada perubahan data, React hanya akan memperbarui bagian User Interface yang berubah tanpa harus memuat ulang seluruh halaman web. 

Arsitektur Berbasis Komponen (Reusable Components) 
React memecah halaman web yang kompleks menjadi potongan-potongan kode kecil yang mandiri yang disebut Komponen. Komponen ini bersifat modular, artinya jika Anda membuat satu komponen tombol atau kotak pencarian, Anda dapat menggunakannya berulang kali di halaman lain tanpa perlu menulis ulang kodenya.

Kemudahan Menulis Kode dengan JSX
React menggunakan JSX (JavaScript Syntax Extension), yaitu ekstensi sintaks yang memungkinkan Anda menulis struktur HTML langsung di dalam file JavaScript.

Aliran Data Satu Arah (Unidirectional Data Flow)
Di dalam React, data mengalir dalam satu arah (dari komponen induk ke komponen anak). Pola ini membuat alur logika aplikasi menjadi lebih terprediksi, mempermudah pelacakan kesalahan (debugging), dan meminimalkan risiko munculnya bug pada aplikasi berskala besar.

 Ramah SEO (Search Engine Optimization)
Aplikasi berbasis JavaScript murni terkadang sulit dibaca oleh mesin pencari seperti Google. Namun, React mendukung teknologi Server-Side Rendering (SSR) lewat ekosistemnya (seperti Next.js), sehingga konten web dapat dimuat di server terlebih dahulu sebelum dikirim ke browser. Hal ini membantu performa SEO dan mempercepat waktu tunggu pengguna.

Ekosistem Luas dan Komunitas yang Solid
React didukung oleh komunitas pengembang global yang sangat besar serta raksasa teknologi Meta. Jika Anda menghadapi kendala teknis, Anda dapat dengan mudah menemukan dokumentasi, pustaka pihak ketiga, dan solusi di berbagai forum. Selain itu, belajar React mempermudah Anda beralih ke React Native jika ingin membuat aplikasi mobile Android dan iOS

•	Sejarah singkat react.js

Sekitar tahun 2010, tim pengembang Facebook menghadapi tantangan besar dalam mengelola fitur News Feed (Beranda) mereka. Ketika pengguna memberikan Like, komentar, atau menerima notifikasi, sinkronisasi data dan pembaruan halaman web menjadi sangat lambat dan sering memunculkan bug.
Seorang insinyur perangkat lunak di Facebook bernama Jordan Walke mulai mencari solusi. Terinspirasi oleh pustaka berbasis PHP bernama XHP, ia membuat prototipe awal bernama FaxJS pada tahun 2010 untuk memperbarui tampilan web secara otomatis tanpa memuat ulang seluruh halaman. Prototipe inilah yang kemudian berevolusi menjadi React JS dan pertama kali diterapkan pada News Feed Facebook pada tahun 2011. 

2.	KELEBIHAN DAN KEKURANGAN REACT.JS

•	KELEBIHAN REACT JS

  Performa Ekstra Cepat: Berkat teknologi Virtual DOM, aplikasi tidak perlu memuat ulang seluruh halaman web saat terjadi perubahan data, melainkan hanya memperbarui bagian yang mengalami modifikasi saja.

 Hemat Waktu Pengodean: Konsep arsitektur komponen (reusable components) memungkinkan Anda membuat elemen UI (seperti menu navigasi, kartu, tombol) sekali, lalu menggunakannya berulang kali di halaman lain.

 Kode Lebih Rapi dengan JSX: Penggunaan sintaks JavaScript XML (JSX) menyatukan logika pemrograman JavaScript dan struktur desain HTML ke dalam satu file, membuat struktur kode lebih mudah dibaca.

 Ekosistem dan Pustaka yang Kaya: Didukung oleh Meta dan komunitas global yang masif, React memiliki jutaan paket tambahan gratis (library pihak ketiga) untuk mempermudah pembuatan fitur kompleks seperti animasi, diagram, dan manajemen data.

  Skalabilitas yang Baik: Sangat anduh untuk membangun website skala kecil hingga aplikasi web raksasa (seperti Netflix atau Airbnb) berkat arsitekturnya yang terstruktur


•	KEKURANGAN REACT JS

Bukan Framework Utuh: Berbeda dengan Angular atau Vue, React hanyalah sebuah pustaka (library) yang berfokus pada visual/UI saja. Anda wajib menginstal pustaka luar tambahan untuk mengurus routing (pindah halaman) atau manajemen data global.

Pembaruan Terlalu Cepat: Ekosistem React berkembang dengan kecepatan tinggi. Sering kali tutorial atau dokumentasi lama menjadi usang (deprecated) dalam hitungan bulan, memaksa pengembang untuk terus-menerus belajar hal baru.

Kurva Belajar yang Sedikit Curam: Bagi pemula yang baru menguasai JavaScript dasar, konsep JSX, siklus hidup komponen (component lifecycle), serta pengelolaan state dan hooks memerlukan waktu adaptasi ekstra untuk dipahami.

 Dokumentasi Pihak Ketiga Kurang Konsisten: Karena React sangat bergantung pada pustaka eksternal buatan komunitas untuk melengkapi fiturnya, dokumentasi alat-alat pendukung tersebut terkadang kurang mendalam, membingungkan, atau tidak terperinci.


3.	CARA KERJA REACT.JS 
React dapat membangun aplikasi web yang responsif, skalabel, dan mudah di-maintain. Cara kerja React JS dapat dijelaskan dalam beberapa langkah sebagai berikut:
•	Membuat Komponen
Pengembang membuat berbagai komponen dalam React, yang merupakan bagian-bagian terpisah dari tampilan dan berisi kode JavaScript, HTML, CSS, dan logika lainnya.Komponen ini bisa sederhana, seperti tombol atau input teks, atau bisa kompleks, seperti daftar, formulir, atau tampilan data.
•	Render Komponen Awal
Setelah komponen-komponen dibuat, React akan memulai proses rendering dengan memanggil metode render() pada setiap komponen.Metode ini mengembalikan struktur tampilan yang diinginkan dalam bentuk elemen Virtual DOM (Virtual DOM tree).
•	Membangun Virtual DOM (VDOM)
Setiap komponen dalam struktur tampilan akan diubah menjadi elemen Virtual DOM. Virtual DOM adalah representasi ringan dari DOM aktual.Komponen ini berupa struktur data berbasis JavaScript, sehingga memungkinkan React untuk cepat memanipulasi dan membandingkan elemen dalam struktur tampilan.
•	Membandingkan Virtual DOM Lama dan Baru
Ketika ada perubahan data atau keadaan pada komponen, React akan memulai proses reconciling (penyesuaian).Dalam proses ini, React akan membandingkan Virtual DOM sebelumnya dengan Virtual DOM yang baru.Proses ini dikenal sebagai diffing, di mana React mengidentifikasi perubahan yang perlu diterapkan pada tampilan.
•	Update DOM secara Efisien
Setelah perbedaan diidentifikasi melalui proses diffing, React akan menghasilkan perubahan minimal yang diperlukan untuk DOM aktual, sehingga hanya komponen atau bagian dari tampilan yang berubah yang akan diperbarui di DOM.Pendekatan ini memastikan efisiensi dan kinerja yang tinggi, karena React hanya melakukan perubahan pada elemen yang berubah, bukan seluruh halaman.
•	Rerender pada Perubahan
React memungkinkan pengembang untuk mengubah keadaan komponen. Ketika keadaan berubah, React akan secara otomatis memanggil metode render lagi untuk komponen terkait.Proses ini akan membangun ulang Virtual DOM dan membandingkannya lagi dengan Virtual DOM sebelumnya untuk menerapkan perubahan pada DOM aktual.
•	Handling Events (Menangani Peristiwa)
React juga memungkinkan menangani peristiwa (events) dari komponen, seperti klik tombol, masukan formulir, dan lainnya.Saat peristiwa terjadi, developer dapat menentukan fungsi-fungsi yang harus dijalankan, yang dapat mempengaruhi keadaan komponen atau merubah tampilan.
•	Siklus Hidup Komponen (Lifecycle)
React juga menyediakan siklus hidup komponen, yaitu metode-metode khusus yang dipanggil pada titik-titik tertentu dalam proses hidup suatu komponen.Misalnya, komponen bisa memiliki metode seperti componentDidMount(), componentDidUpdate(), dan componentWillUnmount(), yang memungkinkan pengembang untuk menjalankan kode pada tahap-tahap tertentu dalam siklus hidup komponen.






4.	INSTALASI REACT.JS
1.	Langkah-Langkah Instalasi React JS Di Windows
•	Langkah Pertama
harus unduh Node.js karena React JS menggunakan node package manager untuk mengelola dependensinya. Sobat bisa kunjungi website resminya Node.js dan unduh LTS version untuk Windows. LTS Version lebih stabil untuk sebagian besar user.
•	Jalankan Installer
Caranya dengan buka file yang kamu download tadi lalu double click untuk menjalankan .msi. Ikuti saja semua instruksinya dan terima license agreementnya. Jangan lupa untuk menggunakan default setting untuk proses instalasi.
•	Verify Instalasi Node.js
Lanjut buka PowerShell atau Command Prompt dan periksa versi yang sudah terinstal dengan menjalankan prompt ini:
o	Ketik node – v lalu enter untuk memeriksa versi Node.js.
o	Ketik npm – v lalu Enter untuk periksa versi npm.
Fungsi kedua prompt ini untuk mengembalikan version number yang mengkonfirmasi kesuksesan instalasi.
•	Menginstall Create React APP (CRA)
Sebelum dihentikan pada tahun 2023, biasanya orang akan menggunakan Create React App (CRA) untuk memulai proyek React. Namun sekarang bisa menggunakan Vite atau Next.js. Kedua aplikasi tersebut populer karena performanya yang lebih baik dan memiliki fitur yang modern.Tapi jika masih ingin menggunakan CRA berikut ini langkah-langkahnya:
o	Install CRA secara Global
Masukan prompt pada command prompt:
npm install -g create-react-app
o	Verify Instalasi
Setelah menginstal CRA secara global kamu bisa memeriksa semuanya apakah berjalan dengan baik, dengan cara:
create-react-app –version
Jika semuanya lancar, kamu akan mendapatkan versi CRA yang terinstal.
•	Buatlah Directory untuk React Projects
Pertama kita bisa membuat new folder sebagai tempat react app, pakai prompt ini:
mkdir new folder
Setelah itu pindahkan folder yang sama menggunakan prompt dibawah ini:
cd newfolder (nama foldernya)

•	Saatnya Buat Aplikasi React dengan CRA Prompt
Jika menggunakan CRa kamu bisa membuat react app dengan:
npx create-react-app reactfirst
Prompt ini akan menginstal semua dependensi yang dibutuhkan untuk menyiapkan aplikasi kamu.
Ingat bahwa nama aplikasinya harus ditulis dalam huruf kecil karena adanya pembatasan penamaan npm. 
Jika ingin menggunakan vite kita bisa gunakan ini:
npm create vite@latest reactfirst — –-template react
•	Buka Project di Code Editor
Bukalah IDE kamu, seperti Visual Studio Code lalu buka folder tempat kamu menginstal react app. Dalam folder tersebut kamu bisa melihat nama appnya.Kemudian buka terminal dan pindah ke dalam folder nama appnya, gunakan prompt:
cd react app (nama appnya)
•	Running React App
Langkah terakhir ini adalah menjalankan development server dengan menjalankan:
npm start
Jika berhasil browser di tab baru akan muncul dan menampilkan halaman React dengan logo React, seperti ini.
<img width="609" height="275" alt="image" src="https://github.com/user-attachments/assets/49df8d3f-a550-4803-a8f3-339771300a4e" />
Ini merupakan tanda bahwa kita sudah berhasil install React JS atau aplikasi React dan siap building website atau app. 
Itulah langkah-langkah lengkap bagaimana caranya install React JS di Windows. Dengan ini kita sudah siap untuk memulai proses development website dan aplikasi yang dinamis serta performa tinggi.
2.	Langkah-Langkah Instalasi React JS Visual Studio Code
•	Langkah Pertama Install Node.JS
Pastikan Anda sudah menginstal Node.js karena React membutuhkannya untuk menjalankan server dan mengelola library.
Unduh dan install Node.js dari situs resminya di Node.js Downloads. Pilih versi LTS (Long Term Support) yang direkomendasikan untuk pengguna umum.
•	Buat dan Buka Proyek React
Setelah Node.js terinstal, jalankan perintah instalasi melalui terminal VS Code:
•	Buka Visual Studio Code.
•	Pada menu atas, klik File > Open Folder dan buatlah folder baru (misalnya: proyek-react).
•	Buka terminal di dalam VS Code dengan menekan tombol `Ctrl + `` (atau klik menu Terminal > New Terminal).
•	Di dalam terminal, ketik perintah berikut untuk membuat aplikasi React baru (pastikan tidak ada huruf kapital pada nama folder proyek):
•	Jalankan Aplikasi Anda
o	Arahkan direktori terminal Anda ke dalam folder proyek yang baru dibuat dengan mengetikkan perintah:  cd my-app
o	Jalankan server pengembangan dengan perintah npm start
o	Secara otomatis, jendela browser akan terbuka dan menampilkan tampilan awal React di alamat http://localhost:3000

•	Tips Ekstensi VS Code untuk React
Agar pengalaman koding React Anda lebih lancar, tambahkan beberapa ekstensi berikut di VS Code (tekan tombol Ctrl + Shift + X dan cari nama berikut):
o	ES7+ React/Redux/React-Native snippets: Memudahkan pembuatan kerangka kode dengan pintasan (shortcut).
o	Prettier - Code formatter: Merapikan format kode secara otomatis agar enak dibaca.
o	Tailwind CSS IntelliSense (Opsional): Membantu memberikan saran kelas jika Anda menggunakan Tailwind untuk mendesain web.




5.	STRUKTUR FOLDER REACT.JS 
Struktur folder react.js
Dalam dunia nyata (terutama untuk project yang makin besar, seperti web portal atau platform e-commerce/rental), struktur folder bawaan React harus dirapikan agar kodenya tidak berantakan.
Berikut adalah arsitektur struktur folder React.js standar industri (biasa disebut Production-Ready Structure) yang sangat rapi dan mudah dirawat:
Struktur Folder Skala Produksi
Plaintext
my-react-app/
├── public/                 # File statis murni (tidak diproses Webpack/Vite)
│   ├── favicon.ico
│   └── manifest.json
├── src/                    # Jantung dari aplikasi React kamu
│   ├── assets/             # Media statis yang di-import ke komponen
│   │   ├── images/         # Foto produk, banner, background
│   │   └── icons/          # Logo, icon SVG
│   ├── components/         # Komponen Global / Reusable (Komponen Kecil)
│   │   ├── Button/
│   │   │   ├── Button.jsx
│   │   │   └── Button.css
│   │   ├── Navbar/
│   │   └── Footer/
│   ├── context/            # Management state global (jika pakai React Context)
│   │   └── AuthContext.jsx
│   ├── hooks/              # Custom Hooks buatan sendiri (Logika reusable)
│   │   └── useFetch.js
│   ├── pages/              # Komponen Utama untuk Halaman (View/Screen)
│   │   ├── Home/
│   │   │   ├── Home.jsx
│   │   │   └── Home.css
│   │   ├── Catalog/
│   │   └── Cart/
│   ├── routes/             # Konfigurasi Navigasi / Perpindahan Halaman
│   │   └── AppRoutes.jsx
│   ├── services/           # Konfigurasi API / HTTP Request (Axios/Fetch)
│   │   └── api.js
│   ├── styles/             # Pengaturan CSS Global / Tema warna
│   │   └── variables.css
│   ├── App.jsx             # Komponen Induk Aplikasi
│   └── main.jsx            # Entry Point (Pintu masuk React ke HTML)
├── package.json            # Daftar library dan script perintah
└── vite.config.js          # Konfigurasi bundler (Vite)
Bedah Detail Fungsi Setiap Folder di dalam src/
Mari kita bahas satu per satu folder di dalam src agar kamu tahu persis di mana harus menaruh file kodinganmu:
1. src/assets/
Tempat menyimpan aset media seperti gambar (.jpg, .png), .svg, atau font lokal.
•	Kenapa di sini bukan di folder public? Karena aset di sini akan ikut di-kompres dan di-optimasi oleh Vite/React saat aplikasi di-build untuk online.
2. src/components/
Berisi komponen-komponen kecil yang sering dipakai berulang-ulang di berbagai halaman. Komponen di sini biasanya bersifat "bodoh" (dumb components), artinya mereka hanya menerima data (lewat props) dan menampilkan UI saja.
•	Contoh: Tombol (Button), Input Form, Card/Kartu Produk, Modal Pop-up, atau Loading Spinner.
•	Tips: Buat satu folder khusus untuk setiap komponen (misal: folder Button) yang berisi file .jsx dan .css-nya agar rapi dan tidak bercampur dengan komponen lain.
3. src/pages/ (atau kadang disebut views/)
Tempat untuk komponen yang merepresentasikan satu halaman penuh di website. Komponen di dalam pages biasanya akan memanggil komponen-komponen kecil dari folder components.
•	Contoh: Halaman Home.jsx, Catalog.jsx, atau DetailProduct.jsx.
4. src/routes/
Jika website kamu memiliki banyak halaman (bukan satu halaman memanjang ke bawah), kamu butuh library seperti React Router Dom. Nah, konfigurasi rute atau perpindahan halaman (misal: jika akses /katalog maka munculkan halaman Catalog.jsx) diatur di dalam folder ini.
5. src/hooks/
Tempat untuk menyimpan Custom Hooks. Jika kamu punya logika JavaScript yang rumit dan dipakai di beberapa tempat sekaligus (misalnya: logika untuk mengambil data dari API, atau logika untuk mendeteksi apakah user sedang online/offline), kamu bisa membungkusnya di sini agar kode di komponen tidak panjang.
6. src/services/
Folder khusus untuk menangani komunikasi dengan dunia luar (Backend / API). Semua fungsi fetch atau axios untuk mengambil data produk atau mengirim data pesanan dikumpulkan di sini, sehingga jika ada perubahan URL API dari backend, kamu cukup mengubah satu file di folder ini saja.
7. src/context/ (atau store/)
Digunakan untuk State Management Global. Jika kamu punya data yang harus diakses oleh hampir semua halaman (misalnya: data user yang sedang login, atau data keranjang belanja belanjaan), kamu menyimpannya di sini agar tidak perlu mengoper data lewat Props secara estafet dari atas ke bawah.
Pola Pikir Membagi File
Kunci utama dari struktur folder React adalah Pemisahan Tugas (Separation of Concerns).
•	Jangan menumpuk semua kodingan UI, CSS, dan fungsi ambil data di dalam satu file App.jsx.
•	Pecah website menjadi bagian-bagian terkecil.
Sebagai contoh, jika kamu ingin membuat halaman Katalog Rental Alat:
1.	Kamu buat halaman utama di src/pages/Catalog/Catalog.jsx.
2.	Di dalam katalog ada banyak kartu produk. Kamu buat komponen kartu itu di src/components/ProductCard/ProductCard.jsx, lalu kamu panggil di dalam halaman katalog tadi.
3.	CSS untuk kartu produk ditaruh di src/components/ProductCard/ProductCard.css.

6.  KONSEP DASAR REACT.JS
1. Komponen (Components): Balok Lego UI
Konsep paling mendasar dari React adalah Component-Driven Development. React memandang sebuah halaman website seperti susunan mainan Lego. Halaman web yang utuh dipecah menjadi bagian-bagian kecil yang berdiri sendiri.
•	Reusability (Bisa Dipakai Ulang): Sekali kamu membuat sebuah komponen (misalnya CardProduk), kamu bisa menampilkan komponen itu 100 kali di halaman yang sama atau di halaman berbeda tanpa menulis ulang kodenya.
•	Jenis Komponen: Di React modern, komponen dibuat menggunakan fungsi JavaScript biasa (disebut Functional Component) yang mengembalikan struktur UI.
2. JSX (JavaScript XML): Mengawinkan HTML & JavaScript
Di web tradisional, HTML (struktur) dan JavaScript (logika) ditulis di file terpisah. Di React, keduanya disatukan menggunakan sintaks bernama JSX.
JSX membuat kita bisa menulis tag mirip HTML langsung di dalam file JavaScript.
•	Aturan Utama JSX: Karena ini sebenarnya JavaScript, kamu bisa memasukkan variabel atau logika matematika langsung di dalam HTML menggunakan kurung kurawal { }.
<img width="940" height="447" alt="image" src="https://github.com/user-attachments/assets/fe9e082e-9fd5-4759-9b2a-3bab3b52e502" />
3. Props: Cara Komponen Berkomunikasi
Props (kependekan dari Properties) adalah data yang dikirim dari satu komponen (Parent) ke komponen lain (Child). Anggap saja Props ini seperti argumen atau parameter pada fungsi JavaScript biasa.
•	Aliran Satu Arah (Unidirectional): Data di React selalu mengalir dari atas ke bawah. Komponen anak hanya bisa menerima Props, tidak bisa mengubahnya secara langsung (Read-Only).
Contoh Kasus: Kamu punya komponen CardAlatOutdoor. Kamu ingin memakai komponen ini untuk menampilkan Tenda dan Carrier. Kamu cukup mengirim data yang berbeda lewat Props:
<img width="940" height="507" alt="image" src="https://github.com/user-attachments/assets/40a98ca4-6ec3-41a8-9fdf-cb9d10f623ac" />
4. State: Memori Internal Komponen
Jika Props adalah data yang dikirim dari luar, maka State adalah data yang dimiliki dan dikelola secara internal oleh komponen itu sendiri.
State adalah data yang bisa berubah selama aplikasi berjalan (interaktif). Ciri khas React adalah: Ketika State berubah, React akan otomatis merender ulang (update) UI di layar secara instan.
Untuk menggunakan State di React, kita menggunakan fungsi bawaan bernama useState (disebut sebagai Hook).
<img width="940" height="599" alt="image" src="https://github.com/user-attachments/assets/8818b407-975d-40df-9f17-9445c91af15e" />
5. Virtual DOM: Rahasia Kecepatan React
Ini adalah konsep di balik layar yang membuat React sangat cepat dibanding JavaScript vanilla (biasa).
•	Masalah Web Tradisional (Real DOM): Jika kamu mengubah satu kata di sebuah paragraf menggunakan JavaScript biasa, browser harus mendesain ulang dan merender ulang seluruh struktur halaman web dari atas sampai bawah. Ini sangat berat dan lambat jika websitenya kompleks.
•	Solusi React (Virtual DOM): React membuat "salinan tiruan" dari halaman web asli di dalam memori komputer, yang disebut Virtual DOM.
•	Ketika ada perubahan State, React akan mengubah Virtual DOM terlebih dahulu (prosesnya sangat cepat).
•	React kemudian membandingkan Virtual DOM yang baru dengan Virtual DOM yang lama untuk mencari perbedaan persisnya (proses ini disebut Diffing).
•	Terakhir, React hanya akan mengubah bagian Real DOM yang berubah saja di layar browser. Jika hanya satu teks angka yang berubah (seperti counter keranjang di atas), maka hanya kotak angka itu saja yang di-update, tanpa mengganggu bagian halaman yang lain.



7. CONTOH PROGRAM SEDERHANA
Di dunia nyata, aplikasi React jarang menggunakan data yang ditulis manual (hardcoded). Biasanya, aplikasi akan mengambil data dari server atau API pihak ketiga. Di React, kita menggunakan konsep bernama Side Effects yang dikelola oleh Hook bernama useEffect.
Mari kita buat program sederhana Pengecek Cuaca Gunung (Simulasi API). Program ini akan otomatis mengambil data cuaca saat aplikasi pertama kali dibuka, dan menyediakan tombol untuk memperbarui data tersebut.
Kode Lengkap (App.jsx)
JavaScript
import { useState, useEffect } from 'react';
export default function App() {
  // 1. STATE: Menyimpan data cuaca dari API
  const [dataCuaca, setDataCuaca] = useState(null);
  
  // STATE: Menandakan apakah data sedang dalam proses loading
  const [loading, setLoading] = useState(true);

  // 2. FUNGSI: Simulasi mengambil data dari Server/API
  const ambilDataCuaca = () => {
    setLoading(true); // Pasang status loading sebelum mengambil data
    
    // Menggunakan setTimeout untuk mensimulasikan jeda jaringan internet selama 1,5 detik
    setTimeout(() => {
      const dataDariServer = {
        lokasi: 'Gunung Rinjani, Lombok',
        suhu: '14°C',
        kondisi: 'Cerah Berawan',
        kecepatanAngin: '12 km/jam',
        diperbarui pada: new Date().toLocaleTimeString('id-ID')
      };
      
      setDataCuaca(dataDariServer); // Simpan data ke dalam state
      setLoading(false); // Matikan status loading karena data sudah beres
    }, 1500);
  };

  // 3. EFFECT: Menjalankan fungsi saat komponen pertama kali muncul di layar (Mounting)
  useEffect(() => {
    ambilDataCuaca();
    // Array kosong [] di bawah ini memastikan useEffect HANYA berjalan 1 kali di awal
  }, []);

  // 4. JSX (Tampilan UI)
  return (
    <div style={{ padding: '30px', fontFamily: 'Arial, sans-serif', maxWidth: '400px', margin: '40px auto', textAlign: 'center' }}>
      <div style={{ border: '2px solid #08600f', borderRadius: '12px', padding: '20px', backgroundColor: '#f4fbf4' }}>
        <h2 style={{ color: '#08600f', margin: '0 0 10px 0' }}>⛰️ Info Cuaca Gunung</h2>
        <hr style={{ border: '0.5px solid #08600f', opacity: 0.3 }} />

        {/* JIKA DATA SEDANG LOADING */}
        {loading ? (
          <div style={{ padding: '30px 0' }}>
            <p style={{ fontWeight: 'bold', color: '#666' }}>🔄 Membaca data dari satelit...</p>
          </div>
        ) : (
          /* JIKA DATA SUDAH SELESAI DIAMBIL */
          <div style={{ margin: '20px 0' }}>
            <h3 style={{ margin: '0 0 5px 0', color: '#333' }}>{dataCuaca?.lokasi}</h3>
            <h1 style={{ fontSize: '48px', margin: '10px 0', color: '#08600f' }}>{dataCuaca?.suhu}</h1>
            <p style={{ margin: '5px 0', fontWeight: 'bold' }}>⛅ {dataCuaca?.kondisi}</p>
            <p style={{ margin: '5px 0', fontSize: '14px', color: '#666' }}>💨 Angin:       {dataCuaca?.kecepatanAngin}</p>
            <p style={{ fontSize: '11px', color: '#999', marginTop: '15px' }}>
              Terakhir diperbarui: {dataCuaca?.diperbarui}
            </p>
          </div>
        )}

        {/* TOMBOL UNTUK REFRESH DATA */}
        <button
          onClick={ambilDataCuaca}
          disabled={loading} // Tombol mati saat loading agar user tidak klik berulang kali
          style={{
            padding: '10px 20px',
            backgroundColor: loading ? '#cccccc' : '#08600f',
            color: 'white',
            border: 'none',
            borderRadius: '20px',
            cursor: loading ? 'not-allowed' : 'pointer',
            fontWeight: 'bold',
            width: '100%',
            transition: '0.3s'
          }}
        >
          {loading ? 'Mohon Tunggu...' : '🔄 Perbarui Cuaca'}
        </button>
      </div>
    </div>
  );
}

Mengapa Contoh Keempat Ini Sangat Penting?
1.	useEffect Berfungsi sebagai Pemicu Awal: Ketika halaman web pertama kali dimuat oleh browser, useEffect akan langsung mendeteksi instruksi di dalamnya (dalam hal ini memanggil fungsi ambilDataCuaca). Ini adalah tempat standar di React untuk memicu proses ambil data API, membaca data dari Local Storage, atau menyalakan fungsi waktu (timer).
2.	Conditional Rendering (Render Bersyarat): Perhatikan sintaks {loading ? (...) : (...)}. Di React, kita bisa mengatur tampilan UI secara dinamis berdasarkan kondisi State saat itu. Jika data belum siap, tampilkan tulisan "Loading...". Jika sudah siap, hilangkan tulisan tersebut dan langsung ganti dengan kotak data cuacanya.
3.	Optional Chaining (?.): Tanda tanya sebelum titik pada kode seperti dataCuaca?.lokasi digunakan agar program tidak error atau crash saat pertama kali berjalan, karena pada detik pertama aplikasi dibuka, nilai awal dataCuaca masih kosong (null).
Rekap 4 Contoh Dasar yang Sudah Kamu Pelajari:
1.	Aplikasi Kasir/Keranjang: Belajar interaksi antar komponen lewat Props dan manajemen angka (State).
2.	Aplikasi Filter/Pencarian: Belajar mengikat form input secara real-time (Controlled Input).
3.	Aplikasi Checklist Perlengkapan: Belajar memanipulasi data berbentuk daftar/tabel (Array Object), menambah, dan menghapus data dengan aman (Immutability).
4.	Aplikasi Cuaca: Belajar sinkronisasi data dengan server luar lewat efek samping (useEffect & API Simulation).












8.	KELEBIHAN REACT DIBANDING FRAMEWORK/LIBRARIES LAIN

5 alasan utama mengapa Anda harus memilih ReactJS daripada framework lain,
1.	Mudah dipelajari, mudah digunakan Mampu melakukan hal-hal luar biasa itu hebat, tetapi hanya jika Anda tidak perlu menghabiskan sisa hidup menguasai satu teknologi baru. React JS mudah dipelajari, mudah digunakan serta dilengkapi dengan sumber dokumentasi, tutorial, dan sumber daya pelatihan yang baik. Siapa pun dengan kemampuan dasar JavaScript dapat memahami dan mulai menggunakan React Js hanya dalam beberapa hari.
2.	Reusable Componets Components adalah fitur luar biasa, dan React JS didasarkan pada hal tersebut. Anda mulai dengan hal-hal kecil, yang kemudigunakan untuk membuat hal-hal yang lebih besar, selanjutnya Anda gunakan untuk membuat aplikasi. Setiap komponen memiliki logikanya sendiri dan mengontrol renderingnya sendiri, dan dapat digunakan kembali di mana pun Anda membutuhkannya. Penggunaan ulang kode membuat aplikasi Anda lebih mudah dikembangkan dan dikelola. React Js juga membantu Anda menerapkan tampilan dan nuansa yang konsisten di semua project.
3.	Virtual DOM Salah satu bagian yang sangat keren dari React adalah DOM virtual. Biasanya, ketika Anda mengembangkan aplikasi yang memiliki banyak interaksi pengguna dan pembaruan data, Anda harus hati-hati saat struktur aplikasi memengaruhi kinerja. Bahkan dengan platform klien yang cepat dan mesin JavaScript, manipulasi DOM yang luas dapat menjadi penghambat kinerja dan bahkan menghasilkan user interface yang menjengkelkan. Lebih buruk lagi, karena DOM adalah tree data structure, perubahan sederhana di tingkat atas dapat menyebabkan perubahan besar ke user interface.
React memecahkan masalah ini dengan menggunakan DOM virtual. Ini, seperti namanya, representasi virtual DOM. Setiap perubahan tampilan baru pertama kali dilakukan pada DOM virtual, yang hidup dalam memori dan bukan di layar Anda. Algoritma yang efisien kemudian menentukan perubahan yang dibuat pada DOM virtual untuk mengidentifikasi perubahan yang perlu dilakukan ke DOM asli. Ini kemudian menentukan cara yang paling efektif untuk membuat perubahan dan hanya berlaku ke DOM asli. Ini menjamin waktu pembaruan minimum ke DOM asli, menyediakan kinerja yang lebih tinggi dan pengalaman pengguna yang lebih bersih.
4.	Developer Tools yang Keren Teknologi baru bisa sangat menyenangkan, tetapi hanya jika Anda dapat menggunakannya dalam lingkungan development. Artinya, memiliki alat untuk membantu Anda merancang dan men-debug teknologi baru, dan React JS mencakup hal desain dan alat debugging. React develper tools, tersedia untuk Chrome dan Firefox, adalah ekstensi browser untuk React. Ini memungkinkan Anda untuk memeriksa hierarki komponen React di DOM virtual. Anda dapat memilih komponen individual dan memeriksa serta mengedit properti dan statusnya saat ini. Anda juga dapat melacak hierarki komponen dan menemukan parent/child components. Anda dapat menemukannya di Github, di Chrome Store, atau Firefox add-ons page.
5.	React Native untuk Mobile App Development React JS dapat disebut sebagai "belajar sekali - tulis di mana saja" library, karena baik dalam pengembangan aplikasi web dan mobile, React mengikuti pola desain yang sama, memfasilitasi proses transisi. Menggunakan JavaScript polos dan React, Anda dapat membuat UI yang kaya untuk aplikasi asli, serta didukung oleh platform iOS dan Android.

9.	KESIMPULAN 
React.js adalah salah satu pustaka JavaScript paling populer untuk membangun antarmuka pengguna yang dinamis dan interaktif. Dengan pendekatan berbasis komponen dan keunggulannya dalam pembaruan efisien menggunakan Virtual DOM, React telah menjadi pilihan utama dalam pengembangan aplikasi web modern. Namun, pengembang sering menghadapi tantangan dalam memahami konsep dasar JSX, manajemen status, pengelolaan event, serta optimalisasi performa aplikasi React. Selain itu, pengenalan React Native sebagai ekosistem untuk membangun aplikasi mobile menambah kompleksitas bagi mereka yang ingin menguasai framework ini secara menyeluruh.




