=========
TEST CASE 
=========

#1  Skenario              : Simpan data valid
    Input utama           : Semua field valid
    Hasil Yang Diharapkan : Data tersimpan, redirect ke index, pesan sukses
    Status                : LULUS

#2  Skenario              : Kode kosong
    Input utama           : Code kosong
    Hasil Yang Diharapkan : Validasi gagal, data tidak tersimpan
    Status                : LULUS
   
#3  Skenario              : Kode duplikat
    Input utama           : WEB-101 kedua kali
    Hasil Yang Diharapkan : Ditolak oleh rule unique
    Status                : LULUS

#4  Skenario              : Nama kosong
    Input utama           : Name kosong
    Hasil Yang Diharapkan : Validasi gagal
    Status                : LULUS

#5  Skenario              : Biaya negatif
    Input utama           : Fee = -1000
    Hasil Yang Diharapkan : Ditolak karena min:0
    Status                : LULUS

#6  Skenario              : Kuota 0
    Input utama           : quota = 0
    Hasil Yang Diharapkan : Ditolak karena min:1
    Status                : LULUS

#7  Skenario              : Status tidak valid
    Input utama           : Ubah manual menjadi active
    Hasil Yang Diharapkan : Ditolak karena hanya draft/open/closed
    Status                : LULUS

#8  Skenario              : Daftar tampil ulang
    Input utama           : Reload/courses
    Hasil Yang Diharapkan : Data tetap ada karena berasal dari MySQL
    Status                : LULUS