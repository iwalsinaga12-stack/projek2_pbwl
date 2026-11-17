# Project 2 - SIAKAD Mini (pewarisan kelas)

Tema tampilan: **buku catatan kuliah**.

## Cara menjalankan
1. Import `database.sql` lewat phpMyAdmin (membuat database `db_projek2_si2` + data contoh).
2. Taruh folder ini di `htdocs` (XAMPP), buka `http://localhost/project2/`.
3. Koneksi default: `localhost`, user `root`, tanpa password (ubah di `inc/Koneksi.php`).

## Konsep: Pewarisan (is-a)
File kelas: inc/Koneksi.php, app/Mahasiswa.php, app/Dosen.php, app/Matakuliah.php

## Modul
Mahasiswa, Dosen, dan Matakuliah: masing-masing lengkap (daftar + cari, tambah, edit, hapus).
Halaman: `X.php`, `X_input.php`, `X_edit.php`, `X_proses.php` (X = mhsw / dosen / matkul).
