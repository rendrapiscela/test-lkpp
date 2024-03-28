## Backend
Laravel Breeze version 10 <br/>
PHP version > 8.0
DB mysql
Node version > 18.0

## Frontend
Solid JS https://www.solidjs.com/ <br/>
<i>Note: file aplikasi frontend ada di folder <code>/frontend</code></i> (struktur ini tidak disarankan untuk aplikasi kompleks)


## Instalasi Aplikasi
clone project https://github.com/rendrapiscela/test-lkpp.git <br/>
Buka command line, masuk ke directory project. <br/>

### Run Backend
- Jalankan perintah <code>composer install</code> untuk install package
- Setting file <code>.env</code>
- Jalankan perintah <code>php artisan key:generate</code>
- import DB manual dari folder <code>database/dump</code> atau dapat menjalankan <code>php artisan migrate --seed</code>
- Jalankan aplikasi <code>php artisan serve</code>

### Run Frontend
- Buka command line baru, masuk ke directory project <code>/frontend</code>
- Install npm package <code>npm install</code>
- Jalankan aplikasi <code>npm run dev</code>
- Periksa port api pada folder <code>/src/services/api.jsx</code>

## Fitur Aplikasi
<i>Fitur yang sudah diselesaikan :</i>
- Authentifikasi User (Role yang dibuat adalah <code>admin</code> dan <code>guest</code>
- Login & Registrasi user
- Login Admin : <br/>
  email: <email>pusdatin@lkpp.go.id</email> <br/>
  password: <code>pusdatin</code>
- Setting Tipe ID API untuk setiap pengguna
<br/>

<i>Fitur yang belum :</i> <br/>
- Belum ada fitur auth pengguna untuk filter typeId

