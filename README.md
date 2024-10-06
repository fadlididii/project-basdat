# Sistem Informasi HRD Sodaqo Mart

## Studi Kasus
Sistem informasi ini dikembangkan untuk membantu Sodaqo Mart dalam mengelola sumber daya manusia. Sodaqo Mart merupakan minimarket yang menjual berbagai kebutuhan sehari-hari, dan sistem ini akan menangani beberapa aspek HRD seperti manajemen data karyawan, absensi, penggajian, penilaian kinerja, dan pengajuan cuti.

## Deskripsi dan Tujuan
Sistem ini bertujuan untuk meningkatkan efisiensi dalam pengelolaan HRD di Sodaqo Mart dengan meminimalisir kesalahan yang terjadi dalam pengolahan data secara manual.

## Rancangan Fitur
### 1. Manajemen Data Karyawan
Pencatatan data pribadi karyawan yang terpusat dan dapat diakses oleh pihak HRD.

### 2. Absensi
Sistem absensi yang real-time, sehingga data kehadiran karyawan dicatat secara akurat.

### 3. Penggajian
Pengelolaan penggajian berbasis data kehadiran dan kinerja, termasuk perhitungan otomatis bonus dan tunjangan.

### 4. Penilaian Kinerja
Modul untuk memantau dan mengevaluasi kinerja karyawan, yang menjadi dasar untuk keputusan HRD seperti promosi atau pemberian penghargaan.

### 5. Pengajuan Cuti
Karyawan dapat mengajukan cuti secara online dan HRD akan melakukan persetujuan melalui sistem.

## Implementasi CRUD
Berikut adalah implementasi operasi CRUD (Create, Read, Update, Delete) yang diterapkan dalam sistem ini:

### 1. Create
- **Manajemen Data Karyawan**: HRD dapat menambah data karyawan baru.
- **Pengajuan Cuti**: Karyawan dapat membuat pengajuan cuti baru melalui sistem.
- **Absensi**: Sistem mencatat kehadiran karyawan secara otomatis saat check-in dan check-out.

### 2. Read
- **Profil Karyawan**: Data karyawan dapat dilihat oleh karyawan maupun HRD.
- **Absensi**: HRD dapat melihat rekap absensi karyawan.
- **Penggajian**: Informasi gaji dapat dilihat oleh karyawan dan HRD.
- **Penilaian Kinerja**: HRD dapat melihat hasil evaluasi karyawan.

### 3. Update
- **Profil Karyawan**: Karyawan dapat memperbarui data pribadi mereka.
- **Manajemen Karyawan**: HRD dapat mengubah informasi terkait karyawan, seperti jabatan dan gaji.

### 4. Delete
- **Manajemen Karyawan**: HRD dapat menghapus data karyawan yang tidak lagi aktif.

## Teknologi yang Digunakan
- **PHP** dengan framework **Laravel**
- **MySQL** sebagai basis data
