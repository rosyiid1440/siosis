<p align="center"><a href="https://github.com/rosyiid1440" target="_blank"><img src="hhttps://github.com/99sercell/siosis/blob/master/public/img/Screenshot_3.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cara Install

### Ekstrak File dan Buka Terminal di dalam Forder Project

Download file project, ekstrak terlebih dahulu kemudian masuk ke dalam folder project dan buka terminal / cmd / git ataupun software sejenis. Pastikan terminal sudah mengarah ke folder project.

### Install Semua Dependensi yang Dibutuhkan

```bash
composer install
```

```bash
npm install && npm run dev
```

### Buat Database Baru

Buat database sebagai tempat penyimpanan aplikasi ini

### Copy .env.example to .env

Copy file .env.example ke .env

```bash
cp .env.example .env
```

### Setting Database di File .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### Migrasi Database

Migrasi semua table dan data yang sudah disediakan

```bash
php artisan migrate:fresh --seed
```

Jika proses migrasi gagal, silakan import manual file database dengan nama task2.sql yang berada di folder db

### Generate Key Aplikasi

```bash
php artisan key:generate
```

### Jalankan Aplikasi

```bash
php artisan serve
php artisan websockets:serve
```

## Informasi Login Pengguna

| Email             | Password |
| ----------------- | -------- |
| admin@gmail.com | admin    |

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
