<?php
// File untuk menghubungkan ke database
$host = 'localhost'; // Host database
$username = 'root'; // Username database
$password = ''; // Password database
$database = 'belajar_login'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset ke utf8
$conn->set_charset("utf8");
?>