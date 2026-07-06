# Panduan Instalasi SmartDoc AI untuk Tim

Dokumen ini berisi panduan langkah demi langkah untuk meng-clone dan menjalankan proyek SmartDoc AI di komputer/laptop masing-masing anggota tim.

## 📋 Prasyarat
Sebelum memulai, pastikan aplikasi berikut sudah terinstal:
1. **XAMPP** (untuk menjalankan MySQL/Database).
2. **PHP** (minimal versi 8.2 ke atas).
3. **Composer** (untuk menginstal pustaka/library Laravel).
4. **Git** (untuk menarik kode).

## 🚀 Langkah-Langkah Instalasi (Step-by-Step)

### 1. Clone Proyek dari GitHub
Buka Terminal/Command Prompt di folder tempat ingin menyimpan proyek, lalu jalankan:
```bash
git clone https://github.com/Ramadhan-Al-Fitra/Project-AI-SmartDoc.git
```

### 2. Masuk ke Folder Proyek & Pindah ke Branch `develop`
```bash
cd Project-AI-SmartDoc/backend
git checkout develop
```
*(Catatan: Gunakan branch `develop` karena itu adalah pusat kode terbaru saat ini, bukan `main`).*

### 3. Instal Dependensi Laravel
Jalankan perintah ini untuk mengunduh semua pustaka yang dibutuhkan proyek:
```bash
composer install
```

### 4. Siapkan File Konfigurasi Lingkungan (`.env`)
Secara *default*, file `.env` tidak ikut ter-push ke GitHub demi keamanan. Anda harus menduplikat file `.env.example`:
- Copy file `.env.example` dan ubah namanya menjadi `.env` (bisa lewat File Explorer atau Terminal).
- Buka file `.env` tersebut, cari bagian konfigurasi database, lalu sesuaikan isinya menjadi seperti ini:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartdoc
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database di XAMPP
- Buka aplikasi XAMPP, nyalakan module **MySQL** dan **Apache**.
- Buka browser, pergi ke `http://localhost/phpmyadmin`.
- Buat database baru (New) dengan nama persis: **`smartdoc`**.

### 6. Generate Application Key
Jalankan perintah ini agar Laravel bisa mengenkripsi sesi dan data proyek:
```bash
php artisan key:generate
```

### 7. Jalankan Migrasi Database
Untuk membangun tabel `conversion_histories` dan tabel bawaan lainnya di database Anda, jalankan:
```bash
php artisan migrate
```

### 8. Hubungkan Folder Penyimpanan (Storage Link)
Agar file PDF/Word yang diunggah nanti bisa diakses secara publik oleh web:
```bash
php artisan storage:link
```

### 9. Jalankan Server!
Semuanya sudah siap. Terakhir, nyalakan server lokal:
```bash
php artisan serve
```
Buka browser dan akses **`http://127.0.0.1:8000`**. Web SmartDoc AI sudah bisa digunakan di laptop Anda! 🎉
