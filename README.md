## IKET (IT Ticketing)

Ticketing sederhana

- User membuat form di iket
- Form diprint, ditandatangani oleh nya sebagai pemohon dan di ttd juga oleh kabag pemohon. 
- Hasil print yang sudah ditandatangani diserahkan ke teknisi. 
- Teknisi mengerjakan request. 
- Setelah selesai mengerjakannya, teknisi menambah deskripsi req di iket (tgl target, selesai, status req, catatan teknisi) dan mengisi detail form fisik dan menandatanganinya
- Setelah itu form diserahkan ke manager. Manager memverifikasi request dengan memberi ttd digital di iket dan ttd di form fisik. 
- Sekarang req terrekam sebagai form fisik dan data digital di iket.

Next, fitur laporan di manager dan ganti password user 

### Tech Stack
- Laravel 8
- Bootstrap 4\
lain-lain:
- Yajra Datatables
- Laravel Dompdf
- Light Bootstrap Admin Theme

### Instalasi
- Clone atau Download 
- Masuk ke folder iket ini
- Jalankan di terminal `composer install`
- Copy `.env.example` ke `.env` (Jika tidak ada `.env` silakan buat di root folder)
- Sesuaikan konfigurasi `.env` seperti username dan password database dengan milikmu
- Buat database MySQL dengan nama `db_iket` atau terserah, samakan dengan settingan nama db di `.env`
- Jalankan `php artisan key:generate` untuk generate `APP_KEY` di `.env`
- Jalankan di terminal `php artisan migrate --seed`

### Jalankan Aplikasi
```
php artisan serve
```

### User
User\
Username: user\
Password: user

Teknisi\
Username: tec\
Password: tec

Manager\
Username: man\
Password: man

[Link Demo](https://youtu.be/a0-zpBeMEL8) (28 Nov 2020)

[Visit my Medium](http://fajarwz.medium.com)\
[Let's be friends](http://fb.me/fajarwz123)