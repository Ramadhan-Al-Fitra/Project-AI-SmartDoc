# Teori Fuzzy Mamdani pada SmartDoc AI
*Materi Referensi untuk Presentasi & Pembuatan Laporan Mata Kuliah AI*

Dalam proyek SmartDoc AI, kita telah mengimplementasikan kecerdasan buatan berbasis **Logika Fuzzy (Metode Mamdani)**. Berikut adalah penjelasan lengkap yang bisa Anda jadikan acuan untuk presentasi.

---

## 1. Tujuan Penggunaan (Goal)
Fuzzy Mamdani digunakan oleh SmartDoc AI sebagai **Mesin Pengambil Keputusan (Decision Engine)** untuk menentukan **"Tingkat Kompleksitas Dokumen"**.
Dengan mengetahui tingkat kompleksitasnya, AI bisa memutuskan apakah ia cukup melakukan konversi standar yang cepat (*Fast-Pass*), atau harus mengaktifkan algoritma berat untuk menjaga tata letak tabel dan gambar (*Deep Layout Recovery*).

## 2. Proses Fuzzifikasi (Input)
Sistem menerima 2 data pasti (*Crisp Input*) dari dokumen yang diunggah pengguna:
1. **Ukuran File (File Size)**: Dihitung dalam satuan Kilobyte (KB).
2. **Total Elemen (Elements)**: Jumlah Tabel + Jumlah Gambar + (Jumlah Paragraf / 5).

Data pasti ini kemudian diubah menjadi nilai samar (*Fuzzy Value* / Derajat Keanggotaan antara `0.0` hingga `1.0`) menggunakan fungsi keanggotaan Segitiga/Trapesium:

* **Variabel Ukuran File**:
  * `Kecil`: Dominan di bawah 500 KB.
  * `Sedang`: Dominan di antara 500 KB hingga 1500 KB.
  * `Besar`: Dominan di atas 2000 KB.
* **Variabel Total Elemen**:
  * `Sedikit`: Di bawah 5 elemen.
  * `Sedang`: Sekitar 15 elemen.
  * `Banyak`: Di atas 30 elemen.

## 3. Rule Base & Inferensi (Mamdani MIN)
Otak utama AI ini berada pada 9 aturan (*Rules*) bersyarat. Untuk mencari nilai akhirnya, kita menggunakan **Operator MIN (Fungsi AND)**.

* **R1**: JIKA Ukuran `Kecil` DAN Elemen `Sedikit` MAKA Kompleksitas = **RENDAH**
* **R2**: JIKA Ukuran `Kecil` DAN Elemen `Sedang` MAKA Kompleksitas = **RENDAH**
* **R3**: JIKA Ukuran `Sedang` DAN Elemen `Sedikit` MAKA Kompleksitas = **RENDAH**
* **R4**: JIKA Ukuran `Sedang` DAN Elemen `Sedang` MAKA Kompleksitas = **SEDANG**
* **R5**: JIKA Ukuran `Sedang` DAN Elemen `Banyak` MAKA Kompleksitas = **TINGGI**
* **R6**: JIKA Ukuran `Besar` DAN Elemen `Sedikit` MAKA Kompleksitas = **SEDANG**
* **R7**: JIKA Ukuran `Besar` DAN Elemen `Sedang` MAKA Kompleksitas = **TINGGI**
* **R8**: JIKA Ukuran `Besar` DAN Elemen `Banyak` MAKA Kompleksitas = **TINGGI**
* **R9**: JIKA Ukuran `Kecil` DAN Elemen `Banyak` MAKA Kompleksitas = **SEDANG**

Setelah nilai tiap *rule* didapat, dilakukan **Agregasi MAX**. Artinya, sistem akan mengambil nilai maksimal untuk mengelompokkan skor himpunan output (`Rendah`, `Sedang`, `Tinggi`).

## 4. Defuzzifikasi (Centroid Of Area / COA)
Untuk mengubah kembali area himpunan *Fuzzy Output* menjadi angka riil (0 - 100) yang bisa dipahami manusia, sistem menggunakan **Metode Mamdani Asli (Centroid Of Area / Titik Berat Luasan)**. 
Alih-alih cuma menebak rata-rata, kode kita `calculateFuzzyMamdani` memotong grafik fungsi keanggotaan (*Clipping*) lalu menghitung integral diskrit (sampling titik 0, 10, 20...100) untuk mencari titik keseimbangan absolutnya.

*Contoh Hasil Akhir (Crisp Output):* **Skor Kompleksitas = 78.5 / 100**

## 5. Eksekusi Tindakan (Action)
Berdasarkan *Crisp Output* yang didapat, AI akan beraksi:
* **Skor > 60**: Dokumen tergolong **Tinggi** kompleksitasnya. AI mengaktifkan *Deep Layout Recovery* agar gambar dan tabel tidak berantakan.
* **Skor 30 - 60**: Dokumen tergolong **Sedang**. AI menggunakan format proporsional standar.
* **Skor < 30**: Dokumen tergolong **Rendah**. AI melakukan *Fast-Pass Conversion* untuk kecepatan server maksimal.

---
*Kode murni matematika AI ini terdapat pada file: `backend/app/Http/Controllers/ConverterController.php` di function `calculateFuzzyMamdani()`*
