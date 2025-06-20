# Website Login dan Register dengan PHP Native

<img src="https://img.shields.io/badge/PHP-7.4%2B-blue" alt="PHP 7.4+">
<img src="https://img.shields.io/badge/MySQL-5.7%2B-orange" alt="MySQL 5.7+">
<img src="https://img.shields.io/badge/Bootstrap-5.0+-purple" alt="Bootstrap 5.0+">

Sebuah aplikasi web sederhana untuk sistem autentikasi (login/register) menggunakan **PHP Native** dan **MySQL**, dengan antarmuka **Bootstrap 5**.

---

## 📋 Fitur Utama

- ✅ Sistem registrasi pengguna baru
- ✅ Login dengan validasi
- ✅ Manajemen session
- ✅ Dashboard setelah login
- ✅ Tampilan responsive dengan Bootstrap
- ✅ Proteksi halaman admin
- ✅ Form validasi server-side

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi      |
| -------- | -------------- |
| Backend  | PHP Native     |
| Database | MySQL          |
| Frontend | Bootstrap 5    |
| Server   | Apache (XAMPP) |

---

## 📁 Struktur Proyek

website-login-register/
├── config/
│ └── database.php # Konfigurasi database
├── includes/
│ ├── auth_check.php # Pengecekan autentikasi
│ ├── functions.php # Fungsi utilitas
│ ├── header.php # Header template
│ └── footer.php # Footer template
├── process/
│ ├── login_process.php # Proses login
│ └── register_process.php # Proses registrasi
├── dashboard.php # Halaman setelah login
├── index.php # Halaman utama
├── login.php # Form login
├── logout.php # Proses logout
└── register.php # Form registrasi

---

## ⚙️ Instalasi

1. Clone repository:

```bash
git clone https://github.com/username/website-login-register.git

```

2. Buat database MySQL:

```sql

CREATE DATABASE belajar_login;
USE belajar_login;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

```

3. Atur koneksi database di config/database.php:

```php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'belajar_login';
```

## 🚀 Cara Menjalankan

1. Letakkan folder project di direktori htdocs (jika menggunakan XAMPP)

2. Jalankan XAMPP dan aktifkan Apache & MySQL

3. Akses melalui browser:

```
http://localhost/website-login-register
```

## 🔒 Keamanan

- Password di-hash menggunakan password_hash()

- SQL Injection dicegah dengan prepared statements

- XSS dicegah dengan htmlspecialchars()

- Validasi input dilakukan di sisi server

## 📝 Catatan Pengembangan

Untuk mode development, aktifkan error reporting di config/database.php:

```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```
