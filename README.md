# Tentang Aplikasi
Aplikasi ESR Formulir Faktur adalah aplikasi yang digunakan untuk membuat formulir faktur sederhana. Aplikasi ini menggunakan PHP 7.4 dan Laravel.
Aplikasi ini dibuat menggunakan aplikasi dari https://github.com/alfiansetia/laravel-finance-form.git dengan beberapa modifikasi.
# Fitur Aplikasi
1. Transaksi Permintaan Pembayaran (Payment Request)
2. Transaksi Nota Debit
3. Divisi, terbagi menjadi Nama PT dan Bank
4. Pajak, terbagi menjadi PPh Withholding system (WHT) dan PPN (VAT)
5. Penjual/Vendor
6. Akun Pengguna, terdiri dari admin, user, dan supervisor
7. Laporan, untuk transaksi permintaan pembayaran dan nota debit
# Database Aplikasi
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Database.png?raw=true)
# Relasi Database Aplikasi
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/Database/relasi%20database%201.png?raw=true)
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/Database/relasi%20database%202.png?raw=true)
# Tampilan Admin
Tampilan Menu Login
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Login%20admin.png?raw=true)
Tampilan Menu Dashboard
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/dashboard%20admin%201.png?raw=true)
Tampilan Menu Profil
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/profile.png?raw=true)
Tampilan Menu Transaksi Permintaan Pembayaran
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Payment%20request.png?raw=true)
Tampilan Menu Transaksi Nota Debit
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Debit%20note%201.png?raw=true)
Tampilan Menu Nama Divisi
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/divisi%20nama.png?raw=true)
Tampilan Menu Bank Divisi
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/bank.png?raw=true)
Tampilan Menu Pajak WHT
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/pajak%20wht.png?raw=true)
Tampilan Menu Pajak PPN
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/pajak%20ppn.png?raw=true)
Tampilan Menu Penjual
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/penjual.png?raw=true)
Tampilan Menu Akun Pengguna
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/akun%20pengguna.png?raw=true)
Tampilan Menu Laporan Transaksi Permintaan Pembayaran
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/laporan%20pr.png?raw=true)
Tampilan Menu Laporan Nota Debit
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/laporan%20dn.png?raw=true)
# Tampilan Supervisor
Tampilan Menu Login
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Login%20supervisor.png?raw=true)
Tampilan Menu Dashboard
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Dashboard%20supervisor.png?raw=true)
# Tampilan User
Tampilan Menu Login
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/login%20user.png?raw=true)
Tampilan Menu Dashboard
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/dashboard%20user.png?raw=true)
# Tampilan Logout
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Logout.png?raw=true)

# Flowchart Login
Alur masuk ke aplikasi sebagai berikut:
1. Awal mulai, akan muncul tampilan login/masuk
2. Masukkan email dan password
3. Periksa email dan password, jika email/password salah maka harus input ulang, jika email/password benar, maka akan masuk ke aplikasi di halaman dashboard
4. Selesai
   
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Flowchart%20login.png?raw=true)
# Flowchart Menu Utama Admin
Alur flowchart menu utama admin sebagai berikut:
1. Admin login terlebih dahulu menggunakan akun admin
2. Ketika berhasil masuk ke aplikasi, pilih menu dashboard, permintaan pembayaran, nota debit, divisi, pajak, penjual, akun pengguna, laporan, atau profil
3. Selesai
    
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Flowchart%20Admin.png?raw=true)
# Flowchart Menu Utama User
Alur flowchart menu utama user sebagai berikut:
1. User login terlebih dahulu menggunakan akun user
2. Ketika berhasil masuk ke aplikasi, pilih menu dashboard, permintaan pembayaran, nota debit, laporan atau profil
3. Selesai
   
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Flowchart%20user.png?raw=true)
# Flowchart Menu Utama Supervisor
Alur Flowchart menu utama sebagai berikut:
1. Supervisor login terlebih dahulu menggunakan supervisor
2. Ketika berhasil masuk ke aplikasi, pilih menu dashboard, permintaam pembayaran, nota debit, atau profil
3. Selesai
   
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Flowchart%20supervisor.png?raw=true)
# Flowchart Logout
Alur flowchart logout/keluar sebagai berikut:
1. Untuk keluar aplikasi, klik logout di bagian profil
2. Muncul tampilan opsi logout, jika tidak akan tetap berada di aplikasi, jika ya akan keluar dari aplikasi dan muncul halaman login
3. Selesai
   
![alt text](https://github.com/sintadwinugrahani/SistemInformasiAkuntansi-ESR-Form-Faktur/blob/main/screenshots/Flowchart%20Logout.png?raw=true)
