# 📁 Aplikasi Arsip Surat

Aplikasi web untuk mengelola arsip surat digital dengan fitur upload, kategorisasi, dan pencarian dokumen PDF.

## 🎯 Tujuan

Membangun sistem arsip surat digital yang efisien untuk:
- Mengelola surat masuk dan keluar
- Mengkategorikan surat berdasarkan jenis
- Mencari dan menemukan surat dengan cepat
- Menyimpan dokumen dalam format PDF

## ✨ Fitur Utama

### 📋 Manajemen Surat
- ✅ Tambah surat baru dengan upload PDF
- ✅ Lihat detail surat dengan preview PDF
- ✅ Edit informasi surat
- ✅ Hapus surat dengan konfirmasi
- ✅ Download file PDF
- ✅ Pencarian surat berdasarkan judul/nomor

### 🗂️ Manajemen Kategori
- ✅ Tambah kategori surat
- ✅ Edit kategori
- ✅ Hapus kategori
- ✅ Pencarian kategori

### 🎨 User Interface
- ✅ Responsive design dengan AdminLTE
- ✅ Sidebar navigation
- ✅ Notifikasi sukses/error
- ✅ Konfirmasi sebelum hapus
- ✅ DataTables untuk pagination & sorting

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel 11
- **Frontend:** Bootstrap 4, AdminLTE 3, DataTables
- **Database:** MySQL
- **File Storage:** Local storage (PDF)
- **Icons:** Font Awesome
- **Notifications:** SweetAlert2

## 📦 Instalasi dan Menjalankan

### Prerequisites
- PHP 8.1+
- Composer
- MySQL
- Apache/Nginx

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/username/arsip-surat.git
   cd arsip-surat

2. **Install Dependencies**
    composer install

3. **Setup environment**
    cp .env.example .env
    php artisan key:generate

4. **Konfigurasi database**
    Edit file .env:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=arsip_surat
        DB_USERNAME=root
        DB_PASSWORD=

5. **Jalankan migrations dan seeder**
    php artisan migrate
    php artisan db:seed

6. **Buat symbolic link storage**
    php artisan storage:link

7. **Jalankan aplikasi**
    php artisan serve

8. **Akses aplikasi**
    Buka browser: http://localhost:8000

## 📸 Screenshots

Screenshot bisa dilihat pada link Google Drive berikut :
https://drive.google.com/drive/folders/1SrOcTPBhioeJ1NrFfd4Q32yxHJfdeNrX?hl=id

## 🚀 Cara Penggunaan
1. **Menambahkan Surat Baru**
    -Klik "Arsipkan Surat" di halaman utama
    -Isi form: nomor surat, pilih kategori, judul
    -Upload file PDFdengan klik tombol "Choose File"
    -Klik "Simpan"

2. **Mencari Surat**
    - Ketik kata kunci di search box
    - Klik tombol "Cari"
    - Gunakan "Reset" untuk menampilkan semua data

3. **Mengedit Surat**
    - Klik tombol "Lihat" pada kolom aksi
    - Scroll ke bawah untuk melihat tombol "Edit/Ganti File" lalu klik
    - Ganti isi form: nomor surat, pilih kategori, judul jika diperlukan
    - Ganti file pdf jika diperlukan dengan klik tombol "Choose File" atau biarkan jika tidak perlu ganti
    - Klik "Simpan"

4. **Menambah data Kategori**
    - Akses menu "Kategori Surat"
    - Tambah kategori baru dengan klik tombol "Tambah Kategori Baru"
    - Isi form yang ada lalu klik "Simpan" jika sudah selesai

5. **Edit data Kategori**
    - Pada menu "Kategori Surat"
    - Klik tombol "Edit" pada kolom aksi
    - Lalu ganti file yang diperlukan
    - Jika sudah selesai klik tombol "Simpan"

6. **Hapus data**
    - Pada menu "Arsip Surat" dan "Kategori Surat" sama-sama terdapat tombol "Hapus" pada kolom aksi
    - Klik tombol "Hapus" jika ingin menghapus data
    - Lalu akan muncul notifikasi untuk konfirmasi jika klik "Ya Hapus!" maka data akan dihapus
    - Jika tidak jadi untuk menghapus maka klik "Batal" untuk membatalkan penghapusan data

👨‍💻 Developer

    Nama: Ilham Gegana Raya Firmansyah
    Prodi: D3-MI PSDKU PAMEKASAN
    NIM: 2231750001
    Tanggal Pembuatan: 30 September 2025

📄 License

    Aplikasi ini dibuat untuk keperluan sertifikasi.
