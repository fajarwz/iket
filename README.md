## IKET (IT Ticketing)

Ticketing sederhana

Pertama user membuat form di iket, lalu diprint, ditandatangani oleh nya sebagai pemohon dan kabag pemohon, hasil print yang sudah ditandatangani diserahkan ke teknisi. Lalu Teknisi mengerjakan request. Setelah selesai mengerjakannya, teknisi menambah deskripsi req di iket (tgl target, selesai, teknisi, status req, catatan teknisi) dan mengisi detail form fisik dan menandatanganinya, setelah itu form diserahkan ke manager. Manager memverifikasi req dengan memberi ttd digital di iket dan ttd di form fisik. (Fitur laporan di manager coming soon...)

Sekarang req terrekam sebagai form fisik dan data digital di iket.

### Tech Stack
- Laravel 8
- Bootstrap 4
lain-lain:
- Yajra Datatables
- Laravel Dompdf
- Light Bootstrap Admin Theme

### Instalasi
- Clone atau Download 
- Masuk ke folder iket ini
- Copy .env.example ke .env (Jika tidak ada .env silakan buat di root folder)
- Sesuaikan konfigurasi .env seperti username dan password database dengan milikmu
- Jalankan `php artisan key:generate` untuk generate `APP_KEY` di .env
- Buat database MySQL dengan nama `db_iket`
- Jalankan di terminal `composer install`
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

Link Demo (28 Nov 2020):
https://youtu.be/a0-zpBeMEL8

by: fajarwz

Kalau kamu suka ini mohon beri star ya...

[Visit my Medium](http://fajarwz.medium.com)\
[Let's be friends](http://fb.me/fajarwz123)