# projek2_pbwl
Bedah kode: Pewarisan (is-a) Setiap kelas model ditulis extends Koneksi, jadi $this->koneksi langsung tersedia. Property koneksi bersifat protected: dipakai kelas turunan, tertutup dari luar. Konsekuensinya: setiap new Mahasiswa() membuka koneksi database sendiri.
