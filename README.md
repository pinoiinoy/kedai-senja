# Sistem Pemesanan dan Manajemen Stok Kedai Kopi Senja

**Proyek Uji Kompetensi Keahlian (UKK) RPL 2026/2027**  
**Soal 3 — Varian C (Kafe)**  
**SMK Negeri 1 Katapang × PT Niaga Expert Teknologi**

---

## 1. Ringkasan Proyek

**Nama Sistem:** Sistem Pemesanan dan Manajemen Stok Kedai Kopi Senja.

Sistem ini dirancang untuk membantu kegiatan operasional Kedai Kopi Senja, terutama dalam pengelolaan menu, bahan baku, resep, pemesanan, transaksi, dan pemantauan stok.

Sistem memiliki tiga jenis pengguna:

- **Kasir:** mengelola pesanan, transaksi, pembayaran, dan perubahan status pesanan melalui website.
- **Manajer:** mengelola menu, bahan baku, resep, stok masuk, serta melihat laporan melalui website.
- **Pelanggan:** melihat menu, melakukan pemesanan, dan memantau status pesanan melalui aplikasi Android.

Sistem menggunakan Laravel sebagai backend dan website, MySQL sebagai database, serta Ionic dengan Capacitor untuk membangun aplikasi Android pelanggan.

> **Catatan status:** Proyek ini masih dalam tahap implementasi. Fitur yang belum selesai dibuat atau diuji tidak akan dinyatakan sebagai fitur yang sudah berhasil.

## 2. Teknologi yang Digunakan

| Komponen | Teknologi | Fungsi |
|---|---|---|
| Backend | Laravel 12.72.0 | Mengelola proses bisnis dan REST API |
| Bahasa backend | PHP 8.2.12 | Menjalankan Laravel |
| Website | Laravel Blade | Antarmuka Kasir dan Manajer |
| Database | MySQL | Menyimpan data aplikasi |
| Mobile | Ionic | Membuat aplikasi pelanggan |
| Bahasa mobile | TypeScript | Logika aplikasi Ionic |
| Android | Capacitor | Mengubah aplikasi Ionic menjadi APK |
| Package manager backend | Composer | Mengelola dependensi PHP |
| Package manager mobile | npm | Mengelola dependensi Ionic |
| Version control | Git dan GitHub | Mengelola versi source code |

## 3. Cara Menjalankan Server

### 3.1 Persyaratan

Pastikan perangkat sudah memiliki:

- Windows 10/11 atau sistem operasi yang kompatibel.
- PHP 8.2.12 atau versi yang sesuai dengan dependensi proyek.
- Composer.
- MySQL atau MariaDB.
- Node.js dan npm.
- Git.
- Visual Studio Code.

### 3.2 Clone repository

```bash
git clone <URL_REPOSITORY>
cd kedai-senja
```

Ganti `<URL_REPOSITORY>` dengan alamat repository GitHub proyek.

### 3.3 Instal dependensi Laravel

```bash
composer install
```

### 3.4 Konfigurasi environment

Salin file `.env.example` menjadi `.env`.

Pada Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

### 3.5 Membuat database

Buat database MySQL dengan nama:

```sql
CREATE DATABASE kedai_senja
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kedai_senja
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username, password, dan port dengan konfigurasi MySQL pada perangkat masing-masing.

### 3.6 Konfigurasi Supplier API

Jika kredensial layanan Supplier sudah diberikan, simpan konfigurasi pada `.env`:

```env
SUPPLIER_BASE_URL=
SUPPLIER_API_KEY=
```

Jangan mengunggah API key atau kredensial rahasia ke repository.

### 3.7 Menjalankan migration

```bash
php artisan config:clear
php artisan migrate
```

### 3.8 Mengimpor data awal

Setelah fitur impor selesai dibuat dan file CSV tersedia, jalankan:

```bash
php artisan impor:data-awal
```

Data awal yang diimpor meliputi:

- Data bahan baku.
- Data menu.
- Data resep.

### 3.9 Menyiapkan akun dan data demo

Setelah seeder selesai dibuat:

```bash
php artisan db:seed --class=AkunStafSeeder
```

Untuk menyiapkan kondisi demo:

```bash
php artisan db:seed --class=DemoSeeder
```

Seeder demo harus bersifat idempotent dan menyiapkan stok Susu UHT sebesar 0,3 liter atau 300 ml.

### 3.10 Menjalankan server Laravel

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Buka website melalui:

```text
http://localhost:8000
```

Untuk pengujian dari HP, gunakan alamat IP lokal laptop dan pastikan laptop serta HP berada pada jaringan yang sama.

**Catatan:** Perintah impor dan seeder di atas baru dapat digunakan setelah implementasinya tersedia.

## 4. Cara Menjalankan Aplikasi Android (APK)

Aplikasi pelanggan direncanakan menggunakan Ionic dan Capacitor.

### 4.1 Instal dependensi

Masuk ke folder aplikasi mobile:

```bash
cd mobile-pelanggan
npm install
```

### 4.2 Menjalankan aplikasi untuk pengembangan

```bash
ionic serve
```

### 4.3 Build aplikasi

```bash
ionic build
```

### 4.4 Sinkronisasi Capacitor Android

Jika platform Android belum pernah ditambahkan:

```bash
npx cap add android
```

Untuk sinkronisasi perubahan berikutnya:

```bash
npx cap sync android
```

### 4.5 Membuka Android Studio

```bash
npx cap open android
```

Setelah Android Studio terbuka:

1. Tunggu proses Gradle selesai.
2. Periksa konfigurasi Android.
3. Jalankan aplikasi pada emulator atau perangkat Android.
4. Lakukan pengujian koneksi ke REST API.
5. Build APK setelah aplikasi siap.

### 4.6 Koneksi aplikasi ke server

Ketika APK diuji menggunakan HP fisik, jangan menggunakan `localhost` sebagai alamat server laptop.

Gunakan IP lokal laptop, misalnya:

```text
http://192.168.1.10:8000
```

Alamat tersebut hanya contoh. Gunakan IP laptop yang sebenarnya.

Lokasi APK hasil build akan dicatat pada bagian `/apk` setelah proses build selesai dan file APK disiapkan.

## 5. Akun Pengujian

Akun pengujian akan dibuat setelah fitur autentikasi dan seeder akun selesai diimplementasikan.

| Peran | Platform | Username / Login | Password |
|---|---|---|---|
| Kasir | Website | [Isi username] | [Isi password demo] |
| Manajer | Website | [Isi username] | [Isi password demo] |
| Pelanggan | APK | [Isi nomor HP demo] | [Isi password demo] |

**Catatan keamanan:**
- Gunakan akun khusus pengujian.
- Jangan menggunakan password pribadi.
- Jangan mengunggah kredensial produksi ke GitHub.
- Ganti password sementara setelah login jika sistem mewajibkannya.

## 6. Lokasi File Penting

Struktur repository yang direncanakan:

```text
kedai-senja/
│
├── app/
│   ├── Console/
│   │   └── Commands/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
│
├── bootstrap/
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
├── resources/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── api.php
│
├── storage/
│   └── app/
│       └── data-awal/
│
├── tests/
│
├── mobile-pelanggan/
│   ├── src/
│   ├── assets/
│   └── android/
│
├── docs/
│   ├── erd/
│   └── uml/
│
├── apk/
│
├── .env.example
├── artisan
├── composer.json
└── README.md
```

| Bagian | Lokasi | Fungsi |
|---|---|---|
| Model | `app/Models/` | Representasi tabel database |
| Controller | `app/Http/Controllers/` | Mengelola request aplikasi |
| Middleware | `app/Http/Middleware/` | Membatasi akses pengguna |
| Migration | `database/migrations/` | Membuat struktur tabel |
| Seeder | `database/seeders/` | Mengisi data awal dan demo |
| Routes web | `routes/web.php` | Rute website |
| Routes API | `routes/api.php` | Rute REST API |
| Blade | `resources/views/` | Tampilan website |
| CSV | `storage/app/data-awal/` | File impor data awal |
| Ionic | `mobile-pelanggan/` | Source code aplikasi pelanggan |
| ERD | `docs/erd/` | Dokumentasi struktur database |
| UML | `docs/uml/` | Dokumentasi diagram UML |
| APK | `apk/` | File aplikasi Android hasil build |

Lokasi dan nama folder dapat disesuaikan dengan struktur akhir repository.

## 7. Keputusan Implementasi

Keputusan implementasi berikut digunakan sebagai acuan teknis dan harus dicocokkan dengan hasil coding sebenarnya.

| Bagian | Keputusan |
|---|---|
| Backend | Laravel 12 |
| Database | MySQL |
| Website | Laravel Blade |
| Aplikasi pelanggan | Ionic + Capacitor |
| Komunikasi mobile | REST API dengan format JSON |
| Autentikasi API | Token, misalnya Laravel Sanctum |
| Role pengguna | Kasir, Manajer, dan Pelanggan |
| Satuan dasar bahan | Gram (g), mililiter (ml), dan pcs |
| Mata uang | Rupiah (Rp) |
| Biaya layanan | 5% |
| Pajak | 10% setelah biaya layanan ditambahkan |
| Status pesanan | Baru → Diproses → Selesai |
| Stok | Berkurang berdasarkan resep dan jumlah pesanan |
| Harga historis | Disimpan pada detail transaksi saat pesanan dibuat |
| Supplier API | Dipanggil dari backend dan memiliki fallback |

### Aturan implementasi penting

1. Perhitungan kebutuhan bahan harus menggabungkan kebutuhan semua item dalam satu pesanan.
2. Pesanan ditolak jika stok bahan tidak mencukupi.
3. Proses penyimpanan pesanan dan pengurangan stok harus atomik menggunakan database transaction.
4. Menu tanpa resep atau menu nonaktif tidak dapat dipesan.
5. Menu dapat berstatus Habis jika bahan tidak cukup untuk satu porsi.
6. Pembatalan hanya diperbolehkan sesuai aturan status dan hak akses.
7. Harga historis pada struk tidak boleh berubah ketika harga jual menu diperbarui.
8. Manajer memiliki hak pengelolaan data dan laporan sesuai ketentuan.
9. Pelanggan hanya dapat melihat pesanan miliknya.
10. Kegagalan Supplier API tidak boleh membuat aplikasi utama berhenti digunakan.

### Keputusan tambahan

- Format nomor HP dinormalisasi agar satu pelanggan tidak memiliki beberapa akun dengan nomor yang sama dalam format berbeda.
- Bahan dengan satuan berbeda dikonversi ke satuan dasar sebelum perhitungan.
- Bahan yang tidak dapat dikenali saat impor tidak dimasukkan.
- Menu atau bahan yang sudah digunakan dalam transaksi tidak dihapus permanen; gunakan status nonaktif.
- Detail keputusan teknis akan dicatat pada dokumentasi implementasi.

## 8. Self-Check 14 Kriteria Penerimaan

**Isi kolom klaim hanya setelah fitur benar-benar diuji.**

| No. | Kriteria penerimaan | Klaim | Status pengujian |
|---:|---|---|---|
| 1 | Pengelolaan bahan, menu, dan resep multi-bahan | [Ya/Tidak] | Belum diuji |
| 2 | Pencatatan stok masuk dan batas minimum bahan | [Ya/Tidak] | Belum diuji |
| 3 | Pesanan multi-item dan pengurangan stok sesuai resep | [Ya/Tidak] | Belum diuji |
| 4 | Penolakan stok tidak cukup dan perhitungan kebutuhan gabungan (inti) | [Ya/Tidak] | Belum diuji |
| 5 | Status Habis otomatis berdasarkan ketersediaan bahan | [Ya/Tidak] | Belum diuji |
| 6 | Status pesanan berjenjang dan pembatalan sesuai aturan | [Ya/Tidak] | Belum diuji |
| 7 | Struk, biaya layanan 5%, pajak 10%, dan harga historis (inti) | [Ya/Tidak] | Belum diuji |
| 8 | Perhitungan HPP dan margin berdasarkan resep | [Ya/Tidak] | Belum diuji |
| 9 | Laporan dan pembatasan hak akses berdasarkan role | [Ya/Tidak] | Belum diuji |
| 10 | Impor CSV, normalisasi satuan, dan pencocokan nama bahan | [Ya/Tidak] | Belum diuji |
| 11 | Integrasi Supplier API dan fallback harga terakhir | [Ya/Tidak] | Belum diuji |
| 12 | Akun pelanggan pada APK, autentikasi, dan penggantian password | [Ya/Tidak] | Belum diuji |
| 13 | Pemesanan pelanggan melalui APK dengan aturan stok yang sama | [Ya/Tidak] | Belum diuji |
| 14 | Pemantauan status dan struk pesanan milik pelanggan | [Ya/Tidak] | Belum diuji |

Butir 4 dan 7 merupakan kriteria inti yang harus diperhatikan secara khusus.

### Fitur opsional

Fitur berikut dikerjakan setelah seluruh fitur wajib stabil:

- O1: Ukuran Reguler dan Large.
- O2: Promo happy hour.
- O3: Penyesuaian stok dengan alasan.
- O4: Laporan jam ramai.
- O5: Reset password melalui email lokal.

## 9. Belum Selesai / Keterbatasan

Bagian ini diperbarui sesuai kondisi proyek yang sebenarnya.

| Bagian | Kondisi saat ini | Rencana |
|---|---|---|
| Backend Laravel | Proyek Laravel sudah dibuat | Implementasi modul dan proses bisnis |
| Database | Database belum selesai dirancang dan dimigrasikan | Membuat migration, relasi, dan constraint |
| Website Kasir | Belum diimplementasikan | Mengikuti rancangan UI/UX |
| Website Manajer | Belum diimplementasikan | Mengikuti rancangan UI/UX |
| REST API | Belum diimplementasikan | Membuat endpoint dan autentikasi API |
| Aplikasi Ionic | Belum diimplementasikan | Membuat halaman dan integrasi API |
| APK Android | Belum dibangun | Build menggunakan Capacitor |
| Supplier API | Belum diintegrasikan | Implementasi koneksi dan fallback |
| Pengujian | Belum dilakukan secara menyeluruh | Menguji 14 kriteria penerimaan |

Perbarui tabel ini setiap kali ada perubahan kondisi pengerjaan. Jangan mengklaim fitur selesai jika belum diuji.

## 10. Referensi dan Bantuan

| Sumber | Digunakan untuk | Keterangan |
|---|---|---|
| Dokumentasi Laravel | Backend, migration, model, controller, dan middleware | https://laravel.com/docs |
| Dokumentasi MySQL | Database, query, dan relasi | https://dev.mysql.com/doc/ |
| Dokumentasi Ionic | Pembuatan aplikasi pelanggan | https://ionicframework.com/docs |
| Dokumentasi Capacitor | Build aplikasi Android | https://capacitorjs.com/docs |
| Dokumentasi Composer | Pengelolaan dependensi PHP | https://getcomposer.org/doc/ |
| Dokumentasi Git | Version control | https://git-scm.com/doc |
| Dokumentasi GitHub | Repository dan pengelolaan source code | https://docs.github.com/ |
| Asisten AI | Membantu memahami konsep, menyusun rencana, dan debugging | Jelaskan bagian yang benar-benar digunakan dan dipahami |

Seluruh kode yang digunakan harus dipahami, diperiksa, dan diuji oleh pengembang. Bantuan AI dan referensi lain dicatat secara jujur sesuai penggunaannya.

---

