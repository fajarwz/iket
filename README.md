## IKET (IT Ticketing)

Ticketing sederhana

Pertama user membuat form di iket, lalu diprint, ditandatangani oleh nya sebagai pemohon dan kabag pemohon, hasil print yang sudah ditandatangani diserahkan ke teknisi. Lalu Teknisi mengerjakan request. Setelah selesai mengerjakannya, teknisi menambah deskripsi req di iket (tgl target, selesai, teknisi, status req, catatan teknisi) dan mengisi detail form fisik dan menandatanganinya, setelah itu form diserahkan ke manager. Manager memverifikasi req dengan memberi ttd digital di iket dan ttd di form fisik. (Fitur laporan di manager coming soon...)

Sekarang req terrekam sebagai form fisik dan data digital di iket.

### Instalasi

```
composer install
php artisan migrate --seed
```
copy .env.example ke .env\
sesuaikan konfigurasi env seperti username dan password database dengan milikmu

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

by: fajarwz

Kalau kamu suka ini mohon beri star ya...

[Visit my Medium](http://fajarwz.medium.com)
[Let's be friends](http://fb.me/fajarwz123)